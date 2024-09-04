<?php

namespace App\Repositories;

use App\Models\Promotion;

class PromotionRepository extends BaseRepository
{
    public function model()
    {
        return Promotion::class;
    }

    public function index()
    {
        return $this->model->orderBy('created_at', 'DESC')->paginate(10);
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

    public function getListPromotionHomePage()
    {
        return $this->model->orderBy('created_at', 'desc')->get()->take(4);
    }

    public function promotionHome()
    {
        return $this->model->orderBy('created_at', 'DESC')->get()->take(5);
    }

    public function promotionRandom()
    {
        return $this->model->orderBy('created_at', 'DESC')->get();
    }

    public function promotionDESC()
    {
        return $this->model->orderBy('created_at', 'DESC')->get();
    }

    public function detail($slug)
    {
        return $this->model->where('slug', $slug)->first();
    }
}
