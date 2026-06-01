<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Player extends Model
{
    protected $fillable = [
        'name', 'classroom_id', 'session_token',
        'learned_basic', 'learned_fathah', 'learned_advanced',
    ];

    protected $casts = [
        'learned_basic'    => 'boolean',
        'learned_fathah'   => 'boolean',
        'learned_advanced' => 'boolean',
    ];

    public function classroom(): BelongsTo
    {
        return $this->belongsTo(ClassRoom::class, 'classroom_id');
    }

    public function quizScores(): HasMany
    {
        return $this->hasMany(QuizScore::class);
    }

    public function hasCompletedBasic(): bool
    {
        return $this->quizScores()->where('quiz_type', 'basic')->exists();
    }

    public function hasCompletedAdvanced(): bool
    {
        return $this->quizScores()->where('quiz_type', 'advanced')->exists();
    }

    /**
     * Modul unlock logic (baru):
     *
     * Modul 1 — Huruf Dasar      : selalu terbuka
     * Modul 2 — Harakat Fathah   : terbuka setelah learned_basic = true
     * Modul 3 — Kuis Dasar       : terbuka setelah learned_fathah = true
     * Modul 4 — Pencocokkan Huruf: terbuka setelah hasCompletedBasic (kuis selesai)
     */
    public function unlockedModules(): array
    {
        return [
            1 => true,
            2 => $this->learned_basic,
            3 => $this->learned_fathah,
            4 => $this->hasCompletedBasic(),
        ];
    }
}