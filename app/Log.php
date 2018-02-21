<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    protected $fillable = ['relatedId','relatedType','actionTime','actionType'];

}
