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
        Schema::create('student_attendances', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained('users')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('course_id')->constrained('courses')->cascadeOnUpdate()->cascadeOnDelete();
            $table->boolean('lecturer_one')->default(false)->nullable();
            $table->boolean('lecturer_two')->default(false)->nullable();
            $table->boolean('lecturer_three')->default(false)->nullable();
            $table->boolean('lecturer_four')->default(false)->nullable();
            $table->boolean('lecturer_five')->default(false)->nullable();
            $table->boolean('lecturer_six')->default(false)->nullable();
            $table->boolean('lecturer_seven')->default(false)->nullable();
            $table->boolean('lecturer_eight')->default(false)->nullable();
            $table->boolean('lecturer_nine')->default(false)->nullable();
            $table->boolean('lecturer_ten')->default(false)->nullable();
            $table->boolean('lecturer_eleven')->default(false)->nullable();
            $table->boolean('lecturer_twelve')->default(false)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_attendances');
    }
};
