<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $table = 'attendances';
    protected $keyType = 'string';
    protected $fillable = [
        'lecturer_id', 'subject_id', 'class_id', 'date', 'time_start', 'time_end',
    ];

    public function attendance_detail() {
        return $this->hasMany('App\AttendanceDetail', 'attendance_id', 'id');
    }
}
