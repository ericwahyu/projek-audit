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
        Schema::create('penilaian', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('unit_sub_id')->nullable(); 
            $table->unsignedBigInteger('pertanyaan_id');
            $table->unsignedBigInteger('nilai_id')->nullable();
            $table->text('catatan')->nullable();
            $table->timestamps();

            $table->foreign('unit_sub_id')->references('id')->on('unit_sub')->onDelete('cascade');
            $table->foreign('pertanyaan_id')->references('id')->on('pertanyaan')->onDelete('cascade');
            $table->foreign('nilai_id')->references('id')->on('nilai')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penilaian');
    }
};
