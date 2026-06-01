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
        Schema::create('quizzes', function (Blueprint $table) {
    
            $table->id();
    
            $table->string('category')->nullable();
    
            $table->text('question');
    
            $table->string('audio')->nullable();
    
            $table->string('option_a');
            $table->string('option_a_image')->nullable();
    
            $table->string('option_b');
            $table->string('option_b_image')->nullable();
    
            $table->string('option_c');
            $table->string('option_c_image')->nullable();
    
            $table->string('correct_answer');
    
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quizzes');
    }
};
