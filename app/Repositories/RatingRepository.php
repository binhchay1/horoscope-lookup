<?php

namespace App\Repositories;

use App\Models\Rating;
use Illuminate\Support\Facades\DB;

class RatingRepository extends BaseRepository
{
    public function model()
    {
        return Rating::class;
    }

    public function index()
    {
        return $this->model->with('product', 'user')->orderBy('created_at', 'desc')->get();
    }

    public function listRatings()
    {
        return $this->model->with('product', 'user')
            ->get();
    }

    public function store($input)
    {
        return $this->model->create($input);
    }

    public function show()
    {
        return $this->model->with('product', 'user')->first();

    }

    public function destroy($id)
    {
        return $this->model->where('id', $id)->delete();
    }
}
