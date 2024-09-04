<?php

namespace App\Repositories;

use App\Models\BuildPCTheme;

class BuildPCThemeRepository extends BaseRepository
{

    public function model()
    {
        return BuildPCTheme::class;
    }

    public function index()
    {
        return $this->model->get();
    }

    public function updateItemTheme($data)
    {
        return $this->model->where('id', 1)->update($data);
    }
}
