<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository extends BaseRepository

{
    public function model()
    {
        return User::class;
    }

    public function index()
    {
        return $this->model->orderBy('created_at', 'DESC')->paginate(10);
    }

    public function store($input)
    {
        return $this->model->create($input);
    }

    public function show($id)
    {
        return $this->model->with('orders.orderDetails')->where('id', $id)->first();
    }

    public function update($input, $id)
    {
        return $this->model->where('id', $id)->update($input);
    }

    public function destroy($id)
    {
        return $this->model->where('id', $id)->delete();
    }

    public function getUserByGoogle($googleID)
    {
        return $this->model->where('google_id', $googleID)->first();
    }

    public function getUserByFacebook($facebookID)
    {
        return $this->model->where('facebook_id', $facebookID)->first();
    }

    public function getListUser()
    {
        return $this->model->get();
    }
}
