<?php

namespace App\Repositories;

use App\Models\MaintenanceMode;

class MaintenanceModeRepository extends BaseRepository

{
    public function model()
    {
        return MaintenanceMode::class;
    }

    public function index()
    {
        return $this->model->first();
    }

    public function update($input)
    {
        return $this->model->where('id', 1)->update($input);
    }
}
