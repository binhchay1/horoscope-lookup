<?php

namespace App\Http\Controllers\Admin;

use App\Exports\ExportProduct;
use App\Enums\Product;
use App\Enums\Utility;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Repositories\BrandRepository;
use App\Repositories\ProductRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\OrderRepository;
use App\Repositories\WarrantyPackageRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Cache;
use Maatwebsite\Excel\Facades\Excel;

class ProductController extends Controller
{
    private $productRepository;
    private $categoryRepository;
    private $brandRepository;
    private $orderRepository;
    private $warrantyPackageRepository;
    private $utility;

    public function __construct(
        ProductRepository $productRepository,
        CategoryRepository $categoryRepository,
        BrandRepository $brandRepository,
        OrderRepository $orderRepository,
        WarrantyPackageRepository $warrantyPackageRepository,
        Utility $utility
    ) {
        $this->productRepository = $productRepository;
        $this->categoryRepository = $categoryRepository;
        $this->brandRepository = $brandRepository;
        $this->orderRepository = $orderRepository;
        $this->warrantyPackageRepository = $warrantyPackageRepository;
        $this->utility = $utility;
    }

    public function index(Request $request)
    {
        $getCategory = $request->get('category');
        $getStatus = $request->get('status');
        $getBrand = $request->get('brand');
        $getSearchName = $request->get('s');

        $listProducts = $this->productRepository->getListProductWithFilter();
        $categoryFilter = [];
        $brandFilter = [];

        foreach ($listProducts as $product) {
            $product->detail = json_decode($product->detail, true);
            $product->detail_tech  = json_decode($product->detail_tech, true);
            $product->image = json_decode($product->image, true);
            if (!array_key_exists($product->category->id, $categoryFilter)) {
                $categoryFilter[$product->category->id] = $product->category;
            }

            if (!array_key_exists($product->brands->id, $brandFilter)) {
                $brandFilter[$product->brands->id] = $product->brands;
            }
        }

        if (isset($getCategory)) {
            if ($getCategory != 'all') {
                $listProducts = $listProducts->where('category.id', $getCategory);
            }
        }

        if (isset($getStatus)) {
            if ($getStatus != 'all') {
                $listProducts = $listProducts->where('status', $getStatus);
            }
        }

        if (isset($getBrand)) {
            if ($getBrand != 'all') {
                $listProducts = $listProducts->where('brands.id', $getBrand);
            }
        }

        if (isset($getSearchName)) {
            if ($getSearchName != '') {
                $listProducts = $listProducts->filter(function ($item) use ($getSearchName) {
                    return strpos($item->name, $getSearchName) !== false;
                });
            }
        }

        $listProducts = $this->utility->paginate($listProducts);

        return view('admin.product.index', compact('listProducts', 'categoryFilter', 'brandFilter'));
    }

    public function createProduct()
    {
        $statusProduct = Product::STATUS;
        $listCategories = $this->categoryRepository->indexOnlyChild();
        $listBrands = $this->brandRepository->index();
        $warrantyPackageProduct = $this->warrantyPackageRepository->getListWarrantyPackage();

        return view('admin.product.create', compact('listCategories', 'statusProduct', 'listBrands', 'warrantyPackageProduct'));
    }

