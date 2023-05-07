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
        Schema::create('pertanyaan_departemen', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('departemen_id');
            $table->unsignedBigInteger('pertanyaan_id');
            $table->timestamps();

            $table->foreign('departemen_id')->references('id')->on('departemen')->onDelete('cascade');
            $table->foreign('pertanyaan_id')->references('id')->on('pertanyaan')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pertanyaan_departemen');
    }
};
