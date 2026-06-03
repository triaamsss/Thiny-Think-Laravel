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
        'quiz_image',
        'audio',
        'quiz_audio',
        'arab',
        'latin',
        'arti',
];
}