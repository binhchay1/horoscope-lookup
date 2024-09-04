<?php

namespace App\Repositories;

use App\Models\SessionBuildPC;

class SessionBuildPCRepository extends BaseRepository
{
    public function model()
    {
        return SessionBuildPC::class;
    }

    public function store($input)
    {
        return $this->model->create($input);
    }

    public function updateByBuildID($build_id, $data)
    {
        return $this->model->where('build_id', $build_id)->update($data);
    }

    public function getDataByBuildID($build_id) {
        return $this->model->where('build_id', $build_id)->first();
    }
}
