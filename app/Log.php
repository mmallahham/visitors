<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    protected $fillable = [
        'relatedId',        // Id from visitor, employee or student
        'relatedType',      // 0 = visitor, 1 = employ22, 2 = student  
        'actionTime',
        'actionType'        // 0 = check in, 1 = check out
    ];

}
