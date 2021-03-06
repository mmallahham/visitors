<?php

namespace App\Http\Controllers;

use App\Visitor;
use App\Log;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VisitorController extends Controller
{
    public function createVisitor(Request $request){
        
        $request->validate([
            'name' => 'bail|required|max:255|min:5',
            'email' => 'required|email',
            'idNumber' => 'required'
        ]);
        
        $visitor = new Visitor();
        $visitor->name      = $request->input('name');    
        $visitor->email     = $request->input('email');   
        $visitor->vimage    = $request->input('vimage');
        $visitor->idNumber  = $request->input('idNumber');
        $visitor->mobile    = $request->input('mobile');
        $visitor->Visitees  = $request->input('visitees');
        $visitor->purpose   = $request->input('purpose');
        $visitor->type      = 0;
        $visitor->save();

        return view('visitors.main',["title" => "Visitor was created successfuly"]);
    }

    public function updateVisitor($id){
        $visitor = Visitor::find($id);
        return view('visitors.register', ['isNew' => false,'visitor' => $visitor,'id' => $visitor->id]);
    }

    public function postUpdateVisitor(Request $request,$id){
        $visitor = Visitor::find($id);

        $visitor->name      = $request->input('name');    
        $visitor->email     = $request->input('email');   
        $visitor->vimage    = $request->input('vimage');
        $visitor->idNumber  = $request->input('idNumber');
        $visitor->mobile    = $request->input('mobile');
        $visitor->Visitees  = $request->input('visitees');
        $visitor->purpose   = $request->input('purpose');
        $visitor->save();

        return redirect('indoor');
    }

    public function deleteVisitor($id){
        $visitor = Visitor::find($id);
        DB::table('logs')->where([
                ['relatedID', '=', $id],
                ['relatedType', '=', 0]
            ])->delete();
        $visitor->delete(); 
        

        return redirect()->back();
    }

    public function checkin($id){

        // 1 - check if status id checked in

        $visitor = Visitor::find($id);

        $log = new Log();
        $log->relatedId = $id;  
        $log->relatedType = 0;
        $log->actionTime = now();
        $log->actionType = 0;
        $log->save();

        $visitor->status = 1;
        $visitor->save();
        return redirect()->back();
    }

    public function checkout($id){
        // 1 - check if status id checked in

        $visitor = Visitor::find($id);

        $log = new Log();
        $log->relatedId = $id;  
        $log->relatedType = 0;
        $log->actionTime = now();
        $log->actionType = 1;
        $log->save();

        $visitor->status = 0;
        $visitor->save();
        return redirect()->back();
    }

    public function showLog($id){
        $visitor = Visitor::find($id);
        $logs = DB::table('logs')->where([
            ['relatedID', '=', $id],
            ['relatedType', '=', 0]
        ])->get();

        return view('statics.log',['logs'=>$logs,'title'=>'Visitor']);
    }

    public function mainVisitors(Request $request){
        $id = $request->input('id');
        $submit = $request->input('submit');

        $title = "Wrong id or email";

        $visitor = Visitor::where('id',$id)
                        ->orWhere('idNumber',$id)
                        ->orWhere('email',$id)
                        ->first();

        if($visitor && $visitor->type == 0){
            if(strtoupper( $visitor->id) == $id || $visitor->email == $id){
                if($submit == 'check in' && $visitor->status == 1){
                    $title = "already checked in";
                }
                else if($submit == 'check out' && $visitor->status == 0){
                    $title = "already checked out";
                }
                else{
                    $title = "Status updated successfuly";
                    $log = new Log();
                    $log->relatedId = $visitor->id;  
                    $log->relatedType = 0;
                    $log->actionTime = now();
                    
                    if($submit == 'check in'){
                        $log->actionType = 0;
                        $visitor->status = 1;
                    }
                    else{
                        $log->actionType = 1;
                        $visitor->status = 0;
                    }
                    $log->save();
            
                    $visitor->save(); 
                }
            }
        }
      
        return view('visitors.main',["title" => $title]);

    }

    public function printVisitor($id = 1){
        $visitor = Visitor::find($id);

        $type = "Visitor";
        if($visitor->type == 1){
            $type = "Employee";
        }
        else{
            $type = "Student";
        }
        return view('visitors.badge',[
            'name' => $visitor->name,
            'type' => $type,
            'vImage' => $visitor->vimage
            ]);
    }

}

