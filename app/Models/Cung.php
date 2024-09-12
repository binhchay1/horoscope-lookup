<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cung extends Model
{
    use HasFactory;

    private $name;
    private $isThanMenhDongCung;

    public function __construct()
    {
        $this->isThanMenhDongCung = false;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function isThanMenhDongCung()
    {
        return $this->isThanMenhDongCung;
    }

    public function setThanMenhDongCung($thanMenhDongCung)
    {
        $this->isThanMenhDongCung = $thanMenhDongCung;
    }
}
