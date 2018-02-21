<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    protected $fillable = [
        'name','email','idNumber','mobile','visitees','purpose','vimage','status','lastcheckin'
    ];


}
