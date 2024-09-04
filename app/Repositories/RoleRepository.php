<?php

namespace App\Repositories;

use App\Models\Role;

class RoleRepository extends BaseRepository
{
    public function model()
    {
        return Role::class;
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
}
