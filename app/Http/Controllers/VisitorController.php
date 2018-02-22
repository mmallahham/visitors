<?php

namespace App\Http\Controllers;

use App\Visitor;
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
        $visitor->save();

        return view('visitors.main',["success" => "Visitor was created successfuly"]);
    }

    public function updateVisitor($id){
        $visitor = Visitor::find($id);
        echo $visitor->visitees;
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

        echo $visitor->visitees;
        return view('visitors.main',["success" => "Visitor was updated successfuly"]);
    }

    public function deleteVisitor($id){
        $visitor = Visitor::find($id);

        DB::table('logs')->where([
                ['relatedID', '=', $id],
                ['relatedType', '=', 1]
            ])->delete();
        $visitor->delete();    
        return redirect()->back();
    }

    public function checkin($id){
        $visitor = Visitor::find($id);
        // 1 - check if status id checked in
        // 2 - change status if not
        // 3 - show message otherwise
    }

    public function checkout($id){
        $visitor = Visitor::find($id);
        // 1 - check if status id is checked in
        // 2 - change status if yes
        // 3 - show message otherwise
    }

    public function ListAllVisitors(){
        return view('welcome');
    }
}

