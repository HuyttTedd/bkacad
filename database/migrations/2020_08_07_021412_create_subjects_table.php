<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subjects', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('name');
            //$table->string('major_id'); //mã ngành
            $table->integer('time_total'); //thời gian học
            $table->tinyInteger('test_type'); //loại thi
            $table->timestamps();
            $table->string('major_id');
            $table->foreign('major_id')->references('id')->on('majors')->onDelete('cascade');  //mã ngành
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subjects');
    }
}
