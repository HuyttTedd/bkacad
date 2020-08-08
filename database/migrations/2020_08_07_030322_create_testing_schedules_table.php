<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestingSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('testing_schedules', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('class_id');
            $table->string('subject_id');
            $table->date('test_date');
            $table->tinyInteger('test_type');
            $table->time('time_start');
            $table->time('time_end');
            $table->string('faculty_id');
            $table->tinyInteger('test_times');
            $table->foreign('class_id')->references('id')->on('class_rooms')->onDelete('cascade');
            $table->foreign('subject_id')->references('id')->on('subjects')->onDelete('cascade');
            $table->foreign('faculty_id')->references('id')->on('staffs')->onDelete('cascade');

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
        Schema::dropIfExists('testing_schedules');
    }
}