    public function storeProduct(ProductRequest $request)
    {
        $input = $request->except(['_token']);
        $detail = [];
        $detail_tech = [];

        if (isset($input['detail_key'])) {
            for ($i = 0; $i < count($input['detail_key']); $i++) {
                $detail[$input['detail_key'][$i]] = $input['detail_value'][$i];
            }
            $input['detail'] = json_encode($detail);
        }

        if (isset($input['detail_tech_key'])) {
            for ($i = 0; $i < count($input['detail_tech_key']); $i++) {
                $detail_tech[$input['detail_tech_key'][$i]] = $input['detail_tech_value'][$i];
            }
            $input['detail_tech'] = json_encode($detail_tech);
        }

        if (isset($input['hot_status'])) {
            $input['hot_status'] = 1;
        }

        if (isset($input['hot_sale_status'])) {
            $input['hot_sale_status'] = 1;
        }

        if (empty($input['title'])) {
            $input['title'] = $input['name'];
        }

        if (empty($input['short_description'])) {
            $strip_tags = strip_tags($input['description']);
            $explode = explode(' ', $strip_tags);
            $count = 0;
            $preText = '';
            foreach ($explode as $text) {
                if ($count == 160) {
                    break;
                }

                if ($count == 0) {
                    $preText .= $text;
                } else {
                    $preText .= ' ' . $text;
                }

                $count++;
            }
            $input['short_description'] = $preText;
        }

        $input['slug'] =  Str::slug($input['name']);

        if ($input['warranty_package_id'] == 'none') {
            $input['warranty_package_id'] = null;
        }

        if ($request->hasfile('image')) {
            if (isset($input['image_preview'])) {
                $explode = explode(',', $input['image_preview']);
                foreach ($explode as $preview)
                    foreach ($request->file('image') as $file) {
                        if ($file->getClientOriginalName() == $preview) {
                            $file->move(public_path('images/upload/product/'), $file->getClientOriginalName());
                            $imgData[] = 'images/upload/product/' . $file->getClientOriginalName();
                        }
                    }
                $input['image'] = json_encode($imgData);
            }
        }

        $this->productRepository->store($input);
        Cache::store('redis')->forget('menu_homepage');

        return redirect()->route('admin.product.index')->with('success',  __('Sản phẩm được thêm thành công'));
    }

    public function editProduct($id)
    {
        $statusProduct = Product::STATUS;
        $listCategories = $this->categoryRepository->indexOnlyChild();
        $listBrands = $this->brandRepository->index();
        $product = $this->productRepository->show($id);
        $product->detail = json_decode($product->detail, true);
        $product->detail_tech = json_decode($product->detail_tech, true);
        $product->image = json_decode($product->image, true);
        $warrantyPackageProduct = $this->warrantyPackageRepository->getListWarrantyPackage();
        if (empty($product)) {
            return redirect('/404');
        }

        return view('admin.product.edit', compact('product', 'listCategories', 'statusProduct', 'listBrands', 'warrantyPackageProduct'));
    }

    public function updateProduct(ProductUpdateRequest $request, $id)
    {
        $input = $request->except(['_token']);
        $detail = [];
        $detail_tech = [];

        if (empty($input['image_preview']) or $input['image_preview'] == null) {
            return redirect()->back()->with(['error' => 'Image null']);
        }

        if (isset($input['hot_status'])) {
            $input['hot_status'] = 1;
        } else {
            $input['hot_status'] = 0;
        }

        if (isset($input['hot_sale_status'])) {
            $input['hot_sale_status'] = 1;
        } else {
            $input['hot_sale_status'] = 0;
        }

        if (empty($input['title'])) {
            $input['title'] = $input['name'];
        }

        if (empty($input['short_description'])) {
            $strip_tags = strip_tags($input['description']);
            $explode = explode(' ', $strip_tags);
            $count = 0;
            $preText = '';
            foreach ($explode as $text) {
                if ($count == 160) {
                    break;
                }

                if ($count == 0) {
                    $preText .= $text;
                } else {
                    $preText .= ' ' . $text;
                }

                $count++;
            }
            $input['short_description'] = $preText;
        }

        if (isset($input['detail_key'])) {
            for ($i = 0; $i < count($input['detail_key']); $i++) {
                $detail[$input['detail_key'][$i]] = $input['detail_value'][$i];
            }

            $input['detail'] = json_encode($detail);
        }

        if (isset($input['detail_tech_key'])) {
            for ($i = 0; $i < count($input['detail_tech_key']); $i++) {
                $detail_tech[$input['detail_tech_key'][$i]] = $input['detail_tech_value'][$i];
            }

            $input['detail_tech'] = json_encode($detail_tech);
        }

        if ($request->hasfile('image')) {
            foreach ($request->file('image') as $file) {
                $file->move(public_path('images/upload/product/'), $file->getClientOriginalName());
            }
        }

        $explodeImagePreview = explode(',', $input['image_preview']);
        foreach ($explodeImagePreview as $preview) {
            $imgData[] = 'images/upload/product/' . $preview;
        }

        $input['image'] = json_encode($imgData);

        if ($input['warranty_package_id'] == 'none') {
            $input['warranty_package_id'] = null;
        }

        unset($input['detail_key']);
        unset($input['detail_tech_key']);
        unset($input['detail_value']);
        unset($input['detail_tech_value']);
        unset($input['image_preview']);

        $this->productRepository->update($input, $id);
        Cache::store('redis')->forget('menu_homepage');

        return redirect()->route('admin.product.index')->with('success', __('Sản phẩm được thay đổi thành công'));
    }

