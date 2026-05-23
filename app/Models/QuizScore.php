<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class QuizScore extends Model
{
    protected $fillable = [
        'player_id', 'quiz_type', 'score', 'correct_answers', 'total_questions', 'completed_at',
    ];

    protected $casts = ['completed_at' => 'datetime'];

    public function player(): BelongsTo
    {
        return $this->belongsTo(Player::class);
    }
}