<?php

namespace App\Repositories;

use App\Models\Post;

class PostRepository extends BaseRepository
{

    public function model()
    {
        return Post::class;
    }

    public function getListPostWithFilter()
    {
        return $this->model->with('user', 'category')->orderBy('created_at', 'DESC')->get();
    }

    public function index()
    {
        return $this->model->with('user', 'category')->orderBy('created_at', 'DESC')->paginate(10);
    }

    public function getPostLimit()
    {
        return $this->model->with('user', 'category')->orderBy('created_at', 'DESC')->get()->take(6);
    }

    public function postHome()
    {
        return $this->model->with('user', 'category')->orderBy('created_at', 'DESC')->get();
    }

    public function firstPost()
    {
        return $this->model->with('user', 'category')->orderBy('id', 'DESC')->first();
    }

    public function secondPost() {
        return $this->model->with('user', 'category')->orderBy('id', 'ASC')->first();
    }

    public function postRandom5() {
        return $this->model->with('user', 'category')->orderBy('created_at', 'ASC')->get()->take(10);
    }

    public function postRandom6()
    {
        return $this->model->with('user', 'category')->orderBy('created_at', 'DESC')->get()->take(5);

    }

    public function listRandom()
    {
        return $this->model->with('user', 'category')->orderBy('created_at', 'DESC')->get();
    }

    public function listPostDESC()
    {
        return $this->model->with('user', 'category')->orderBy('created_at', 'ASC')->get()->take(3);
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

    public function getListNewsInHomepage()
    {
        return $this->model->with('user', 'category')->orderBy('created_at', 'DESC')->get()->take(5);
    }

    public function detail($slug)
    {
        return $this->model->where('slug', $slug)->first();
    }
}
