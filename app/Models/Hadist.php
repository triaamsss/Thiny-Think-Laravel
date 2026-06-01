<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hadist extends Model
{
    protected $fillable = [
        'title',
        'key',
        'emoji',
        'video',
        'image',
        'arab',
        'latin',
        'arti',
    ];
}