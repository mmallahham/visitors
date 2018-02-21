<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StaticsController extends Controller
{
    public function indoor(){
        $visitors = [
            [
                "name" => "sfdf",
                "idNumber" => "dfgdfg",
                "type" => 0,
                "email" => "dfg",
                "mobile" => "dfgf",
                "vimage" => null
            ],
            [
                "name" => "sfdf",
                "idNumber" => "dfgdfg",
                "type" => 1,
                "email" => "dfg",
                "mobile" => "dfgf",
                "vimage" => null
            ],
        ];
        return view('statics.indoor',["visitors"=> $visitors,"title"=>""]);
    }
}