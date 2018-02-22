@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card card-default">
                <div class="card-header card-primary text-center">Employee Activities</div>
                <img src="{{ asset('images/employee.jpg') }}" class="card-img-top">
                <div class="card-body">
                    @if ($title)
                        <h3 class="alert alert-info text-center py-2 my-3">
                            <strong>{{ $title }}</strong>
                        </h3>
                    @endif

                <h5 class="text-center">Welcome to Lexicon Institue please make sure to press the <strong class="text-primary">check in</strong> and 
                    <strong class="text-danger">check out</strong> every day <br><br><hr></h5>
                <div class="row">
                    
                    <div class="col-md-1">
                    
                    </div>
                    <div class="col-md-10 text-center">
                        <form method="POST" action="{{ route('employee.main') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label text-md-right">Employee ID or E-Mail</label>

                            <div class="col-md-6">
                                <input id="id" type="text" class="form-control{{ $errors->has('id') ? ' is-invalid' : '' }}" name="id" value="{{ old('id') }}" required autofocus>

                                @if ($errors->has('id'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div><br>

                            <input type='submit' class="btn btn-primary text-white main-page-btn btn-lg col-md-3" name="submit" value = "check in">
                            <input type='submit' class="btn btn-danger text-white main-page-btn btn-lg col-md-3" name="submit" value="check out">
                        </form>        
                        </div>
                    </div>                
                </div>
            </div>
        </div>
    </div>
</div>
@endsection