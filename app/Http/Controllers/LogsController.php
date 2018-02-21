<?php

namespace App\Http\Controllers;
use App\Log;
use Illuminate\Http\Request;

class LogsController extends Controller
{
    public function createLog($id,$type,$action){
        $log = new Log();

        $log->relatedId = $id;
        $log->relatedType = $id;
        $log->actionType = $id;
        $log->actionTime = now();
    }
}
