<?php

namespace App\Http\Controllers;
use App\Visitor;
use App\Log;
use Illuminate\Http\Request;

use Khill\Lavacharts\Lavacharts;


class StaticsController extends Controller
{
    public function indoor(){
        $visitors = Visitor::where('status','1' )->get();
        
        return view('statics.indoor',["visitors"=> $visitors,"title"=>""]);
    }

    public function visitorsIndoor($type){
        if($type == 0)//all visitors
            $visitors = Visitor::where([['type','0']] )->get();
        else if($type == 1) //indoor
            $visitors = Visitor::where([['status','1'],['type','0']])->get();
        else if($type == 3) //all indoor
            $visitors = Visitor::where([['status','1']])->get();
        else //all registered
            $visitors = Visitor::all();

        return view('statics.indoor',["visitors"=> $visitors,"title"=>"Visitors"]);
    }

    public function EmployeesIndoor($type){
        if($type == 0)//all Employee
            $visitors = Visitor::where([['type','1']] )->get();
        else //indoor
            $visitors = Visitor::where([['status','1'],['type','1']])->get();
        
        return view('statics.indoor',["visitors"=> $visitors,"title"=>"Employees"]);
    }  

    public function StudentsIndoor($type){
    if($type == 0)//all Students
        $visitors = Visitor::where([['type','2']] )->get();
    else //indoor
        $visitors = Visitor::where([['status','1'],['type','2']])->get();
    
        return view('statics.indoor',["visitors"=> $visitors,"title"=>"Students"]);
    }

    public function dashboard(){
        $lava = new Lavacharts;

        $chartData = $lava->DataTable();

        $chartData->addStringColumn('Day')
                ->addNumberColumn('Visitors')
                ->addNumberColumn('Employees')
                ->addNumberColumn('Students')
                ->setDateTimeFormat('D');    
        
        for($i=0;$i<=7;$i++){
            $year = date("Y",strToTime("Today ".strval(-7+$i)." days" ));
            $month = date("m",strToTime("Today ".strval(-7+$i)." days" ));
            $day = date("d",strToTime("Today ".strval(-7+$i)." days" ));

            $vCheckin = Log::where([
                ['actionTime','<',"$year/$month/".strval($day+1)],
                ['actionTime','>=',"$year/$month/$day"],
                ['relatedType',0]
            ])->count();
            $eCheckin = Log::where([
                ['actionTime','<',"$year/$month/".strval($day+1)],
                ['actionTime','>=',"$year/$month/$day"],
                ['relatedType',1]
            ])->count();
            $sCheckin = Log::where([
                ['actionTime','<',"$year/$month/".strval($day+1)],
                ['actionTime','>=',"$year/$month/$day"],
                ['relatedType',2]
            ])->count();
            $chartData->addRow(["$year/$month/$day", $vCheckin, $eCheckin,$sCheckin]);
        }

        $lava->ColumnChart('ChartData', $chartData, [
            'title' => 'visiting activity',
            'titleTextStyle' => [
                'color'    => '#eb6b2c',
                'fontSize' => 20
            ],
            // 'width' => '100%',
            // 'height' => '1000px'
        ]);

        $statics = [
            'allVisitorsCount' => Visitor::where('type','0')->count(),
            'allEmployeesCount'=> Visitor::where('type','1')->count(),
            'allCount' => Visitor::all()->count(),
        
            'indoorVisitorsCount' => Visitor::where([['status','1'],['type','0']]  )->count(),
            'indoorEmployeesCount' => Visitor::where([['status','1'],['type','1']]  )->count(),
            'indoorAllCount' => Visitor::where('status','1')->count(),
        ];

        return view('statics.dashboard',[
            'statics' => $statics,
            'lava' => $lava
        ]);
    }


    public function dashboard1(){
 

    }




}