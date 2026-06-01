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

            $table->string('key')->unique();

            $table->string('tag')->nullable();

            $table->string('image')->nullable();

            $table->string('audio')->nullable();

            $table->longText('arab')->nullable();

            $table->longText('latin')->nullable();

            $table->longText('arti')->nullable();

            $table->timestamps();

        });
    }
};