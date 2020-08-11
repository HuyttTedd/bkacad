<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrigger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
        CREATE TRIGGER staff_auto BEFORE INSERT ON staffs
        FOR each ROW
        BEGIN
           SET NEW.id = getNextCustomSeq("staff","BKS");
        END
        ');

        DB::unprepared('
        CREATE TRIGGER student_auto BEFORE INSERT ON students
        FOR each ROW
        BEGIN
           SET NEW.id = getNextCustomSeq("student","BKA");
        END
        ');

        DB::unprepared('
        CREATE TRIGGER major_auto BEFORE INSERT ON majors
        FOR each ROW
        BEGIN
           SET NEW.id = getNextCustomSeq("major","BKM");
        END
        ');

        DB::unprepared('
        CREATE TRIGGER course_auto BEFORE INSERT ON courses
        FOR each ROW
        BEGIN
           SET NEW.id = getNextCustomSeq("course","K");
        END
        ');

        DB::unprepared('
        CREATE TRIGGER subject_auto BEFORE INSERT ON subjects
        FOR each ROW
        BEGIN
           SET NEW.id = getNextCustomSeq("subject","BKS");
        END
        ');

        DB::unprepared('
        CREATE TRIGGER room_auto BEFORE INSERT ON class_rooms
        FOR each ROW
        BEGIN
           SET NEW.id = getNextCustomSeq("room","BKR");
        END
        ');

        DB::unprepared('
        CREATE TRIGGER attendance_auto BEFORE INSERT ON attendances
        FOR each ROW
        BEGIN
           SET NEW.id = getNextCustomSeq("attendance","BKAT");
        END
        ');

        DB::unprepared('
        CREATE TRIGGER testing_auto BEFORE INSERT ON testing_schedules
        FOR each ROW
        BEGIN
           SET NEW.id = getNextCustomSeq("test","BKTEST");
        END
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

    }
}
