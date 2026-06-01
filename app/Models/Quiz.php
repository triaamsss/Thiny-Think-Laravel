<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    protected $fillable = [
        'category',
        'question',
        'audio',
        'option_a',
        'option_a_image',
        'option_b',
        'option_b_image',
        'option_c',
        'option_c_image',
        'correct_answer',
    ];
}