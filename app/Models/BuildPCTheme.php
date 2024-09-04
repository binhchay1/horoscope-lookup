<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BuildPCTheme extends Model
{
    use HasFactory;

    protected $table = 'build_pc_theme';

    protected $fillable = [
        'youtube', 'content'
    ];
}
