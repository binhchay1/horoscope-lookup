<?php

namespace App\Http\Controllers\Admin;

use App\Exports\ExportOrder;
use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequest;
use App\Models\Order;
use App\Repositories\OrderRepository;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class OrderController extends Controller
{
    private $orderRepository;

    public function __construct(
        OrderRepository $orderRepository
    ) {
        $this->orderRepository = $orderRepository;
    }

    public function index()
    {
        $listOrders = $this->orderRepository->index();
        foreach ($listOrders as $order) {
            $total = 0;
            foreach ($order->orderDetails as $detail) {
                $total += $detail->quantity * $detail->price;
            }

            $order->total = $total;
        }
        return view('admin.order.index', compact('listOrders'));
    }

    public function createOrder()
    {
        return view('admin.order.create');
    }

    public function storeOrder(OrderRequest $request)
    {
        $input = $request->except(['_token']);
        $input = $request->all();
        $this->orderRepository->create($input);

        return redirect()->route('admin.order.index')->with('success',  __('Đơn hàng được thay đổi thành công'));
    }

    public function showOrder($id)
    {
        $this->orderRepository->show($id);
    }

    public function editOrder($id)
    {
        $orderDetail = $this->orderRepository->show($id);
        $total = 0;
        foreach ($orderDetail->orderDetails as $detail) {
            $total += $detail->quantity * $detail->price;
        }

        $orderDetail->total = $total;
        $statusOrder = \App\Enums\Order::STATUS;
        return view('admin.order.edit', compact('orderDetail', 'statusOrder'));
    }

    public function updateOrder(Request $request,  $id)
    {
        $input = $request->except(['_token']);
        $input = $this->orderRepository->update($input, $id);

        return redirect()->route('admin.order.index')->with('success', 'Đơn hàng được thay đổi thành công.');
    }

    public function deleteOrder($id)
    {
        $order = $this->orderRepository->destroy($id);
        if (empty($order)) {
            return redirect('/404');
        }
        return back()->with('success', 'Đơn hàng được xóa thành công.');
    }

    public function export()
    {
        $orders = $this->orderRepository->getAllOrder();

        return Excel::download(new ExportOrder($orders), 'order.xlsx');
    }

    public function activeOrder($id)
    {
        $order = Order::find($id);
        if ($order->status) {
            $order->status = 0;
        } else {
            $order->status = 1;
        }
        $order->save();

        return back();
    }
}
