<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('surat_pendek_ayats', function (Blueprint $table) {
            $table->id();

            $table->foreignId('surat_pendek_id')
                ->constrained('surat_pendek')
                ->onDelete('cascade');

            $table->integer('no_ayat')->nullable();
            $table->string('audio')->nullable();
            $table->longText('arab')->nullable();
            $table->longText('latin')->nullable();
            $table->longText('arti')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('surat_pendek_ayats');
    }
};