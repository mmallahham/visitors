@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center bg-info">   
        <h1 id="char_div" style="width:100%;padding:0;margin:0"></h1>
        <?= $lava->render('ColumnChart', 'ChartData', 'char_div') ?>
    </div> 
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h1 class="my-3 text-center">Statics</h1>
            <div class="card-group">
                <div class="card card-default">
                    <div class="card-header">Visitors</div>
                    
                    <div class="card-body">
                        <div class="row alert alert-success ">
                            <div class="col-md-8 ">
                                <p class="my-2">All Visitors: {{ $statics['allVisitorsCount'] }}  </p>
                            </div>
                            <div class="col-md-4">
                                <a href="{{ route('visitors.indoor',['type' => 0]) }}" class="btn btn-primary px-4 float-right">Show</a>
                            </div>
                        </div>

                        <div class="row alert alert-success">
                            <div class="col-md-8">
                            <p class="my-2">indoor Visitors:   {{ $statics['indoorVisitorsCount'] }} </p>
                            </div>
                            <div class="col-md-4">
                                <a href="{{ route('visitors.indoor',['type' => 1]) }}" class="btn btn-primary px-4 float-right">Show</a>
                            </div>
                        </div>

                        <div class="row alert alert-success">
                            <div class="col-md-8">
                            <p class="my-2">New Visitor: </p>
                            </div>
                            <div class="col-md-4">
                                <a href="{{ route('visitor.register') }}" class="btn btn-primary float-right">Register</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card card-default">
                    <div class="card-header">Emlpoyees</div>
                    
                    <div class="card-body">
                        <div class="row alert alert-success ">
                            <div class="col-md-8 ">
                                <p class="my-2">All Employees: {{ $statics['allEmployeesCount'] }}  </p>
                            </div>
                            <div class="col-md-4">
                                <a href="{{ route('employees.indoor',['type' => 0]) }}" class="btn btn-primary px-3 float-right">Show</a>
                            </div>
                        </div>

                        <div class="row alert alert-success">
                            <div class="col-md-8">
                            <p class="my-2">indoor Employees:   {{ $statics['indoorEmployeesCount'] }} </p>
                            </div>
                            <div class="col-md-4">
                                <a href="{{ route('employees.indoor',['type' => 1]) }}" class="btn btn-primary px-3 float-right">Show</a>
                            </div>
                        </div>

                        <div class="row alert alert-success">
                            <div class="col-md-8">
                            <p class="my-2">New Employee: </p>
                            </div>
                            <div class="col-md-4">
                                <a href="{{ route('employee.register') }}" class="btn btn-primary float-right">Register</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card card-default">
                    <div class="card-header">Students</div>
                    
                    <div class="card-body">
                        <div class="row alert alert-success ">
                            <div class="col-md-8 ">
                                <p class="my-2">All Students: {{ $statics['allCount'] - $statics['allVisitorsCount'] - $statics['allEmployeesCount'] }}  </p>
                            </div>
                            <div class="col-md-4">
                                <a href="{{ route('students.indoor',['type' => 0]) }}" class="btn btn-primary px-3 float-right">Show</a>
                            </div>
                        </div>

                        <div class="row alert alert-success">
                            <div class="col-md-8">
                            <p class="my-2">indoor Students:   {{ $statics['indoorAllCount'] - $statics['indoorVisitorsCount'] - $statics['indoorEmployeesCount'] }} </p>
                            </div>
                            <div class="col-md-4">
                                <a href="{{ route('students.indoor',['type' => 1]) }}" class="btn btn-primary px-3 float-right">Show</a>
                            </div>
                        </div>

                        <div class="row alert alert-success">
                            <div class="col-md-8">
                            <p class="my-2">New Student: </p>
                            </div>
                            <div class="col-md-4">
                                <a href="{{ route('students.register') }}" class="btn btn-primary float-right">Register</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card card-default">
                <div class="card-header">All Registered</div>
                    <div class="card-body">
                        <div class="row alert alert-success">
                            <div class="col-md-8">
                                All Registterd:   {{ $statics['allCount'] }}
                            </div>
                            <div class="col-md-4">
                                <a href="{{ route('visitors.indoor',['type' => 2]) }}" class="btn btn-primary px-3 float-right">Show</a>
                            </div>
                        </div>

                        <div class="row alert alert-success">
                            <div class="col-md-8">
                                All Indoor:   {{ $statics['indoorAllCount'] }}
                            </div>
                            <div class="col-md-4">
                                <a href="{{ route('visitors.indoor',['type' => 3]) }}" class="btn btn-primary px-3 float-right">Show</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
