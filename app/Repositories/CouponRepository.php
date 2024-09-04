<?php

namespace App\Repositories;

use App\Models\Coupon;

class CouponRepository extends BaseRepository
{
    public function model()
    {
        return Coupon::class;
    }

    public function index()
    {
        return $this->model->with('product')->orderBy('created_at', 'DESC')->paginate(10);
    }

    public function store($input)
    {
        return $this->model->create($input);
    }

    public function show($id)
    {
        return $this->model->where('id', $id)->first();
    }

    public function update($input, $id)
    {
        return $this->model->where('id', $id)->update($input);
    }

    public function destroy($id)
    {
        return $this->model->where('id', $id)->delete();
    }

    public function getCouponByCode($code)
    {
        return $this->model->where('code', $code)->first();
    }

    public function getListCoupon()
    {
        $now = date('Y-m-d');

        return $this->model->where('time_end', '>=', $now)->where('private_status', 'false')->get();
    }
}
