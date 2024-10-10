<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\CustomContactRepository;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Config;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    private $orderRepository;
    private $productRepository;
    private $visitorRepository;

    public function __construct(
        CustomContactRepository $customContactRepository,
    ) {
        $this->customContactRepository = $customContactRepository;
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
}
