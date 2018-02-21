<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'name','email','idNumber','mobile','course','purpose','vimage'
    ];
}
