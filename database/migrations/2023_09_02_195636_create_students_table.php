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
            $table->string('name');
            $table->string('phone');
            $table->unsignedBigInteger('teacher_id')->nullable();
            $table->foreign('teacher_id')->references('id')->on('teachers')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('title')->default('الطالب');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('pass')->nullable();
            $table->integer('lessons_no')->nullable();
            $table->text('notes')->nullable();
            $table->tinyInteger('block')->default(0);
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
