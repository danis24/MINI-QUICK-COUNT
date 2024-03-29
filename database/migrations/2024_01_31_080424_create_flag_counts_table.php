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
        Schema::create('flag_counts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('village_id');
            $table->unsignedBigInteger('flag_id');
            $table->integer('count');
            $table->timestamps();

            $table->foreign('village_id')->references('id')->on('villages');
            $table->foreign('flag_id')->references('id')->on('flags');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('flag_counts');
    }
};
