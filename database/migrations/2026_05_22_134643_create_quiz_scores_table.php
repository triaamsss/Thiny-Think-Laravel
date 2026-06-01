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
        Schema::create('quiz_scores', function (Blueprint $table) {
            $table->id();
            $table->foreignId('player_id')->constrained('players')->cascadeOnDelete();
            $table->enum('quiz_type', ['basic', 'advanced']);
            $table->unsignedSmallInteger('score');
            $table->unsignedTinyInteger('correct_answers');
            $table->unsignedTinyInteger('total_questions');
            $table->timestamp('completed_at');
            $table->timestamps();
            $table->unique(['player_id', 'quiz_type']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quiz_scores');
    }
};