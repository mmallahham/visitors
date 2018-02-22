<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    protected $fillable = [
        'name',
        'email',
        'idNumber',
        'mobile',
        'visitees',
        'purpose',
        'type',        //0 = visitor, 1= employee, 2 = student
        'vimage',
        'status',
        'lastcheckin'
    ];

}
