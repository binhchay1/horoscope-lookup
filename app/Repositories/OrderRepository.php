<?php

namespace App\Repositories;

use App\Models\Order;

class  OrderRepository extends BaseRepository
{
    public function model()
    {
        return Order::class;
    }

    public function index()
    {
        return $this->model->with('orderDetails')->orderBy('order_date', 'DESC')->paginate(10);
    }

    public function create($input)
    {
        return $this->model->create($input);
    }

    public function show($id)
    {
        return $this->model->with('orderDetails')->where('id', $id)->first();
    }

    public function update($input, $id)
    {
        return $this->model->where('id', $id)->update($input);
    }

    public function destroy($id)
    {
        return $this->model->where('id', $id)->delete();
    }

    public function getOrderForStatic()
    {
        return $this->model->with('orderDetails')->orderBy('created_at', 'DESC')->paginate(10);
    }

    public function getOrderForStaticIncome($year)
    {
        return $this->model->with('orderDetails')->whereYear('created_at', $year)->get();
    }

    public function getAllOrder()
    {
        return $this->model->with('orderDetails', 'orderDetails.product', 'orderDetails.warrantyPackage')->get();
    }

    public function getYearInOrder()
    {
        return $this->model->select('order_date')->groupBy('order_date')->get();
    }
}
