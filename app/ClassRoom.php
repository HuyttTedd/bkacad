<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClassRoom extends Model
{
    //
    protected $table = 'class_rooms';
    protected $keyType = 'string';
    protected $fillable = [
        'name', 'course_id', 'major_id'
    ];
}
