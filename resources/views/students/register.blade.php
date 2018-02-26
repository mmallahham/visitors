@extends('layouts.app')

@section('content')

<script type="text/javascript" src="{{ asset('js/webcam.min.js') }}"></script>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card card-default">
                <div class="card-header">Employee Registeration</div>
                <img src="{{ asset('images/student.jpg') }}" class="card-img-top">

                <div class="card-body">
                    <form method="POST" 
                        @if ($isNew)
                            action="{{route('student.create')}}">
                        @else
                            action="{{route('student.update',['id' => $id])}}">
                        @endif
                        @csrf
                        <div class="row">
                        <div class="col-md-9">
                        

                        <div class="form-group row">
                            <label for="vimage" class="col-md-4 col-form-label text-md-right">Image</label>
                            <img src ="{{ $isNew ? old('vimage') ?: asset('images/no_image.png') :  $visitor->vimage}}" id="#v-image" class="v-image">

                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" 
                                    value="{{ $isNew ? old('name') : $visitor->name }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" 
                                    value="{{ $isNew ? old('email')  : $visitor->email }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="idNumber" class="col-md-4 col-form-label text-md-right">ID</label>

                            <div class="col-md-6">
                                <input id="idNumber" type="tesxt" class="form-control{{ $errors->has('idNumber') ? ' is-invalid' : '' }}" name="idNumber"  
                                    value="{{ $isNew ? old('idNumber')  : $visitor->idNumber}}" required>

                                @if ($errors->has('idNumber'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('idNumber') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="mobile" class="col-md-4 col-form-label text-md-right">Mobile</label>

                            <div class="col-md-6">
                                <input id="mobile" type="text" class="form-control" name="mobile" value="{{ $isNew ? old('mobile') : $visitor->mobile }}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="course" class="col-md-4 col-form-label text-md-right">Course</label>

                            <div class="col-md-6">
                                <input id="course" type="text" class="form-control" name="course" value="{{ $isNew ? old('course') : $visitor->visitees }}" required>
                            </div>
                        </div>                        
                        
                        <div class="form-group row">
                            <label for="manager" class="col-md-4 col-form-label text-md-right">Manager</label>

                            <div class="col-md-6">
                                <input id="manager" type="text" class="form-control" name="manager" value="{{ $isNew ? old('manager') : $visitor->purpose }}" required>
                            </div>
                        </div>
                        </div>
                        <div class="col-md-3">
                            <div id="#my_camera"></div>
                            <div class="btn btn-primary container-fluid" onClick="take_snapshot()">Take</div>
                        </div>
                        </div>
                        <div class="form-group row mb-0">
                            
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    @if ($isNew)
                                        Register
                                    @else
                                        Update 
                                    @endif   
                                </button>
                            </div>
                        </div>
                        <input type="text" hidden id="#vimage" name="vimage" value="{{ $isNew ? old('vimage') :  $visitor->vimage}}">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script language="JavaScript">
    Webcam.set({
        width: 200,
        height: 160,
        image_format: 'jpeg',
        jpeg_quality: 90
    });
    Webcam.attach( '#my_camera' );

    function take_snapshot() {
        // take snapshot and get image data
        Webcam.snap( function(data_uri) {
            // display results in page
            document.getElementById('#v-image').src = data_uri;
            document.getElementById('#vimage').value = data_uri;
        } );
    }
</script>


@endsection
