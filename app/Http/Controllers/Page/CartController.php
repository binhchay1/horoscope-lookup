<?php

namespace App\Http\Controllers\Page;

use App\Exports\ExportCart;
use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequest;
use App\Jobs\SendMailByGoogle;
use App\Mail\OrderPlacedEmail;
use App\Repositories\OrderDetailRepository;
use App\Repositories\OrderRepository;
use App\Repositories\ProductRepository;
use App\Repositories\LayoutRepository;
use Illuminate\Http\Request;
use App\Mail\OrderDetail;
use App\Repositories\CouponRepository;
use Maatwebsite\Excel\Facades\Excel;
use Session;
use Cart;
use Cache;

class CartController extends Controller
{

    private $productRepository;
    private $orderRepository;
    private $orderDetailRepository;
    private $layoutRepository;
    private $couponRepository;

    public function __construct(
        ProductRepository $productRepository,
        OrderRepository $orderRepository,
        OrderDetailRepository $orderDetailRepository,
        LayoutRepository $layoutRepository,
        CouponRepository $couponRepository
    ) {
        $this->productRepository = $productRepository;
        $this->orderRepository = $orderRepository;
        $this->orderDetailRepository = $orderDetailRepository;
        $this->layoutRepository = $layoutRepository;
        $this->couponRepository = $couponRepository;
    }

    public function addCart(Request $request, $slug)
    {
        $getWarranty = $request->get('warranty');
        $dataProduct = $this->productRepository->productDetail($slug);
        $getFlashSale = $this->layoutRepository->getFlashSale();
        $isFlashSale = false;
        if ($getFlashSale) {
            if (strtotime($getFlashSale->flash_sale_timer) >= strtotime(date('Y-m-d H:i:s'))) {
                $priceFlashSale = '';
                $listProductFlashSale = json_decode($getFlashSale->flash_sale_list_product_id, true);
                foreach ($listProductFlashSale as $productFlash => $value) {
                    if ($productFlash == $dataProduct->code) {
                        $isFlashSale = true;
                        $priceFlashSale = $value['new_price'];
                    }
                }
            }
        }

        if ($getWarranty == 'true') {
            $warranty = $dataProduct->warrantyPackages;
        } else {
            $warranty = [];
        }

        if ($isFlashSale) {
            if (isset($warranty->price)) {
                $lastPrice = (int) $priceFlashSale + $warranty->price;
            } else {
                $lastPrice = (int) $priceFlashSale;
            }

            Cart::add(
                $dataProduct->id,
                $dataProduct->name,
                $lastPrice,
                1,
                ['image' => $dataProduct->image, 'warranty' => $warranty],
                $dataProduct->code
            );
        } else {
            if (isset($warranty->price)) {
                $lastPrice = $warranty->price;
            } else {
                $lastPrice = 0;
            }

            if ($dataProduct->new_price != null) {
                Cart::add(
                    $dataProduct->id,
                    $dataProduct->name,
                    $lastPrice + (int) str_replace('.', '', $dataProduct->new_price),
                    1,
                    ['image' => $dataProduct->image, 'warranty' => $warranty],
                    $dataProduct->code
                );
            } else {
                Cart::add(
                    $dataProduct->id,
                    $dataProduct->name,
                    $lastPrice + (int) str_replace('.', '', $dataProduct->price),
                    1,
                    ['image' => $dataProduct->image, 'warranty' => $warranty],
                    $dataProduct->code
                );
            }
        }

        Session::put('getProduct', $dataProduct);

        return redirect()->route('showCart');
    }

    public function showCart()
    {
        $key = 'menu_homepage';
        $listCategory = Cache::store('redis')->get($key);
        $layout = $this->layoutRepository->getListLayout();
        $totalCart = 0;
        $totalCart = Cart::getTotal();
        $dataCart = Cart::getContent();

        $arrayID = [];
        foreach ($dataCart as $item) {
            array_push($arrayID, $item->id);
        }

        return view('page.cart.index', [
            'dataCart' => $dataCart,
            'totalCart' => $totalCart,
            'listCategory' => $listCategory,
            'layout' => $layout,
        ]);
    }

    public function deleteCart($id)
    {
        if ($id) {
            Cart::remove($id);
        }

        return 'success';
    }

