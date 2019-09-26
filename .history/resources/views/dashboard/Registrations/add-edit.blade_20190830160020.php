@extends('dashboard/layouts.master')
@section('content')

  <!-- daterange picker -->
  <link rel="stylesheet" href="{{ env('APP_URL') }}/bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="{{ env('APP_URL') }}/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="{{ env('APP_URL') }}/plugins/iCheck/all.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="{{ env('APP_URL') }}/bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="{{ env('APP_URL') }}/plugins/timepicker/bootstrap-timepicker.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="{{ env('APP_URL') }}/bower_components/select2/dist/css/select2.min.css">

  <!-- Theme style -->
  <link rel="stylesheet" href="{{ env('APP_URL') }}/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{ env('APP_URL') }}/dist/css/skins/_all-skins.min.css">



  <section class="content-header">
    <h1>
    registrations
      <small>Management</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{ env('APP_URL') }}/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="{{ env('APP_URL') }}/dashboard/registrations">registrations Management</a></li>
      <li><a href="#">registrations Add / Edit</a></li>
    </ol>
  </section>

  <section class="content">

    <div class="box box-default">
      <div class="box-header with-border">
        <h3 class="box-title">registrations Add / Edit</h3>

        <div class="box-tools pull-right">

          <a href="{{ env('APP_URL') }}/dashboard/registrations" class="btn btn-danger btn-xs"><i class="fa fa-arrow-left"></i></a>

        </div>
      </div>
      @empty($articles)
        <form role="form" method="POST" action="{{ env('APP_URL') }}/dashboard/registrations/add/new" enctype="multipart/form-data">
          @endempty

          @isset($articles)
            <form role="form" method="POST" action="{{ env('APP_URL') }}/dashboard/registrations/edit/{{$articles->id}}" enctype="multipart/form-data">
              @endisset


              {{ csrf_field() }}
              <div class="box-body">


                <div class="row">
                  
                    <div class="col-md-6">
                        <div class="form-group {{ $errors->has('title') ? ' has-error' : '' }}">
                            <label>Title <span class="error">*</span></label>
                            <div class="input-group">
                              <span class="input-group-addon"><i class="fa fa-file-text"></i></span>
                            <input id="title" type="text" class="form-control" name="title" value="{{ isset($articles->title) ? $articles->title : old('title') }}" required autofocus>
                            </div>
                            @if ($errors->has('title'))
                              <span class="help-block">
                                              <strong>{{ $errors->first('title') }}</strong>
                                          </span>
                            @endif
                          </div>
                    </div>

                      <div class="col-md-6">
                          <div class="form-group {{ $errors->has('uniqueid') ? ' has-error' : '' }}">
                              <label>uniqueid <span class="error">*</span></label>
                              <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-file-text"></i></span>
                              <input id="uniqueid" type="text" class="form-control" name="uniqueid" value="{{ isset($articles->uniqueid) ? $articles->uniqueid : old('uniqueid') }}" required autofocus>
                              </div>
                              @if ($errors->has('uniqueid'))
                                <span class="help-block">
                                                <strong>{{ $errors->first('uniqueid') }}</strong>
                                            </span>
                              @endif
                            </div>
                      </div>

                </div>

              <div class="row">
                  
                  <div class="col-md-6">
                      <div class="form-group {{ $errors->has('first_name') ? ' has-error' : '' }}">
                          <label>first Name <span class="error">*</span></label>
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-file-text"></i></span>
                          <input id="first_name" type="text" class="form-control" name="first_name" value="{{ isset($articles->first_name) ? $articles->first_name : old('first_name') }}" required autofocus>
                          </div>
                          @if ($errors->has('first_name'))
                            <span class="help-block">
                                            <strong>{{ $errors->first('first_name') }}</strong>
                                        </span>
                          @endif
                        </div>
                  </div>

                    <div class="col-md-6">
                        <div class="form-group {{ $errors->has('last_name') ? ' has-error' : '' }}">
                            <label>Last name <span class="error">*</span></label>
                            <div class="input-group">
                              <span class="input-group-addon"><i class="fa fa-file-text"></i></span>
                            <input id="last_name" type="text" class="form-control" name="last_name" value="{{ isset($articles->last_name) ? $articles->last_name : old('last_name') }}" required autofocus>
                            </div>
                            @if ($errors->has('last_name'))
                              <span class="help-block">
                                              <strong>{{ $errors->first('last_name') }}</strong>
                                          </span>
                            @endif
                          </div>
                    </div>

              </div>

              <div class="row">
                  
                  <div class="col-md-6">
                      <div class="form-group {{ $errors->has('age') ? ' has-error' : '' }}">
                          <label>Age <span class="error">*</span></label>
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-file-text"></i></span>
                          <input id="age" type="text" class="form-control" name="age" value="{{ isset($articles->age) ? $articles->age : old('age') }}" required autofocus>
                          </div>
                          @if ($errors->has('age'))
                            <span class="help-block">
                                            <strong>{{ $errors->first('age') }}</strong>
                                        </span>
                          @endif
                        </div>
                  </div>

                    <div class="col-md-6">
                        <div class="form-group {{ $errors->has('type_of_profession') ? ' has-error' : '' }}">
                            <label>Type of profession <span class="error">*</span></label>
                            <div class="input-group">
                              <span class="input-group-addon"><i class="fa fa-file-text"></i></span>
                            <input id="type_of_profession" type="text" class="form-control" name="type_of_profession" value="{{ isset($articles->type_of_profession) ? $articles->type_of_profession : old('type_of_profession') }}" required autofocus>
                            </div>
                            @if ($errors->has('type_of_profession'))
                              <span class="help-block">
                                              <strong>{{ $errors->first('type_of_profession') }}</strong>
                                          </span>
                            @endif
                          </div>
                    </div>

              </div>

              <div class="row">
                  
                  <div class="col-md-6">
                      <div class="form-group {{ $errors->has('sex') ? ' has-error' : '' }}">
                          <label>sex <span class="error">*</span></label>
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-file-text"></i></span>
                          <input id="sex" type="text" class="form-control" name="sex" value="{{ isset($articles->sex) ? $articles->sex : old('sex') }}" required autofocus>
                          </div>
                          @if ($errors->has('sex'))
                            <span class="help-block">
                                            <strong>{{ $errors->first('sex') }}</strong>
                                        </span>
                          @endif
                        </div>
                  </div>

                    <div class="col-md-6">
                        <div class="form-group {{ $errors->has('qualification') ? ' has-error' : '' }}">
                            <label>Qualification <span class="error">*</span></label>
                            <div class="input-group">
                              <span class="input-group-addon"><i class="fa fa-file-text"></i></span>
                            <input id="qualification" type="text" class="form-control" name="qualification" value="{{ isset($articles->qualification) ? $articles->qualification : old('qualification') }}" required autofocus>
                            </div>
                            @if ($errors->has('qualification'))
                              <span class="help-block">
                                              <strong>{{ $errors->first('qualification') }}</strong>
                                          </span>
                            @endif
                          </div>
                    </div>

              </div>

              <div class="row">
                  
                  <div class="col-md-6">
                      <div class="form-group {{ $errors->has('current_organisation') ? ' has-error' : '' }}">
                          <label>Current Organisation <span class="error">*</span></label>
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-file-text"></i></span>
                          <input id="current_organisation" type="text" class="form-control" name="current_organisation" value="{{ isset($articles->current_organisation) ? $articles->current_organisation : old('current_organisation') }}" required autofocus>
                          </div>
                          @if ($errors->has('current_organisation'))
                            <span class="help-block">
                                            <strong>{{ $errors->first('current_organisation') }}</strong>
                                        </span>
                          @endif
                        </div>
                  </div>

                    <div class="col-md-6">
                        <div class="form-group {{ $errors->has('designation') ? ' has-error' : '' }}">
                            <label>Designation <span class="error">*</span></label>
                            <div class="input-group">
                              <span class="input-group-addon"><i class="fa fa-file-text"></i></span>
                            <input id="designation" type="text" class="form-control" name="designation" value="{{ isset($articles->designation) ? $articles->designation : old('designation') }}" required autofocus>
                            </div>
                            @if ($errors->has('designation'))
                              <span class="help-block">
                                              <strong>{{ $errors->first('designation') }}</strong>
                                          </span>
                            @endif
                          </div>
                    </div>

              </div>

              <div class="row">
                  
                  <div class="col-md-6">
                      <div class="form-group {{ $errors->has('total_work_exprience') ? ' has-error' : '' }}">
                          <label>Total work exprience <span class="error">*</span></label>
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-file-text"></i></span>
                          <input id="total_work_exprience" type="text" class="form-control" name="total_work_exprience" value="{{ isset($articles->total_work_exprience) ? $articles->total_work_exprience : old('total_work_exprience') }}" required autofocus>
                          </div>
                          @if ($errors->has('total_work_exprience'))
                            <span class="help-block">
                                            <strong>{{ $errors->first('total_work_exprience') }}</strong>
                                        </span>
                          @endif
                        </div>
                  </div>

                    <div class="col-md-6">
                        <div class="form-group {{ $errors->has('exp_in_quality') ? ' has-error' : '' }}">
                            <label>Exp in quality <span class="error">*</span></label>
                            <div class="input-group">
                              <span class="input-group-addon"><i class="fa fa-file-text"></i></span>
                            <input id="exp_in_quality" type="text" class="form-control" name="exp_in_quality" value="{{ isset($articles->exp_in_quality) ? $articles->exp_in_quality : old('exp_in_quality') }}" required autofocus>
                            </div>
                            @if ($errors->has('exp_in_quality'))
                              <span class="help-block">
                                              <strong>{{ $errors->first('exp_in_quality') }}</strong>
                                          </span>
                            @endif
                          </div>
                    </div>

              </div>

              <div class="row">
                  
                  <div class="col-md-6">
                      <div class="form-group {{ $errors->has('mobile') ? ' has-error' : '' }}">
                          <label>Mobile <span class="error">*</span></label>
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-file-text"></i></span>
                          <input id="mobile" type="text" class="form-control" name="mobile" value="{{ isset($articles->mobile) ? $articles->mobile : old('mobile') }}" required autofocus>
                          </div>
                          @if ($errors->has('mobile'))
                            <span class="help-block">
                                            <strong>{{ $errors->first('mobile') }}</strong>
                                        </span>
                          @endif
                        </div>
                  </div>

                    <div class="col-md-6">
                        <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                            <label>Email <span class="error">*</span></label>
                            <div class="input-group">
                              <span class="input-group-addon"><i class="fa fa-file-text"></i></span>
                            <input id="email" type="email" class="form-control" name="email" value="{{ isset($articles->email) ? $articles->email : old('email') }}" required autofocus>
                            </div>
                            @if ($errors->has('email'))
                              <span class="help-block">
                                              <strong>{{ $errors->first('email') }}</strong>
                                          </span>
                            @endif
                          </div>
                    </div>

              </div>

              <div class="row">
                  
                  <div class="col-md-6">
                      <div class="form-group {{ $errors->has('city') ? ' has-error' : '' }}">
                          <label>city <span class="error">*</span></label>
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-file-text"></i></span>
                          <input id="city" type="text" class="form-control" name="city" value="{{ isset($articles->city) ? $articles->city : old('city') }}" required autofocus>
                          </div>
                          @if ($errors->has('city'))
                            <span class="help-block">
                                            <strong>{{ $errors->first('city') }}</strong>
                                        </span>
                          @endif
                        </div>
                  </div>

                    <div class="col-md-6">
                        <div class="form-group {{ $errors->has('state') ? ' has-error' : '' }}">
                            <label>State <span class="error">*</span></label>
                            <div class="input-group">
                              <span class="input-group-addon"><i class="fa fa-file-text"></i></span>
                            <input id="state" type="text" class="form-control" name="state" value="{{ isset($articles->state) ? $articles->state : old('state') }}" required autofocus>
                            </div>
                            @if ($errors->has('state'))
                              <span class="help-block">
                                              <strong>{{ $errors->first('state') }}</strong>
                                          </span>
                            @endif
                          </div>
                    </div>

              </div>

              <div class="row">
                  
                  <div class="col-md-6">
                      <div class="form-group {{ $errors->has('address') ? ' has-error' : '' }}">
                          <label>Address <span class="error">*</span></label>
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-file-text"></i></span>
                          <input id="address" type="text" class="form-control" name="address" value="{{ isset($articles->address) ? $articles->address : old('address') }}" required autofocus>
                          </div>
                          @if ($errors->has('address'))
                            <span class="help-block">
                                            <strong>{{ $errors->first('address') }}</strong>
                                        </span>
                          @endif
                        </div>
                  </div>

                    <div class="col-md-6">
                        <div class="form-group {{ $errors->has('program_location') ? ' has-error' : '' }}">
                            <label>Program Location <span class="error">*</span></label>
                            <div class="input-group">
                              <span class="input-group-addon"><i class="fa fa-file-text"></i></span>
                            <input id="program_location" type="text" class="form-control" name="program_location" value="{{ isset($articles->program_location) ? $articles->program_location : old('program_location') }}" required autofocus>
                            </div>
                            @if ($errors->has('program_location'))
                              <span class="help-block">
                                              <strong>{{ $errors->first('program_location') }}</strong>
                                          </span>
                            @endif
                          </div>
                    </div>

              </div>

              <div class="row">
                  
                  <div class="col-md-6">
                      <div class="form-group {{ $errors->has('registration_fee') ? ' has-error' : '' }}">
                          <label>Registration fee <span class="error">*</span></label>
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-file-text"></i></span>
                          <input id="registration_fee" type="text" class="form-control" name="registration_fee" value="{{ isset($articles->registration_fee) ? $articles->registration_fee : old('registration_fee') }}" required autofocus>
                          </div>
                          @if ($errors->has('registration_fee'))
                            <span class="help-block">
                                            <strong>{{ $errors->first('registration_fee') }}</strong>
                                        </span>
                          @endif
                        </div>
                  </div>

                    <div class="col-md-6">
                        <div class="form-group {{ $errors->has('are_you_currently') ? ' has-error' : '' }}">
                            <label>Are you currently involved in Quality Implementation at your organization? <span class="error">*</span></label>
                            <div class="input-group">
                              <span class="input-group-addon"><i class="fa fa-file-text"></i></span>
                            <input id="are_you_currently" type="text" class="form-control" name="are_you_currently" value="{{ isset($articles->are_you_currently) ? $articles->are_you_currently : old('are_you_currently') }}" required autofocus>
                            </div>
                            @if ($errors->has('are_you_currently'))
                              <span class="help-block">
                                              <strong>{{ $errors->first('are_you_currently') }}</strong>
                                          </span>
                            @endif
                          </div>
                    </div>

              </div>

              <div class="row">
                  
                  <div class="col-md-6">
                      <div class="form-group {{ $errors->has('is_your_current') ? ' has-error' : '' }}">
                          <label>Is your current organization Accredited /Certified ? <span class="error">*</span></label>
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-file-text"></i></span>
                          <input id="is_your_current" type="text" class="form-control" name="is_your_current" value="{{ isset($articles->is_your_current) ? $articles->is_your_current : old('is_your_current') }}" required autofocus>
                          </div>
                          @if ($errors->has('is_your_current'))
                            <span class="help-block">
                                            <strong>{{ $errors->first('is_your_current') }}</strong>
                                        </span>
                          @endif
                        </div>
                  </div>

                    <div class="col-md-6">
                        <div class="form-group {{ $errors->has('do_you_have') ? ' has-error' : '' }}">
                            <label>Do you have past experience in Accredited Hospital/Lab ? <span class="error">*</span></label>
                            <div class="input-group">
                              <span class="input-group-addon"><i class="fa fa-file-text"></i></span>
                            <input id="do_you_have" type="text" class="form-control" name="do_you_have" value="{{ isset($articles->do_you_have) ? $articles->do_you_have : old('do_you_have') }}" required autofocus>
                            </div>
                            @if ($errors->has('do_you_have'))
                              <span class="help-block">
                                              <strong>{{ $errors->first('do_you_have') }}</strong>
                                          </span>
                            @endif
                          </div>
                    </div>

              </div>


              <div class="row">
                  
                  <div class="col-md-6">
                      <div class="form-group {{ $errors->has('is_your_current') ? ' has-error' : '' }}">
                          <label>Is your current organization Accredited /Certified ? <span class="error">*</span></label>
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-file-text"></i></span>
                          <input id="is_your_current" type="text" class="form-control" name="is_your_current" value="{{ isset($articles->is_your_current) ? $articles->is_your_current : old('is_your_current') }}" required autofocus>
                          </div>
                          @if ($errors->has('is_your_current'))
                            <span class="help-block">
                                            <strong>{{ $errors->first('is_your_current') }}</strong>
                                        </span>
                          @endif
                        </div>
                  </div>

                    <div class="col-md-6">
                        <div class="form-group {{ $errors->has('do_you_have') ? ' has-error' : '' }}">
                            <label>Do you have past experience in Accredited Hospital/Lab ? <span class="error">*</span></label>
                            <div class="input-group">
                              <span class="input-group-addon"><i class="fa fa-file-text"></i></span>
                            <input id="do_you_have" type="text" class="form-control" name="do_you_have" value="{{ isset($articles->do_you_have) ? $articles->do_you_have : old('do_you_have') }}" required autofocus>
                            </div>
                            @if ($errors->has('do_you_have'))
                              <span class="help-block">
                                              <strong>{{ $errors->first('do_you_have') }}</strong>
                                          </span>
                            @endif
                          </div>
                    </div>

              </div>


              <div class="row">
                  
                  <div class="col-md-6">
                      <div class="form-group {{ $errors->has('cv_to_be') ? ' has-error' : '' }}">
                          <label>CV to be uploaded (Full Path) ?</label>
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-file-text"></i></span>
                          <input id="cv_to_be" type="text" class="form-control" name="cv_to_be" value="{{ isset($articles->cv_to_be) ? $articles->cv_to_be : old('cv_to_be') }}"  autofocus>
                          </div>
                          @if ($errors->has('cv_to_be'))
                            <span class="help-block">
                                            <strong>{{ $errors->first('cv_to_be') }}</strong>
                                        </span>
                          @endif
                        </div>
                  </div>

                    <div class="col-md-6">
                        <div class="form-group {{ $errors->has('photograph') ? ' has-error' : '' }}">
                            <label>Photograph to be uploaded (Full Path) ?</label>
                            <div class="input-group">
                              <span class="input-group-addon"><i class="fa fa-file-text"></i></span>
                            <input id="photograph" type="text" class="form-control" name="photograph" value="{{ isset($articles->photograph) ? $articles->photograph : old('photograph') }}"  autofocus>
                            </div>
                            @if ($errors->has('photograph'))
                              <span class="help-block">
                                              <strong>{{ $errors->first('photograph') }}</strong>
                                          </span>
                            @endif
                          </div>
                    </div>

              </div>

              <div class="row">
                  
                  <div class="col-md-6">
                      <div class="form-group {{ $errors->has('order_status') ? ' has-error' : '' }}">
                          <label>order status</label>
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-file-text"></i></span>
                          <input id="order_status" type="text" class="form-control" name="order_status" value="{{ isset($articles->order_status) ? $articles->order_status : old('order_status') }}"  autofocus>
                          </div>
                          @if ($errors->has('order_status'))
                            <span class="help-block">
                                            <strong>{{ $errors->first('order_status') }}</strong>
                                        </span>
                          @endif
                        </div>
                  </div>

                    <div class="col-md-6">
                        <div class="form-group {{ $errors->has('status_message') ? ' has-error' : '' }}">
                            <label>Status Message</label>
                            <div class="input-group">
                              <span class="input-group-addon"><i class="fa fa-file-text"></i></span>
                            <input id="status_message" type="text" class="form-control" name="status_message" value="{{ isset($articles->status_message) ? $articles->status_message : old('status_message') }}"  autofocus>
                            </div>
                            @if ($errors->has('status_message'))
                              <span class="help-block">
                                              <strong>{{ $errors->first('status_message') }}</strong>
                                          </span>
                            @endif
                          </div>
                    </div>

              </div>

              <div class="row">
                  
                  <div class="col-md-6">
                      <div class="form-group {{ $errors->has('order_id') ? ' has-error' : '' }}">
                          <label>order_id</label>
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-file-text"></i></span>
                          <input id="order_id" type="text" class="form-control" name="order_id" value="{{ isset($articles->order_id) ? $articles->order_id : old('order_id') }}"  autofocus>
                          </div>
                          @if ($errors->has('order_id'))
                            <span class="help-block">
                                            <strong>{{ $errors->first('order_id') }}</strong>
                                        </span>
                          @endif
                        </div>
                  </div>

                    <div class="col-md-6">
                        <div class="form-group {{ $errors->has('tracking_id') ? ' has-error' : '' }}">
                            <label>Status Message</label>
                            <div class="input-group">
                              <span class="input-group-addon"><i class="fa fa-file-text"></i></span>
                            <input id="tracking_id" type="text" class="form-control" name="tracking_id" value="{{ isset($articles->tracking_id) ? $articles->tracking_id : old('tracking_id') }}"  autofocus>
                            </div>
                            @if ($errors->has('tracking_id'))
                              <span class="help-block">
                                              <strong>{{ $errors->first('tracking_id') }}</strong>
                                          </span>
                            @endif
                          </div>
                    </div>

              </div>
               

                

                <div class="row">

                      <div class="col-md-6">
                        <div class="form-group {{ $errors->has('catid') ? ' has-error' : '' }}">
                            <label>Category (Applied For) </label>
                            <div class="input-group">
                              <span class="input-group-addon"><i class="fa fa-file-text"></i></span>
                                <select name="applied_for" id="applied_for" class="form-control"  autofocus>
                                  <option value="0">Select</option>
                                  @foreach($categorylist as $catid=>$singlecat)

                                  @php 
                                    $selected='';
                                    if(isset($articles->applied_for))
                                    {
                                      if($articles->applied_for)
                                      {
                                        $registrationslistarray = explode(',',$articles->applied_for);
                                      
                                        if(in_array($catid,$registrationslistarray))
                                        {
                                          $selected='selected';
                                        }
                                      }
                                    }
                                  @endphp
                                  <option value="{{$catid}}" {{$selected}}>{{$singlecat}}</option>
                                  @endforeach
                                </select>
                            </div>
                            @if ($errors->has('applied_for'))
                            <span class="help-block">
                                            <strong>{{ $errors->first('applied_for') }}</strong>
                                        </span>
                          @endif
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group {{ $errors->has('program_id') ? ' has-error' : '' }}">
                            <label>Program </label>
                            <div class="input-group">
                              <span class="input-group-addon"><i class="fa fa-file-text"></i></span>
                                <select name="program_id" id="program_id" class="form-control"  autofocus>
                                <option value="0">Select</option>
                                  @foreach($programlist as $catid=>$singlecat)

                                  @php 
                                    $selected='';
                                    if(isset($articles->program_id))
                                    {
                                      if($articles->program_id)
                                      {
                                        $registrationslistarray = explode(',',$articles->program_id);
                                      
                                        if(in_array($catid,$registrationslistarray))
                                        {
                                          $selected='selected';
                                        }
                                      }
                                    }
                                  @endphp
                                  <option value="{{$catid}}" {{$selected}}>{{$singlecat}}</option>
                                  @endforeach
                                </select>
                            </div>
                            @if ($errors->has('program_id'))
                            <span class="help-block">
                                            <strong>{{ $errors->first('program_id') }}</strong>
                                        </span>
                          @endif
                        </div>
                    </div>

                </div>

               

                

                

               
                <div class="box-footer">



                  @empty($articles)
                    <button type="submit" class="btn btn-primary">Add Data</button>
                  @endempty

                  @isset($articles)
                    <button type="submit" class="btn btn-primary">Update Data</button>
                  @endisset







                </div>


              </div>

            </form>
    </div>
  </section>

