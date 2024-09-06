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
        Schema::create('subject_results', function (Blueprint $table) {
            $table->id();
            // $table->unsignedBigInteger('subject_id')->foreign('subject_id')->references('id')->on('subject')->onDelete('cascade');
            // $table->unsignedBigInteger('school_carreer_id')->foreign('school_carreer_id')->references('id')->on('school_carreers')->onDelete('cascade');
            $table->foreignId('school_carreer_id')->constrained()->on('school_carreers')->onDelete('cascade');
            $table->foreignId('subject_id')->constrained()->on('subjects')->onDelete('cascade');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subject_results');
    }
};
