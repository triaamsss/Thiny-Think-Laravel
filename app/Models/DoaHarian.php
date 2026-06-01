<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DoaHarian extends Model
{
    protected $fillable = [
        'title',
        'key',
        'tag',
        'image',
        'audio',
        'arab',
        'latin',
        'arti',
    ];
}