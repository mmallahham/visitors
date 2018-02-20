@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header">Employee Registeration</div>
                <img src="{{ asset('images/employee.jpg') }}" class="card-img-top">

                <div class="card-body">
                    <form method="POST" action="">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

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
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">ID</label>

                            <div class="col-md-6">
                                <input id="idNumber" type="tesxt" class="form-control{{ $errors->has('idNumber') ? ' is-invalid' : '' }}" name="idNumber" required>

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
                                <input id="mobile" type="text" class="form-control" name="mobile" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="Visitees" class="col-md-4 col-form-label text-md-right">Visitees</label>

                            <div class="col-md-6">
                                <input id="Visitees" type="text" class="form-control" name="Visitees" required>
                            </div>
                        </div>                        
                        
                        <div class="form-group row">
                            <label for="purpose" class="col-md-4 col-form-label text-md-right">Purpose</label>

                            <div class="col-md-6">
                                <input id="purpose" type="text" class="form-control" name="purpose" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
