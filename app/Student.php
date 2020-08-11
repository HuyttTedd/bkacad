<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'name', 'gender', 'dob', 'phone', 'email', 'password', 'status', 'class_id',
    ];

    
}
