<?php

namespace App\Repositories;

use App\Models\Social;

class SocialRepository extends BaseRepository

{
    public function model()
    {
        return Social::class;
    }

    public function index()
    {
        return $this->model->first();
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

    public function deleteByIdThumb($id)
    {
        return $this->model->where('id', 1)->update([$id => null]);
    }
}