    public function deleteProduct($id)
    {
        $this->productRepository->destroy($id);
        Cache::store('redis')->forget('menu_homepage');

        return back()->with('success', __('Sản phẩm được xóa thành công'));
    }

    public function managerSold()
    {
        $getOrder = $this->orderRepository->getAllOrder();
        $managerSold = [];

        foreach ($getOrder as $order) {
            $detail = [];
            $detail['order_code'] = $order->order_code;
            $detail['name'] = $order->name;
            $detail['phone'] = $order->phone;
            $detail['created_at'] = $order->created_at;

            if (isset($order->orderDetails)) {
                foreach ($order->orderDetails as $detailOrder) {
                    if (isset($detailOrder->product)) {
                        $guarantee = '';
                        $statusDate = '';
                        if ($detailOrder->product->status_guarantee_month != null) {
                            $guarantee = $detailOrder->product->status_guarantee_month;
                            $statusDate = 'month';
                        } elseif ($detailOrder->product->status_guarantee_year != null) {
                            $guarantee = $detailOrder->product->status_guarantee_year;
                            $statusDate = 'year';
                        } else {
                        }

                        $orderDate = $order->created_at;
                        $now = date('Y-m-d H:i:s');
                        if ($statusDate == 'month') {
                            $strToTime = '+' . $detailOrder->product->status_guarantee_month . ' months';
                            $date = strtotime($orderDate);
                            $newDate = date('Y-m-d H:i:s', strtotime($strToTime, $date));
                            $date1 = date_create($newDate);
                            $date2 = date_create(date("Y-m-d H:i:s"));

                            $diff = date_diff($date1, $date2);
                            $guarantee = $diff->format("%a ngày");
                        } elseif ($statusDate == 'year') {
                            $strToTime = '+' . $detailOrder->product->status_guarantee_year . ' years';
                            $date = strtotime($orderDate);
                            $newDate = date('Y-m-d H:i:s', strtotime($strToTime, $date));
                            $date1 = date_create($newDate);
                            $date2 = date_create(date("Y-m-d H:i:s"));

                            $diff = date_diff($date1, $date2);
                            $guarantee = $diff->format("%a ngày");
                        } else {
                            $guarantee = $detailOrder->product->status_guarantee;
                        }
                        $detail['detail'][$detailOrder->product->name]['guarantee'] = $guarantee;
                    }

                    if (isset($detailOrder->quantity)) {
                        $detail['detail'][$detailOrder->product->name]['quantity'] = $detailOrder->quantity;
                    }

                    if (isset($detailOrder->price)) {
                        $detail['detail'][$detailOrder->product->name]['price'] = $detailOrder->price;
                    }

                    if (isset($detailOrder->price)) {
                        $detail['detail'][$detailOrder->product->name]['price'] = $detailOrder->price;
                    }

                    if (isset($detailOrder->warrantyPackage)) {
                        $detail['detail'][$detailOrder->product->name]['warranty'] = $detailOrder->warrantyPackage;
                    }
                }
            }

            $managerSold[] = $detail;
        }

        $managerSold = $this->utility->paginate($managerSold);

        return view('admin.product.manager-sold', compact('managerSold'));
    }

    public function exportProduct()
    {
        $products = $this->productRepository->getListProduct();
        return Excel::download(new ExportProduct($products), 'product.xlsx');
    }
}