@endsection


@section('javascript')
<!-- Select2 -->
<script src="{{ env('APP_URL') }}/bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- InputMask -->
<script src="{{ env('APP_URL') }}/plugins/input-mask/jquery.inputmask.js"></script>
<script src="{{ env('APP_URL') }}/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="{{ env('APP_URL') }}/plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- date-range-picker -->
<script src="{{ env('APP_URL') }}/bower_components/moment/min/moment.min.js"></script>
<script src="{{ env('APP_URL') }}/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- bootstrap datepicker -->
<script src="{{ env('APP_URL') }}/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- bootstrap color picker -->
<script src="{{ env('APP_URL') }}/bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
<!-- bootstrap time picker -->
<script src="{{ env('APP_URL') }}/plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- SlimScroll -->
<script src="{{ env('APP_URL') }}/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- iCheck 1.0.1 -->
<script src="{{ env('APP_URL') }}/plugins/iCheck/icheck.min.js"></script>
<!-- Page script -->
<script>
    $(function () {
        //Initialize Select2 Elements
        $('.select2').select2()

        //Datemask dd/mm/yyyy
        $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
        //Datemask2 mm/dd/yyyy
        $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
        //Money Euro
        $('[data-mask]').inputmask()

        //Date range picker
        $('#reservation').daterangepicker()
        //Date range picker with time picker
        $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A' })
        //Date range as a button
        $('#daterange-btn').daterangepicker(
            {
                ranges   : {
                    'Today'       : [moment(), moment()],
                    'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month'  : [moment().startOf('month'), moment().endOf('month')],
                    'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                },
                startDate: moment().subtract(29, 'days'),
                endDate  : moment()
            },
            function (start, end) {
                $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
            }
        )

        //Date picker
        $('#datepicker').datepicker({
            autoclose: true,
            format: 'dd-mm-yyyy'
        })

        //iCheck for checkbox and radio inputs
        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
            checkboxClass: 'icheckbox_minimal-blue',
            radioClass   : 'iradio_minimal-blue'
        })
        //Red color scheme for iCheck
        $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
            checkboxClass: 'icheckbox_minimal-red',
            radioClass   : 'iradio_minimal-red'
        })
        //Flat red color scheme for iCheck
        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
            checkboxClass: 'icheckbox_flat-green',
            radioClass   : 'iradio_flat-green'
        })

        //Colorpicker
        $('.my-colorpicker1').colorpicker()
        //color picker with addon
        $('.my-colorpicker2').colorpicker()

        //Timepicker
        $('.timepicker').timepicker({
            showInputs: false
        })
    })
