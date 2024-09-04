<?php

namespace App\Repositories;

use App\Models\OrderDetail;

class OrderDetailRepository extends BaseRepository
{

    public function model()
    {
        return  OrderDetail::class;
    }

    public function index()
    {
        return $this->model->with('order', 'product')->orderBy('created_at', 'desc')->paginate(10);
    }

    public function getOrderDetailByOrderId($order_id)
    {
        return $this->model->with('order', 'product')->where('order_id', $order_id)->get();
    }
}
