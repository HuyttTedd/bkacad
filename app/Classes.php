<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    //
    protected $table = 'classes';
    protected $keyType = 'string';
    protected $fillable = [
        'name', 'course_id', 'major_id'
    ];

    public function students() {
        return $this->belongsToMany('App\Student', 'class_students', 'class_id', 'student_id');
    }

    public function course() {
        return $this->belongsTo('App\Course', 'course_id');
    }

    public function major() {
        return $this->belongsTo('App\Major', 'major_id');
    }
}
