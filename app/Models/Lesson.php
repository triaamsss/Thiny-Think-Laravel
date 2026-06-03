<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Module;

class Lesson extends Model
{
    protected $fillable = [
        'module_id',
        'title',
        'slug',
        'content',
    ];

    public function module()
    {
        return $this->belongsTo(Module::class);
    }
}