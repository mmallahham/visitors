<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visitors extends Model
{
    protected $fillable = [
        'name','email','idNumber','mobile','visitees','purpose','vimage'
    ];


}
