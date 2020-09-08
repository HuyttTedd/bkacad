<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
class AttendanceDetail extends Model
{
    use HasCompositePrimaryKey;
    protected $keyType = 'string';
    protected $fillable = [
        'attendance_id', 'student_id', 'status',
    ];

    public function attendance() {
        return $this->belongsTo('App\Attendance', 'attendance_id');
    }

    protected $primaryKey = ['attendance_id', 'student_id'];
}
