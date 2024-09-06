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
        Schema::create('school_carreers', function (Blueprint $table) {
            $table->id();
            // $table->unsignedBigInteger('course_year_id')->foreign('course_year_id')->references('id')->on('course_years')->onDelete('cascade');
            // $table->unsignedBigInteger('course_id')->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
            // $table->unsignedBigInteger('group_id')->foreign('group_id')->references('id')->on('groups')->onDelete('cascade');
            // $table->unsignedBigInteger('student_id')->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
            $table->foreignId('course_year_id')->constrained()->on('course_years')->onDelete('cascade');
            $table->foreignId('course_id')->constrained()->on('courses')->onDelete('cascade');
            $table->foreignId('group_id')->constrained()->on('groups')->onDelete('cascade');
            $table->foreignId('student_id')->constrained()->on('students')->onDelete('cascade');

        

            $table->date('start_date');
            $table->date('end_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('school_carreers');
    }
};
