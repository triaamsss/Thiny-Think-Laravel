<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('kosa_kata', function (Blueprint $table) {
            $table->id();
            $table->string('kategori');
            $table->string('label')->nullable();
            $table->string('kata');
            $table->json('suku')->nullable();
            $table->string('emoji')->nullable();
            $table->string('audio')->nullable();
            $table->string('tipe_game')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kosa_kata');
    }
};