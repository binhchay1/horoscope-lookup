<?php

namespace App\Imports;

use App\Models\Storage;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportStorage implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Storage([
            'name' => $row[0],
            'address' => $row[1],
        ]);
    }
}
