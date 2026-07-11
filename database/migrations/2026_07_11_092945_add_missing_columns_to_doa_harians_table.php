<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('doa_harians', function (Blueprint $table) {
            $table->string('key')->nullable()->after('title');
            $table->string('tag')->nullable()->after('key');
            $table->string('image')->nullable()->after('tag');
            $table->string('quiz_image')->nullable()->after('image');
            $table->string('quiz_audio')->nullable()->after('audio');
        });
    }

    public function down(): void
    {
        Schema::table('doa_harians', function (Blueprint $table) {
            $table->dropColumn([
                'key',
                'tag',
                'image',
                'quiz_image',
                'quiz_audio',
            ]);
        });
    }
};