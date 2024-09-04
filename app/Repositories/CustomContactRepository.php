<?php

namespace App\Repositories;

use App\Models\CustomContact;

class CustomContactRepository extends BaseRepository

{
    public function model()
    {
        return CustomContact::class;
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

    public function getListCategory()
    {
        return $this->model->with('products','products.productImages')->get();
    }
}
