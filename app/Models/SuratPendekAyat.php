<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SuratPendekAyat extends Model
{
    protected $fillable = [
        'surat_pendek_id',
        'no_ayat',
        'audio',
        'arab',
        'latin',
        'arti',
    ];

    public function suratPendek()
    {
        return $this->belongsTo(SuratPendek::class, 'surat_pendek_id');
    }
}