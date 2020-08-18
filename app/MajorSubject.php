<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MajorSubject extends Model
{
    protected $table = 'major_subject';

    protected $keyType = 'string';

    protected $fillable = [
        'subject_id', 'major_id',
    ];
}
