<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('doa_harians', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('emoji')->nullable();
            $table->text('arab')->nullable();
            $table->text('latin')->nullable();
            $table->text('arti')->nullable();
            $table->string('audio')->nullable();
            $table->integer('order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('doa_harians');
    }
};