<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Major extends Model
{
    protected $table = 'majors';

    protected $keyType = 'string';

    protected $fillable = [
        'name',
    ];


    public function courses()
    {
        return $this->belongsToMany('App\Course', 'course_majors');
    }

    public function subjects()
    {
        return $this->belongsToMany('App\Subject', 'major_subject');
    }
}
