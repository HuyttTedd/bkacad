<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseMajor extends Model
{
    protected $table = 'course_majors';

    protected $keyType = 'string';

    protected $fillable = [
        'course_id', 'major_id',
    ];
}
