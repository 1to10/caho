@extends('dashboard/layouts.loginmaster')
@section('content')

    <div class="login-box-body">

        <form  method="POST" action="forgot-password" role="form">
            {{ csrf_field() }}


            @if(session('success'))
                <div class="alert alert-success">
                    {{session('success')}}
                </div>
            @endif


            @if(session('error'))
                <div class="alert alert-danger">
                    {{session('error')}}
                </div>
            @endif

                <div class="form-group has-feedback">
                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    @if ($errors->has('email'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                    @endif

                </div>

                <button type="submit" class="btn btn-primary btn-block btn-flat">
                    Send Code
                </button>

                <div class="col-xs-12">
                <a href="{{ env('APP_URL') }}/dashboard/login">Login</a>
                </div>


        </form>

    </div>
@endsection