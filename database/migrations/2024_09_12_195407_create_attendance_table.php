<?php
 // database/migrations/xxxx_xx_xx_xxxxxx_create_attendance_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttendanceTable extends Migration
{
    public function up()
    {
        Schema::create('attendance', function (Blueprint $table) {
            $table->id('AttendanceID');
            $table->date('Date');
            $table->enum('Status', ['Present', 'Absent']);
            $table->unsignedBigInteger('StudentID')->nullable();
            $table->timestamps();

            $table->foreign('StudentID')->references('StudentID')->on('student')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::dropIfExists('attendance');
    }
}