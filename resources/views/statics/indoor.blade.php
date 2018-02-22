

@extends('layouts.app')
@section('content')  

<h2 class="text-center">{{ $title }} Indoor Report</h2>
<div class="row py-3 m-5">
    <div class="col-md-9">   
        <input type="search" class="form-control " name="search" placeholder="Search">
    </div>
    <div class="col-md-2"> 
        <button class="btn btn-primary">submit</button>
    </div>   
</div>
    <div class="row m-5" >
        <div class="col-md-12">
            <table class="table table-striped table-hover">
                <thead class="bg-primary">
                    <tr>
                        <th width="23%"><a class="text-white" href="#">Name</a></th>
                        <th width="11%">Id</th>
                        <th width="22%">Email</th>
                        <th width="10%">Mobile</th>
                        <th width="7%">Image</th>
                        <th width="8%">Type</th>
                        <th width="5%"></th>
                        <th width="7%"></th>
                        <th width="7%"></th>
                    </tr>
                </thead>
                <tbody>
                @foreach($visitors as $visitor)
                    <tr>
                        <td>{{ $visitor['name'] }}</td>
                        <td>{{ $visitor['idNumber'] }}</td>
                        <td>{{ $visitor['email'] }}</td>
                        <td>{{ $visitor['mobile'] }}</td>
                        <td><img src="{{ $visitor['vimage'] }}" style="height:50px;padding:0;margin:0"></td>
                        @if ($visitor['type'] == 0)
                            <td><a class="btn btn-info" href="">check out</a></td>            
                        @elseif ($visitor['type'] == 1)
                            <td><a class="btn btn-success" href="">check out</a></td>            
                        @else
                            <td ><a class="btn btn-danger" href="">check out</a></td>            
                        @endif
                        <td><a class="btn btn-primary" href="">log</a></td>            
                        <td><a class="btn btn-primary" href="{{ route('visitor.delete',['id' => $visitor->id]) }}">delete</a></td>            
                        <td><a class="btn btn-primary" href="">padge</a></td>            
                    </tr>
                @endforeach    
                </tbody>
            </table>
        </div>
    </div>

    
@endsection