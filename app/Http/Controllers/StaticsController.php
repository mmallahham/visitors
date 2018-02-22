<?php

namespace App\Http\Controllers;
use App\Visitor;
use Illuminate\Http\Request;

class StaticsController extends Controller
{
    public function indoor(){
        $visitors = Visitor::where('status','1' )->get();
        
        return view('statics.indoor',["visitors"=> $visitors,"title"=>""]);
    }
}