<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\CustomContactRepository;
use App\Repositories\LayoutRepository;
use App\Repositories\MaintenanceModeRepository;
use App\Repositories\ProductRepository;
use App\Repositories\OrderRepository;
use App\Repositories\VisitorRepository;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Config;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    private $customContactRepository;
    private $orderRepository;
    private $productRepository;
    private $visitorRepository;
    private $maintenanceModeRepository;
    private $layoutRepository;

    public function __construct(
        CustomContactRepository $customContactRepository,
        OrderRepository $orderRepository,
        ProductRepository $productRepository,
        VisitorRepository $visitorRepository,
        MaintenanceModeRepository $maintenanceModeRepository,
        LayoutRepository $layoutRepository
    ) {
        $this->customContactRepository = $customContactRepository;
        $this->orderRepository = $orderRepository;
        $this->productRepository = $productRepository;
        $this->visitorRepository = $visitorRepository;
        $this->maintenanceModeRepository = $maintenanceModeRepository;
        $this->layoutRepository = $layoutRepository;
    }

    public function changeLocate($locale)
    {
        if ($locale) {
            if (in_array($locale, Config::get('app.locales'))) {
                App::setLocale($locale);
                Session::put('lang', $locale);
                Session::save();

                return redirect()->back()->with('locale', $locale);
            }
        }

        return redirect()->back();
    }

    public function viewDashBoard(Request $request)
    {
        $getOrder = $this->orderRepository->getYearInOrder();
        $getVisiter = $this->visitorRepository->getYearInVisitor();
        $arrayYearOrder = [];
        $arrayYearVisitor = [];
        foreach ($getOrder as $itemOrder) {
            $explode = explode('-', $itemOrder->order_date);
            if (!in_array($explode[0], $arrayYearOrder)) {
                $arrayYearOrder[] = $explode[0];
            }
        }

        foreach ($getVisiter as $itemVisitor) {
            if (!in_array($itemVisitor, $arrayYearVisitor)) {
                $arrayYearVisitor[] = $itemVisitor->year;
            }
        }

        $orderStatic = $this->orderRepository->getOrderForStatic();
        $productStatic = $this->productRepository->getProductForStatic();
        $orderStatic->setPageName('order_page');
        $productStatic->setPageName('product_page');

        foreach ($orderStatic as $order) {
            $total = 0;
            foreach ($order->orderDetails as $detail) {
                $total += $detail->quantity * $detail->price;
            }

            $order->total = $total;
        }

        foreach ($productStatic as $product) {
            $income = 0;
            $totalQuantity = 0;

            foreach ($product->orderDetails as $orderDetails) {
                $income += $orderDetails->quantity * $orderDetails->price;
                $totalQuantity += $orderDetails->quantity;
            }

            $product->income = $income;
            $product->total_quantity = $totalQuantity;
        }

        return view('admin.dashboard', compact('orderStatic', 'productStatic', 'arrayYearOrder', 'arrayYearVisitor'));
    }

    public function viewFlashSale()
    {
        $layout = $this->layoutRepository->getListLayout();
        if (isset($layout->flash_sale_list_product_id)) {
            $listFlashSale = json_decode($layout->flash_sale_list_product_id, true);
        }

        if (isset($layout->flash_sale_timer)) {
            $explode = explode(' ', $layout->flash_sale_timer);
            $layout->flash_sale_timer = $explode[0];
        }

        return view('admin.flash-sale', compact('layout', 'listFlashSale'));
    }

    public function storeFlashSale(Request $request)
    {
        $input = $request->except(['_token']);
        $data = [];
        if (array_key_exists('product_id', $input)) {
            for ($i = 0; $i < count($input['product_id']); $i++) {
                $listProduct[$input['product_id'][$i]] = [
                    'quantity' => $input['quantity'][$i],
                    'new_price' => $input['new_price'][$i],
                    'stock' => $input['stock'][$i]
                ];
            }

            $data['flash_sale_list_product_id'] = json_encode($listProduct);
        }

        if (array_key_exists('flash_sale_timer', $input)) {
            $data['flash_sale_timer'] = $input['flash_sale_timer'];
        }

        if (!empty($data)) {
            $getLayout = $this->layoutRepository->getListLayout();
            if (!empty($getLayout)) {
                $this->layoutRepository->update($getLayout->id, $data);
            } else {
                $this->layoutRepository->store($data);
            }
        }

        return back()->with('success', __('Flash sale sửa thành công'));
    }

    public function detailDetail($id)
    {
        $orderDetail = $this->orderRepository->show($id);
        $total = 0;
        foreach ($orderDetail->orderDetails as $detail) {
            $total += $detail->quantity * $detail->price;
        }

        $orderDetail->total = $total;

        return view('admin.order.order-detail', compact('orderDetail'));
    }

    public function listCustomContact()
    {
        $listCustomContact = $this->customContactRepository->paginate();

        return view('admin.custom-contact.index', compact('listCustomContact'));
    }

    public function getDataForIncomeChart(Request $request)
    {
        $year = $request->get('year');

        if (!isset($year)) {
            $year = date('Y');
            $change = false;
        } else {
            $change = true;
        }

        $getOrder = $this->orderRepository->getOrderForStaticIncome($year);

        $data = [
            '01' => 0,
            '02' => 0,
            '03' => 0,
            '04' => 0,
            '05' => 0,
            '06' => 0,
            '07' => 0,
            '08' => 0,
            '09' => 0,
            '10' => 0,
            '11' => 0,
            '12' => 0,
        ];

        foreach ($getOrder as $order) {
            $explodeDate = explode(' ', $order->created_at);
            $explodeMonth = explode('-', $explodeDate[0]);
            $month = $explodeMonth[1];
            $total = 0;
            $arrMonth[] = $month;
            foreach ($order->orderDetails as $detail) {
                $total += ($detail->price * $detail->quantity);
            }

            $data[$month] += $total;
        }

        $response = [
            'data' => $data,
            'change' => $change
        ];

        return response()->json($response);
    }

    public function getDataForVisitorChart(Request $request)
    {
        $year = $request->get('year');

        if (!isset($year)) {
            $year = date('Y');
            $change = false;
        } else {
            $change = true;
        }

        $getVisitor = $this->visitorRepository->getVisitorForStatic($year);
        $data = [
            '01' => 0,
            '02' => 0,
            '03' => 0,
            '04' => 0,
            '05' => 0,
            '06' => 0,
            '07' => 0,
            '08' => 0,
            '09' => 0,
            '10' => 0,
            '11' => 0,
            '12' => 0,
        ];

        foreach ($getVisitor as $visitor) {
            foreach ($data as $key => $val) {
                if ($visitor->month == $key) {
                    $data[$key] += 1;
                }
            }
        }

        $response = [
            'data' => $data,
            'change' => $change
        ];

        return response()->json($response);
    }

    public function changeMaintenance()
    {
        $statusMode = $this->maintenanceModeRepository->index();
        if (empty($statusMode)) {
            $dataCreate = [
                'status' => 'on'
            ];
            $this->maintenanceModeRepository->create($dataCreate);

            return redirect()->back();
        }

        if ($statusMode->status == 'off') {
            $dataUpdate = [
                'status' => 'on'
            ];
        } else {
            $dataUpdate = [
                'status' => 'off'
            ];
        }

        $this->maintenanceModeRepository->update($dataUpdate);

        return redirect()->back();
    }
}
