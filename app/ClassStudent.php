<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClassStudent extends Model
{
    //
    protected $table = 'class_students';
    protected $keyType = 'string';
    protected $fillable = [
        'class_id', 'student_id',
    ];
    public $timestamps = false;


}
