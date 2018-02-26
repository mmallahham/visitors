@extends('layouts.app')

@section('content')



<iframe id="printing-frame" name="print_frame" src="about:blank" style="display:none;"></iframe>

<div id="print-area" style="width:300px;height:200px;text-align:center;border:1px solid #000;margin:auto">
    <div style="width:100%"><img src="{{ $vImage }}" style ="width:80px;margin:auto;margin-top:10px"></div>
    <h2>{{ $type }}</h2> 
    <h1>{{ $name }}</h1> 
</div> 
<div class=" text-center mx-auto py-2">
    <a class="btn btn-primary col-1" href="javascript:printDiv()">print</a>
    <a class="btn btn-primary col-1" href="{{ url()->previous() }}">back</a>
</div>
<script>
  //window.print();
function printDiv() {
    var b = document.getElementById('print-area').innerHTML;
    window.frames["print_frame"].document.title = document.title;
    window.frames["print_frame"].document.body.innerHTML = '<style> a{display:none}</style>' + b;
    window.frames["print_frame"].window.focus();
    window.frames["print_frame"].window.print();
}


</script>

@endsection