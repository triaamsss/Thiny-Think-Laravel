<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('surat_pendeks', function (Blueprint $table) {
            
            if (!Schema::hasColumn('surat_pendeks', 'arab_title')) {
                $table->string('arab_title')->nullable()->after('title');
            }
        });
    }

    public function down(): void
    {
        Schema::table('surat_pendeks', function (Blueprint $table) {
            $table->dropColumn('arab_title');
        });
    }
};