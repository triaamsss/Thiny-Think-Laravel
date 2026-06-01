<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('hadists', function (Blueprint $table) {

            $table->id();
        
            $table->string('title');
        
            $table->string('key')->unique();
        
            $table->string('emoji')->nullable();
        
            $table->string('video')->nullable();
        
            $table->text('arab')->nullable();
        
            $table->text('latin')->nullable();
        
            $table->text('arti')->nullable();
        
            $table->timestamps();
        
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hadists');
    }
};