</script>


<script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
<script>
    var domain = "{{url('/')}}";
    var options = {
        filebrowserImageBrowseUrl: domain+'/laravel-filemanager?type=Images',
        filebrowserImageUploadUrl: domain+'/laravel-filemanager/upload?type=Images&_token=',
        filebrowserBrowseUrl: domain+'/laravel-filemanager?type=Files',
        filebrowserUploadUrl: domain+'/laravel-filemanager/upload?type=Files&_token='
    };
</script>
<script>
    CKEDITOR.replace( 'article-ckeditor',options );
    //CKEDITOR.replace( 'article-statistics',options );
    //CKEDITOR.replace( 'article-process',options );
    CKEDITOR.config.allowedContent = true;
</script>
<script src="{{ asset('vendor/laravel-filemanager/js/lfm.js') }}"></script>
<script type="text/javascript">
    var domains = "{{url('/laravel-filemanager/')}}";
    $('.lfm').filemanager('image', {prefix: domains});
   


    $(document).ready(function() {
	var max_fields      = 100; //maximum input boxes allowed
	var wrapper   		= $(".input_fields_wrap"); //Fields wrapper
	var add_button      = $(".add_field_button"); //Add button ID
    
	var course_cnt = $("#course_cnt").val(); 
  var x = parseInt(course_cnt)+1;
  
	$(add_button).click(function(e){ //on add input button click
		e.preventDefault();
    if(x < max_fields)
      { 
       $("#course_cnt").val(x);
       var imgcntr=parseInt(x)+3;
			x++; //text box increment
			$(wrapper).append(`<div class="col-md-12">
                                  <input type="hidden" name="programdataid[]" value="0">
                                  <div class="col-md-4">
                                      <div class="form-group">
                                          <label>Title</label>
                                          <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-file-text"></i></span>
                                            <input  type="text" class="form-control" name="featurestitle[]" value=""  autofocus>
                                          </div>

                                      </div>
                                  </div>
                                  <div class="col-md-4">
                                      <div class="form-group">
                                          <label>Icon</label>
                                          <div class="input-group">
    <span class="input-group-btn"><a  data-input="imgdata`+imgcntr+`" data-preview="holder`+imgcntr+`" class="btn btn-primary lfm"><i class="fa fa-picture-o"></i> Choose</a></span>
    <input id="imgdata`+imgcntr+`"  value="" class="form-control" type="text" name="featureimg[]">
</div>
<img id="holder`+imgcntr+`" style="margin-top:15px;max-height:100px;" />

                                      </div>
                                  </div>

                                  <div class="col-md-4">
                                      <div class="form-group">
                                          <label>Order</label>
                                          <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-file-text"></i></span>
                                            <input  type="number" class="form-control" name="featuresorder[]" value="`+x+`"  autofocus>
                                          </div>

                                      </div>
                                  </div>
                                 
                            <a href="#" class="remove_field">Remove</a></div>`); //add input box
		}


  var domains = "{{url('/laravel-filemanager/')}}";
  $('.lfm').filemanager('image', {prefix: domains});


	});
	
	$(wrapper).on("click",".remove_field", function(e){ //user click on remove text
    e.preventDefault(); $(this).parent('div').remove(); x--;
    $("#course_cnt").val(x);
	})



});

</script>
@endsection
