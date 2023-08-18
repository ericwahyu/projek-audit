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
        Schema::create('pertanyaan_regional', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('regional_id');
            $table->unsignedBigInteger('pertanyaan_id');
            $table->timestamps();

            $table->foreign('regional_id')->references('id')->on('regional')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('pertanyaan_id')->references('id')->on('pertanyaan')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pertanyaan_regional');
    }
};
