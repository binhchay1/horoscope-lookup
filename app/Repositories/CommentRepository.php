<?php

namespace App\Repositories;

use App\Models\Comment;

class CommentRepository extends BaseRepository
{
    public function model()
    {
        return Comment::class;
    }

    public function index()
    {
        return $this->model->with('product', 'user')->orderBy('created_at', 'desc')->paginate(10);
    }

    public function store($input)
    {
       return $this->model->create($input);
    }

    public function destroy($id)
    {
        return $this->model->where('id', $id)->delete();
    }

}
