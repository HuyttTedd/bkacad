<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

//use App\HasCompositePrimaryKey;

class Assignment extends Model
{

    use HasCompositePrimaryKey;
    protected $table = 'assignments';
    protected $keyType = 'string';
    public $timestamps = false;
    protected $fillable = [
        'class_id', 'subject_id', 'lecturer_id',
    ];

    protected $primaryKey = ['class_id', 'subject_id'];


}
