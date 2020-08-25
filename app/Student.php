<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'students';
    protected $fillable = [
        'name', 'gender', 'dob', 'phone', 'email', 'password', 'status',
    ];

    protected $keyType = 'string';

    public function getGenderAttribute($value)
    {
        return $value == 1 ? "Nam" : "Nữ";
    }

    public function classes() {
        return $this->belongsToMany('App\Classes', 'class_students', 'student_id', 'class_id');
    }


}
//