    public function updateCart(Request $request)
    {
        $id = $request->get('id');
        $quantity = $request->get('quantity');
        $product = $this->productRepository->show($id);

        Cart::update($id, [
            'quantity' => array(
                'relative' => false,
                'value' => $quantity
            ),
        ]);

        $price = str_replace('.', '', $product->price);
        $total = $price * $quantity;
        $last_price = number_format($total, 0, ',', '.');

        $response = [
            'price' => $last_price,
            'total' => Cart::getTotal()
        ];

        return response()->json($response);
    }

    public function checkout(OrderRequest $request)
    {
        $cartInfor =  Cart::getContent();
        $getFlashSale = $this->layoutRepository->getFlashSale();
        $isFlashSale = false;
        if ($getFlashSale) {
            if (strtotime($getFlashSale->flash_sale_timer) >= strtotime(date('Y-m-d H:i:s'))) {
                $isFlashSale = true;
            }
        }

        try {
            $input = $request->all();
            $today = date("YmdHis");
            $rand = strtoupper(substr(uniqid(sha1(time())), 0, 4));
            $unique = $today . $rand;
            $input['order_code'] = $unique;
            $input['payment'] = 'thanh-toan-truc-tuyen';
            $order = $this->orderRepository->create($input);
            $user = [
                'name' => $input['name'],
                'email' => $input['email'],
                'phone' => $input['phone'],
                'province' => $input['province'],
                'district' => $input['district'],
                'address' => $input['address'],
                'payment' => $input['payment'],
            ];

            $dataSendEmail = [
                'order' => [],
                'order_code' => $unique,
                'name' => $input['name'],
                'phone' => $input['phone'],
                'province' => $input['province'],
                'district' => $input['district'],
                'address' => $input['address'],
                'payment' => $input['payment'],
            ];

            if (count($cartInfor) > 0) {
                if ($isFlashSale) {
                    $listProductFlashSale = json_decode($getFlashSale->flash_sale_list_product_id, true);
                    foreach ($cartInfor as $item) {
                        foreach ($listProductFlashSale as $productFlashSale => $value) {
                            if ($item->conditions == $productFlashSale) {
                                $listProductFlashSale[$productFlashSale]['stock'] = $value['stock'] - 1;
                            }
                        }
                        $data = [
                            'order_id' => $order->id,
                            'product_id' => $item->id,
                            'quantity' => $item->quantity,
                            'price' => $request->total_cart
                        ];

                        if (isset($item->attributes->warranty->id)) {
                            $data['warranty_package_id'] = $item->attributes->warranty->id;
                        }

                        $this->orderDetailRepository->create($data);
                        SendMailByGoogle::dispatch(new OrderPlacedEmail($user, $data), $user['email'], $user)->onQueue('email-order');
                    }

                    $listProductFlashSale = json_encode($listProductFlashSale);
                    $this->layoutRepository->updateStockFlashSale($getFlashSale->id, $listProductFlashSale);
                    Cart::clear();
                } else {
                    foreach ($cartInfor as $item) {
                        $data = [
                            'order_id' => $order->id,
                            'product_id' => $item->id,
                            'quantity' => $item->quantity,
                            'price' => $request->total_cart
                        ];

                        if (isset($item->attributes->warranty->id)) {
                            $data['warranty_package_id'] = $item->attributes->warranty->id;
                        }

                        $this->orderDetailRepository->create($data);
                        SendMailByGoogle::dispatch(new OrderPlacedEmail($user, $data), $user['email'], $user)->onQueue('email-order');
                    }
                    Cart::clear();
                }
            }

            if (isset($input['email'])) {
                $orderDetailMail = new OrderDetail($dataSendEmail);
                SendMailByGoogle::dispatch($orderDetailMail, $input['email'], $dataSendEmail)->onQueue('order-detail');
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        session()->forget('discount-total');
        session()->forget('discount-code');
        session()->forget('discount-type');

        return redirect()->route('thank');
    }

    public function thank()
    {
        $key = 'menu_homepage';
        $listCategory = Cache::store('redis')->get($key);
        $layout = $this->layoutRepository->getListLayout();

        return view('page.cart.thank', compact('listCategory', 'layout'));
    }

    public function addToCart($id, Request $request)
    {
        $total = $request->get('total');
        $getWarranty = $request->get('warranty');
        $dataProduct = $this->productRepository->productDetail($id);
        $getFlashSale = $this->layoutRepository->getFlashSale();
        $isFlashSale = false;
        if ($getFlashSale) {
            if (strtotime($getFlashSale->flash_sale_timer) >= strtotime(date('Y-m-d H:i:s'))) {
                $priceFlashSale = '';
                $listProductFlashSale = json_decode($getFlashSale->flash_sale_list_product_id, true);
                foreach ($listProductFlashSale as $productFlash => $value) {
                    if ($productFlash == $dataProduct->code) {
                        $isFlashSale = true;
                        $priceFlashSale = $value['new_price'];
                    }
                }
            }
        }

        if ($getWarranty == 'true') {
            $warranty = $dataProduct->warrantyPackages;
        } else {
            $warranty = [];
        }

        if ($isFlashSale) {
            if (isset($warranty->price)) {
                $lastPrice = (int) $priceFlashSale + $warranty->price;
            } else {
                $lastPrice = (int) $priceFlashSale;
            }

            Cart::add(
                $dataProduct->id,
                $dataProduct->name,
                $lastPrice,
                $total,
                ['image' => $dataProduct->image, 'warranty' => $warranty],
                $dataProduct->code
            );
        } else {
            if (isset($warranty->price)) {
                $lastPrice = $warranty->price;
            } else {
                $lastPrice = 0;
            }

            Cart::add(
                $dataProduct->id,
                $dataProduct->name,
                $lastPrice + (int) str_replace('.', '', $dataProduct->new_price) ?? (int) str_replace('.', '', $dataProduct->price),
                $total,
                ['image' => $dataProduct->image, 'warranty' => $warranty],
                $dataProduct->code
            );
        }

        return redirect()->back()->with('success', __('Sản phẩm được thêm vào giỏ hàng!'));
    }

    public function addCoupon(Request $request)
    {
        $coupon = $this->couponRepository->getCouponByCode($request->get('code'));
        if (!$coupon) {
            return response()->json(['errors' => __('Không tìm thấy mã giảm giá, làm ơn nhập lại!.')]);
        }

        $listProductWithPrice = [];
        foreach (Cart::getContent() as $item) {
            $listProductWithPrice[$item->conditions] = $item->price;
        }
        Session::put('discount-total', $coupon->discount_amount);
        Session::put('discount-code', $coupon->code);
        Session::put('discount-type', $coupon->type);

        $response = [
            'success' => __('Mã giảm giá được thêm thành công'),
            'discount_total' => $coupon->discount_amount,
            'discount_type' => $coupon->type,
            'discount_code' => $coupon->code,
            'discount_list_product_id' => $coupon->list_product_id,
            'discount_list_cart_product_id_with_price' => $listProductWithPrice
        ];

        return response()->json($response);
    }

    public function exportExcel()
    {
        $cartInfor =  Cart::getContent();
        $nameFile = 'cart_' . date('d-m-Y') . '.xlsx';
        $total = 0;
        $arrProductID = [];
        foreach ($cartInfor as $product) {
            $total += (int) $product->price * $product->quantity;
            $arrProductID[] = $product->id;
        }

        return Excel::download(new ExportCart($cartInfor, $total), $nameFile);
    }

    public function exportImage()
    {
        $cartInfor =  Cart::getContent();
        $arrProductID = [];
        $total = 0;
        foreach ($cartInfor as $product) {
            $total += (int) $product->price * $product->quantity;
            $arrProductID[] = $product->id;
        }
        $getProduct = $this->productRepository->getProductByArrayID($arrProductID);

        return view('page.exports.cart-image', compact('cartInfor'))->render();
    }

    public function printCart(Request $request)
    {
        $cartInfor =  Cart::getContent();
        $arrProductID = [];
        $total = 0;
        foreach ($cartInfor as $product) {
            $total += (int) $product->price * $product->quantity;
            $arrProductID[] = $product->id;
        }
        $getProduct = $this->productRepository->getProductByArrayID($arrProductID);

        return view('page.cart.print', compact('cartInfor', 'total'));
    }

    public function getCoupons()
    {
        $getCoupons = $this->couponRepository->getListCoupon();
        $cartInfor =  Cart::getContent();
        $listCode = [];

        foreach ($cartInfor as $info) {
            $listCode[] = $info->conditions;
        }

        $listProduct = [];
        $getProduct = $this->productRepository->getProductByArrayCode($listCode);
        foreach ($getProduct as $product) {
            $listProduct[$product->name] = $product->code;
        }

        $response = [
            'data' => $getCoupons,
            'product' => $listProduct
        ];

        return response()->json($response);
    }

    public function cancelCoupons()
    {
        session()->forget('discount-total');
        session()->forget('discount-code');
        session()->forget('discount-type');
        session()->forget('discount-list_product_id');
        session()->forget('discount-list_cart_product_id_with_price');

        return 'success';
    }
}
