<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('student_change_timing', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('student_id');
            $table->unsignedBigInteger('consultant_id');
            $table->unsignedBigInteger('teacher_id');
            $table->unsignedBigInteger('course_id');

            $table->dateTime('student_request_time');
            $table->dateTime('scheduled_time');

            $table->text('description')->nullable();

            $table->timestamps();

            // Foreign Keys
            $table->foreign('student_id')
                  ->references('id')->on('students')
                  ->onDelete('cascade');

            $table->foreign('consultant_id')
                  ->references('id')->on('users')
                  ->onDelete('cascade');

            $table->foreign('teacher_id')
                  ->references('id')->on('users')
                  ->onDelete('cascade');

            $table->foreign('course_id')
                  ->references('id')->on('plans')
                  ->onDelete('cascade');
                  
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('student_change_timing');
    }
};
