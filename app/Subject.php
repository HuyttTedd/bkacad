<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $table = 'subjects';

    protected $keyType = 'string';

    protected $fillable = [
        'name', 'time_total', 'test_type',
    ];

    public function majors()
    {
        return $this->belongsToMany('App\Major', 'major_subject');
    }
}
