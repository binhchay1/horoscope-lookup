<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SessionBuildPC extends Model
{
    use HasFactory;

    protected $table = 'session_build_pc';

    protected $fillable = [
        'build_id', 'data_build', 'data_menu'
    ];
}
