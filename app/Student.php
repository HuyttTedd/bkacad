<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'name', 'gender', 'dob', 'phone', 'email', 'password', 'status',
    ];

    protected $keyType = 'string';

    public function getGenderAttribute($value)
    {
        return $value == 1 ? "Nam" : "Nữ";
    }
}
