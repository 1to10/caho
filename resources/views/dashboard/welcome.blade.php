@extends('dashboard/layouts.loginmaster')
@section('content')

<div class="login-box-body">
<h5 style="color: #000; font-size: 26px; margin-bottom: 20px;font-weight: 600; text-align: center; margin-top: 0;">Data Management System</h5>

      <form method="POST" action="" role="form">
            {{ csrf_field() }}


            @if(session('error'))
            <div class="alert alert-danger">
                  {{session('error')}}
            </div>
            @endif


            @if(session('success'))
            <div class="alert alert-success">
                  {{session('success')}}
            </div>
            @endif


            <div class="form-group has-feedback">
                  
                  <input id="email" type="email" class="form-control" name="email" value="" required>
                  <span class="glyphicon glyphicon-envelope form-control-feedback"></span>

                  @if ($errors->has('email'))
                  <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                  </span>
                  @endif
            </div>
            <div class="form-group has-feedback">
                  <input id="password" type="password" class="form-control" name="password" required>
                  <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                  @if ($errors->has('password'))
                  <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                  </span>
                  @endif
            </div>
            <div class="row">
                  <div class="col-xs-8">
                        <div class="checkbox icheck">
                              <label>
                                    <a href="{{ env('APP_URL') }}/dashboard/forgot-password">I forgot my password</a>
                              </label>
                        </div>
                  </div>
                  <!-- /.col -->
                  <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">
                              Login
                        </button>



                  </div>
                  <!-- /.col -->
            </div>
      </form>



</div>

@endsection