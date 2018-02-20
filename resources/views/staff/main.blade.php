@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card card-default">
                <div class="card-header card-primary text-center">Staff Attendunce</div>
                <img src="{{ asset('images/employee.jpg') }}" class="card-img-top">
                <div class="card-body">
                <h5 class="text-center">Welcome to Lexicon Institue, make sure to press the <strong class="text-primary">check in</strong> and <strong class="text-danger">check out</strong> every visite <br>
                    please <strong class="text-success">Register</strong> if it''s your first visite<br><br><hr></h5>
                <div class="row">
                    
                    <div class="col-md-1">
                    
                    </div>
                    <div class="col-md-10 text-center">
                        <form method="POST" action="">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label text-md-right">Employee ID or E-Mail</label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control{{ $errors->has('email') ? 'or is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div><br>

                            <a class="btn btn-primary text-white main-page-btn btn-lg col-md-4" href="#">
                                <span class="glyphicon glyphicon-log-in"></span>check in</a>
                            <a class="btn btn-danger text-white main-page-btn btn-lg col-md-4" href="#">
                                <span class="glyphicon glyphicon-log-out"></span>check out</a>
                        </form>        
                        </div>
                    </div>                
                </div>
            </div>
        </div>
    </div>
</div>
@endsection