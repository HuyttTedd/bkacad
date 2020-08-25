<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $keyType = 'string';

    protected $fillable = [
        'name',
    ];

    public function majors()
    {
        return $this->belongsToMany('App\Major', 'course_majors');
    }

    public function classes() {
        return $this->hasMany('App\Classes', 'course_id', 'id');
    }

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = strtoupper($value);
    }

    public function getStatusAttribute($value)
    {
         if ($value == 0) {
             # code...
             return "Đang tuyển sinh!";
         } elseif($value == 1) {
             return "Đang học";
         } else {
             return "Đã học xong";
         }
    }
}
