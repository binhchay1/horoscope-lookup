<?php

namespace App\Repositories;

use App\Models\StoryStorage;

class StoryStorageRepository extends BaseRepository

{
    public function model()
    {
        return StoryStorage::class;
    }

    public function index()
    {
        return $this->model->orderBy('created_at', 'DESC')->paginate(10);
    }

    public function create($input)
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

    public function getStoryProduct($product_id)
    {
        return $this->model->with('users', 'products')->where('product_id', $product_id)->get();
    }
}
