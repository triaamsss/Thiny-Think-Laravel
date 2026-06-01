<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ClassRoom extends Model
{
    protected $fillable = ['name', 'entry_code', 'description', 'is_active'];

    protected $casts = ['is_active' => 'boolean'];

    public function setEntryCodeAttribute(string $value): void
    {
        $this->attributes['entry_code'] = strtoupper($value);
    }

    public function players(): HasMany
    {
        return $this->hasMany(Player::class, 'classroom_id');
    }
}