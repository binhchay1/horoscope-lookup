<?php

namespace App\Repositories;

use App\Models\CategoryPost;

class CategoryPostRepository extends BaseRepository
{
    public function model()
    {
        return CategoryPost::class;
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

    public function getListCategoryExcludeId($id)
    {
        return $this->model->where('id', '!=', $id)->get();
    }

    public function getListCategoryPost()
    {
        return $this->model->orderBy('created_at', 'desc')->take(6)->get();
    }

    public function getCatePost($slug)
    {
        return $this->model->with('posts')->where('slug', $slug)->first();
    }

    public function getCate($slug)
    {
        return $this->model->with('posts')->where('slug', $slug)->first();
    }

    public function getListWithSortParent()
    {
        return $this->model->with('children')->where('parent', 0)->paginate(30);
    }
}
