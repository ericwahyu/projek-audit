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
            $table->unsignedBigInteger('pertanyaan_iso_id')->nullable();
            $table->unsignedBigInteger('unit_sub_id')->nullable();
            $table->unsignedBigInteger('nilai_id')->nullable();
            $table->string('catatan')->nullable();
            $table->timestamps();

            $table->foreign('pertanyaan_iso_id')->references('id')->on('pertanyaan_iso');
            $table->foreign('unit_sub_id')->references('id')->on('unit_sub');
            $table->foreign('nilai_id')->references('id')->on('nilai');
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
