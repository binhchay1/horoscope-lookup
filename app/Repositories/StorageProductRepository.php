<?php

namespace App\Repositories;

use App\Models\StorageProduct;

class StorageProductRepository extends BaseRepository
{
    public function model()
    {
        return StorageProduct::class;
    }

    public function create($input)
    {
        return $this->model->create($input);
    }

    public function getListProductById($id)
    {
        return $this->model->where('storage_id', $id)->get();
    }

    public function getByProductAndStorage($pID, $sID)
    {
        return $this->model->where('product_id', $pID)->where('storage_id', $sID)->first();
    }

    public function updateQuantity($pID, $sID, $data)
    {
        return $this->model->where('product_id', $pID)->where('storage_id', $sID)->update($data);
    }
}
