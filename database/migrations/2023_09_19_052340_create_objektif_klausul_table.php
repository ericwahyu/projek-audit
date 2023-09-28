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
        Schema::create('objektif_klausul', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('objektif_id');
            $table->unsignedBigInteger('klausul_id');
            $table->timestamps();

            $table->foreign('objektif_id')->references('id')->on('objektif')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('klausul_id')->references('id')->on('klausul')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('objektif_klausul');
    }
};
