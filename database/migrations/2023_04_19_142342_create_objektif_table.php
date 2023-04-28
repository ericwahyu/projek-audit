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
        Schema::create('objektif', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('klausul_id');
            $table->string('objektif');
            $table->timestamps();

            $table->foreign('klausul_id')->references('id')->on('klausul')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('objektif');
    }
};
