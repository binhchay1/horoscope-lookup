<?php

namespace App\Repositories;

use App\Models\CategoryFilter;

class CategoryFilterRepository extends BaseRepository
{
    public function model()
    {
        return CategoryFilter::class;
    }

    public function index()
    {
        return $this->model->with('categories')->orderBy('created_at', 'DESC')->paginate(10);
    }

    public function create($input)
    {
        return $this->model->create($input);
    }

    public function update($input, $id)
    {
        return $this->model->where('id', $id)->update($input);
    }

    public function destroy($id)
    {
        return $this->model->where('id', $id)->delete();
    }

    public function getListCategory($id)
    {
        return $this->model->select('category_id')->where('id', $id)->first();
    }

    public function show($id)
    {
        return $this->model->where('id', $id)->first();
    }
}
