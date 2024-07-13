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
        Schema::create('studenttables', function (Blueprint $studenttable) {
            $studenttable->id();
            $studenttable->string('student_name');
            $studenttable->string('student_standard');
            $studenttable->string('student_seatnumber');
            $studenttable->string('student_courses');
            $studenttable->string('student_phonenumber');
            $studenttable->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('studenttables');
    }
};
