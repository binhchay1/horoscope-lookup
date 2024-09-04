<?php

namespace App\Repositories;

use App\Models\Visitor;

class VisitorRepository extends BaseRepository

{
    public function model()
    {
        return Visitor::class;
    }

    public function getVisitorByIp($ip, $month, $year)
    {
        return $this->model->where('ip_address', $ip)->where('month', $month)->where('year', $year)->first();
    }

    public function create($input)
    {
        return $this->model->create($input);
    }

    public function update($input, $id)
    {
        return $this->model->where('id', $id)->update($input);
    }

    public function getVisitorForStatic($year)
    {
        return $this->model->where('year', $year)->get();
    }

    public function getYearInVisitor()
    {
        return $this->model->select('year')->groupBy('year')->get();
    }
}
