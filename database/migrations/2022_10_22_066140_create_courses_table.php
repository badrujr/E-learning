<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->foreignId('course_category_id')->constrained();
            $table->string('content');
            $table->string('price');
            $table->foreignId('course_pdf_id')->constrained();
            $table->foreignId('quiz_id')->constrained();
            $table->foreignId('course_video_id')->constrained();
            $table->foreignId('tutor_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courses');
    }
};
