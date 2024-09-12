<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;

    private $name;
    private $dayOfBirth;
    private $monthOfBirth;
    private $yearOfBirth;
    private $can;
    private $chi;
    private $hourOfBirth;
    private $tuoiAmHayDuong;
    private $gender;
    private $menh;

    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'age',
        'address',
        'sex',
        'profile_photo_path',
        'title',
        'role',
        'id'
    ];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $appends = [
        'profile_photo_url',
    ];

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getDayOfBirth()
    {
        return $this->dayOfBirth;
    }

    public function setDayOfBirth($dayOfBirth)
    {
        $this->dayOfBirth = $dayOfBirth;
    }

    public function getMonthOfBirth()
    {
        return $this->monthOfBirth;
    }

    public function setMonthOfBirth($monthOfBirth)
    {
        $this->monthOfBirth = $monthOfBirth;
    }

    public function getYearOfBirth()
    {
        return $this->yearOfBirth;
    }

    public function setYearOfBirth($yearOfBirth)
    {
        $this->yearOfBirth = $yearOfBirth;
    }

    public function getCan()
    {
        return $this->can;
    }

    public function setCan($can)
    {
        $this->can = $can;
    }

    public function getChi()
    {
        return $this->chi;
    }

    public function setChi($chi)
    {
        $this->chi = $chi;
    }

    public function getHourOfBirth()
    {
        return $this->hourOfBirth;
    }

    public function setHourOfBirth($hourOfBirth)
    {
        $this->hourOfBirth = $hourOfBirth;
    }

    public function getTuoiAmHayDuong()
    {
        return $this->tuoiAmHayDuong;
    }

    public function setTuoiAmHayDuong($tuoiAmHayDuong)
    {
        $this->tuoiAmHayDuong = $tuoiAmHayDuong;
    }

    public function getGender()
    {
        return $this->gender;
    }

    public function setGender($gender)
    {
        $this->gender = $gender;
    }

    public function getMenh()
    {
        return $this->menh;
    }

    public function setMenh($menh)
    {
        $this->menh = $menh;
    }

    public function __toString()
    {
        return "User{" .
            "name='" . $this->name . "'" .
            ", dayOfBirth=" . $this->dayOfBirth .
            ", monthOfBirth=" . $this->monthOfBirth .
            ", yearOfBirth=" . $this->yearOfBirth .
            ", can='" . $this->can->__toString() . "'" .
            ", chi='" . $this->chi->__toString() . "'" .
            ", hourOfBirth='" . $this->hourOfBirth . "'" .
            ", tuoiAmHayDuong='" . $this->tuoiAmHayDuong . "'" .
            ", gender='" . $this->gender . "'" .
            ", menh='" . $this->menh . "'" .
            '}';
    }
}
