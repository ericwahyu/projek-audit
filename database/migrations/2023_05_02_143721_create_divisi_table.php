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
        Schema::create('divisi', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('regional_id');
            $table->string('divisi');
            $table->timestamps();

            $table->foreign('regional_id')->references('id')->on('regional')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('divisi');
    }
};
