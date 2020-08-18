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
}
