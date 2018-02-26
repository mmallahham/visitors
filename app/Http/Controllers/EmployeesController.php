<?php

namespace App\Http\Controllers;

use App\Log;
use App\Visitor;
use Illuminate\Http\Request;

class EmployeesController extends Controller
{
    public function createEmployee(Request $request){
            
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
        $visitor->Visitees  = $request->input('job-title');
        $visitor->purpose   = $request->input('dept');
        $visitor->type      = 1;
        $visitor->save();

        return view('employee.main',["title" => "Employee was created successfuly"]);
    }

    public function updateEmployee($id){
        $visitor = Visitor::find($id);
        return view('employee.register', ['isNew' => false,'visitor' => $visitor,'id' => $visitor->id]);
    }

    public function postUpdateEmployee(Request $request,$id){
        $visitor = Visitor::find($id);

        $visitor->name      = $request->input('name');    
        $visitor->email     = $request->input('email');   
        $visitor->vimage    = $request->input('vimage');
        $visitor->idNumber  = $request->input('idNumber');
        $visitor->mobile    = $request->input('mobile');
        $visitor->Visitees  = $request->input('job-title');
        $visitor->purpose   = $request->input('dept');
        $visitor->save();

        return redirect('indoor');
    }

    public function employeeCheckin($id){

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
        $this->employeeCheckin($id);
        return view('employee.main',["title" => 'status updated successfuly']);
    }

    public function employeeCheckout($id){
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
        $this->employeeCheckout($id);
        return view('employee.main',["title" => 'status updated successfuly']);
    }

    public function checkoutIndoor($id){
        $this->employeeCheckout($id);
        return redirect('indoor');
    }

    public function showLog($id){
        $visitor = Visitor::find($id);
        $logs = Log::where('relatedID', '=', $id)->get();

        return view('statics.log',['logs'=>$logs,'title'=>'Employee']);
    }

    public function mainEmployees(Request $request){
        $id = $request->input('id');
        $submit = $request->input('submit');

        $title = "Wrong id or email";

        $visitor = Visitor::where('id',$id)
                        ->orWhere('idNumber',$id)
                        ->orWhere('email',$id)
                        ->first();
        if($visitor && $visitor->type == 1){
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
      
        return view('employee.main',["title" => $title]);

    }





    
}
