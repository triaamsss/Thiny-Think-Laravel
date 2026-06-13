<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SuratPendek extends Model
{
    protected $fillable = [
        'title',
        'key',
        'arab_title',
        'jumlah_ayat',
        'emoji',
        'thumbnail',
        'description',
    ];

    public function ayats()
    {
        return $this->hasMany(SuratPendekAyat::class, 'surat_pendek_id');
    }
}