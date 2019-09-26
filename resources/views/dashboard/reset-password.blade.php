@extends('dashboard/layouts.loginmaster')
@section('content')

    <div class="login-box-body">

        <form  method="POST" action="" role="form">
            @if(count($errors)>0)
                <div class="alert  alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{ csrf_field() }}




                <div class="form-group has-feedback">
                    <input id="password" type="password" class="form-control" name="password" required>
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    @if ($errors->has('password'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                    @endif

                </div>


                <div class="form-group has-feedback">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    @if ($errors->has('password-confirm'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('password-confirm') }}</strong>
                                    </span>
                    @endif

                </div>



                <button type="submit" class="btn btn-primary btn-block btn-flat">
                    Update Password
                </button>

        </form>

    </div>
@endsection