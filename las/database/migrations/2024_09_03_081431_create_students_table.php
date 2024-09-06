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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('first_name')->max(45);
            $table->string('middle_name')->max(45);
            $table->string('last_name')->max(45);
            $table->string('initials')->max(45);
            $table->string('full_name')->max(45);
            $table->string('zipcode')->max(45);
            $table->string('street')->max(45);
            $table->integer('house_number');
            $table->string('addition')->max(45);
            $table->string('city')->max(45);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
