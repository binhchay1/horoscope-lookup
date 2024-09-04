<?php

namespace App\Repositories;

use App\Models\SessionProductViewed;

class SessionProductViewedRepository extends BaseRepository
{
    public function model()
    {
        return SessionProductViewed::class;
    }

    public function updateBySessionID($session_id, $data)
    {
        return $this->model->where('session_id', $session_id)->update($data);
    }

    public function getDataBySessionID($session_id)
    {
        return $this->model->where('session_id', $session_id)->first();
    }
}
