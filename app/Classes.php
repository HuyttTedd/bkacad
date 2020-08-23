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


}
