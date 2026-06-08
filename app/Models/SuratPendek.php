<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SuratPendek extends Model
{
    protected $fillable = [
        'title',
        'key',
        'emoji',
        'audio',
        'arab',
        'latin',
        'arti',
    ];
}