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
        Schema::create('bukti_audit', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('unit_sub_id');
            $table->string('judul');
            $table->string('file');
            $table->text('deskripsi');
            $table->timestamps();

            $table->foreign('unit_sub_id')->references('id')->on('unit_sub')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bukti_audit');
    }
};
