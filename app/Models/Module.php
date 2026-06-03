<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Lesson;

class Module extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'description',
    ];

    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }
}