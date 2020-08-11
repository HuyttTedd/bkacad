<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{

    protected $fillable = [
        'name', 'gender', 'dob', 'phone', 'email', 'password', 'status','level',    
    ];

}
