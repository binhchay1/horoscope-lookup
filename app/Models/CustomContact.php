<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomContact extends Model
{
    use HasFactory;

    protected $table = 'custom_contact';

    protected $fillable = [
        'contact',
    ];
}
