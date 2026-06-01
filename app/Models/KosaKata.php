<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KosaKata extends Model
{
    protected $table = 'kosa_kata';

    protected $fillable = [
        'kategori',
        'label',
        'kata',
        'suku',
        'emoji',
        'audio',
        'tipe_game',
    ];

    protected $casts = [
        'suku' => 'array',
    ];
}