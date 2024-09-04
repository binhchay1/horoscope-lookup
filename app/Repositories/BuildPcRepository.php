<?php

namespace App\Repositories;

use App\Models\BuildPC;

class BuildPcRepository extends BaseRepository
{
    public function model()
    {
        return BuildPC::class;
    }

    public function index()
    {
        return $this->model->orderBy('created_at', 'ASC')->get();
    }

    public function show($id)
    {
        return $this->model->where('id', $id)->first();
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

    public function countTotalListBuildPC()
    {
        return $this->model->count();
    }
}
