

@extends('layouts.app')
@section('content')  

<h2 class="text-center">Log Report</h2>

    <div class="row m-5" >
        <div class="col-md-12">
            <table class="table table-striped table-hover">
                <thead class="bg-primary">
                    <tr>
                        <th>Action</th>
                        <th>Time</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($logs as $log)
                    <tr>
                        <td>
                            @if($log->actionType == 0)
                                Check in
                            @else
                                Check out
                            @endif
                        </td>
                        <td>{{ $log->actionTime }}</td>       
                    </tr>
                @endforeach    
                </tbody>
            </table>
        </div>
    </div>

    
@endsection