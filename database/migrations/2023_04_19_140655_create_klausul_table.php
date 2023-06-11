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
        Schema::create('klausul', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('iso_id');
            $table->string('nama');
            $table->string('uraian');
            $table->timestamps();

            $table->foreign('iso_id')->references('id')->on('iso')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('klausul');
    }
};
