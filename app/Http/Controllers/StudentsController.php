<?php

namespace App\Http\Controllers;

use App\Log;
use App\Visitor;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    public function createStudent(Request $request){
            
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
        $visitor->Visitees  = $request->input('course');
        $visitor->purpose   = $request->input('manager');
        $visitor->type      = 2;
        $visitor->save();

        return view('students.main',["title" => "Student was created successfuly"]);
    }

    public function updateStudent($id){
        $visitor = Visitor::find($id);
        return view('students.register', ['isNew' => false,'visitor' => $visitor,'id' => $visitor->id]);
    }

    public function postUpdateStudent(Request $request,$id){
        $visitor = Visitor::find($id);

        $visitor->name      = $request->input('name');    
        $visitor->email     = $request->input('email');   
        $visitor->vimage    = $request->input('vimage');
        $visitor->idNumber  = $request->input('idNumber');
        $visitor->mobile    = $request->input('mobile');
        $visitor->Visitees  = $request->input('course');
        $visitor->purpose   = $request->input('manager');
        $visitor->save();

        return redirect('indoor');
    }

    public function studentCheckin($id){

        $visitor = Visitor::find($id);

        $log = new Log();
        $log->relatedId = $id;  
        $log->relatedType = 1;
        $log->actionTime = now();
        $log->actionType = 0;
        $log->save();

        $visitor->status = 1;
        $visitor->save();
    }

    public function checkin($id){
        $this->studentCheckin($id);
        return view('students.main',["title" => 'status updated successfuly']);
    }

    public function studentCheckout($id){
        // 1 - check if status id checked in

        $visitor = Visitor::find($id);

        $log = new Log();
        $log->relatedId = $id;  
        $log->relatedType = 1;
        $log->actionTime = now();
        $log->actionType = 1;
        $log->save();

        $visitor->status = 0;
        $visitor->save();
    }

    public function checkout($id){
        $this->studentCheckout($id);
        return view('students.main',["title" => 'status updated successfuly']);
    }

    public function checkoutIndoor($id){
        $this->studentCheckout($id);
        return redirect('indoor');
    }

    public function showLog($id){
        $visitor = Visitor::find($id);
        $logs = Log::where('relatedID', '=', $id)->get();

        return view('statics.log',['logs'=>$logs,'title'=>'Students']);
    }

    public function mainStudents(Request $request){
        $id = $request->input('id');
        $submit = $request->input('submit');

        $title = "Wrong id or email";

        $visitor = Visitor::where('id',$id)
                        ->orWhere('idNumber',$id)
                        ->orWhere('email',$id)
                        ->first();
        if($visitor && $visitor->type == 2){
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
      
        return view('students.main',["title" => $title]);

    }





    
}
