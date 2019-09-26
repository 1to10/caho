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
    REGULAR MEMBERSHIP INSTITUTION
      <small>registrations</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{ env('APP_URL') }}/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="{{ env('APP_URL') }}/dashboard/member-registrations">Membership Management</a></li>
      <li><a href="#"> Add / Edit</a></li>
    </ol>
  </section>

  <section class="content">

    <div class="box box-default">
      <div class="box-header with-border">
        <h3 class="box-title">Add / Edit</h3>

        <div class="box-tools pull-right">

          <a href="{{ env('APP_URL') }}/dashboard/member-registrations" class="btn btn-danger btn-xs"><i class="fa fa-arrow-left"></i></a>

        </div>
      </div>
      @empty($articles)
        <form role="form" method="POST" action="{{ env('APP_URL') }}/dashboard/member-registrations/{{$membershipid}}/add/new" enctype="multipart/form-data">
          @endempty

          @isset($articles)
            <form role="form" method="POST" action="{{ env('APP_URL') }}/dashboard/member-registrations/{{$membershipid}}/edit/{{$articles->id}}" enctype="multipart/form-data">
              @endisset


              {{ csrf_field() }}
              <div class="box-body">

               
               <div class="row">
                  
                  <div class="col-md-6">
                      <div class="form-group {{ $errors->has('organization_name') ? ' has-error' : '' }}">
                          <label>NAME OF THE ORGANIZATION </label>
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-file-text"></i></span>
                          <input id="organization_name" type="text" class="form-control" name="organization_name" value="{{ isset($articles->organization_name) ? $articles->organization_name : old('organization_name') }}"  autofocus>
                          </div>
                          @if ($errors->has('organization_name'))
                            <span class="help-block">
                                            <strong>{{ $errors->first('organization_name') }}</strong>
                                        </span>
                          @endif
                        </div>
                  </div>

                    <div class="col-md-6">
                        <div class="form-group {{ $errors->has('classification') ? ' has-error' : '' }}">
                            <label>CLASSIFICATION </label>
                            <div class="input-group">
                              <span class="input-group-addon"><i class="fa fa-file-text"></i></span>
                            <input id="classification" type="text" class="form-control" name="classification" value="{{ isset($articles->classification) ? $articles->classification : old('classification') }}"  autofocus>
                            </div>
                            @if ($errors->has('classification'))
                              <span class="help-block">
                                              <strong>{{ $errors->first('classification') }}</strong>
                                          </span>
                            @endif
                          </div>
                    </div>

              </div>

               

              <div class="row">
                  
                  <div class="col-md-6">
                      <div class="form-group {{ $errors->has('address') ? ' has-error' : '' }}">
                          <label>ADDRESS </label>
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-file-text"></i></span>
                          <input id="address" type="text" class="form-control" name="address" value="{{ isset($articles->address) ? $articles->address : old('address') }}"  autofocus>
                          </div>
                          @if ($errors->has('address'))
                            <span class="help-block">
                                            <strong>{{ $errors->first('address') }}</strong>
                                        </span>
                          @endif
                        </div>
                  </div>

                <div class="col-md-6">
                      <div class="form-group {{ $errors->has('operational_bed') ? ' has-error' : '' }}">
                          <label>NO. OF OPERATIONAL BEDS </label>
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-file-text"></i></span>
                          <input id="operational_bed" type="text" class="form-control" name="operational_bed" value="{{ isset($articles->operational_bed) ? $articles->operational_bed : old('operational_bed') }}"  autofocus>
                          </div>
                          @if ($errors->has('operational_bed'))
                            <span class="help-block">
                                            <strong>{{ $errors->first('operational_bed') }}</strong>
                                        </span>
                          @endif
                        </div>
                  </div>
                    

              </div>

              <div class="row">
                  
                  <div class="col-md-6">
                      <div class="form-group {{ $errors->has('state') ? ' has-error' : '' }}">
                          <label>STATE <span class="error">*</span></label>
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

                    <div class="col-md-6">
                        <div class="form-group {{ $errors->has('city') ? ' has-error' : '' }}">
                            <label>CITY <span class="error">*</span></label>
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

              </div>

              <div class="row">
                  
                  <div class="col-md-6">
                      <div class="form-group {{ $errors->has('pincode') ? ' has-error' : '' }}">
                          <label>PINCODE </label>
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-file-text"></i></span>
                          <input id="pincode" type="text" class="form-control" name="pincode" value="{{ isset($articles->pincode) ? $articles->pincode : old('pincode') }}"  autofocus>
                          </div>
                          @if ($errors->has('pincode'))
                            <span class="help-block">
                                            <strong>{{ $errors->first('pincode') }}</strong>
                                        </span>
                          @endif
                        </div>
                  </div>

                    <div class="col-md-6">
                        <div class="form-group {{ $errors->has('tel_no') ? ' has-error' : '' }}">
                            <label>TEL NO(WITH STD CODE)/ MOBILE  </label>
                            <div class="input-group">
                              <span class="input-group-addon"><i class="fa fa-file-text"></i></span>
                            <input id="tel_no" type="text" class="form-control" name="tel_no" value="{{ isset($articles->tel_no) ? $articles->tel_no : old('tel_no') }}"  autofocus>
                            </div>
                            @if ($errors->has('tel_no'))
                              <span class="help-block">
                                              <strong>{{ $errors->first('tel_no') }}</strong>
                                          </span>
                            @endif
                          </div>
                    </div>

              </div>

              <div class="row">
                  
                  <div class="col-md-6">
                      <div class="form-group {{ $errors->has('website') ? ' has-error' : '' }}">
                          <label>WEBSITE </label>
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-file-text"></i></span>
                          <input id="website" type="text" class="form-control" name="website" value="{{ isset($articles->website) ? $articles->website : old('website') }}"  autofocus>
                          </div>
                          @if ($errors->has('website'))
                            <span class="help-block">
                                            <strong>{{ $errors->first('website') }}</strong>
                                        </span>
                          @endif
                        </div>
                  </div>

                    <div class="col-md-6">
                        <div class="form-group {{ $errors->has('ceo_name') ? ' has-error' : '' }}">
                            <label>NAME OF THE CEO/MD * </label>
                            <div class="input-group">
                              <span class="input-group-addon"><i class="fa fa-file-text"></i></span>
                            <input id="ceo_name" type="text" class="form-control" name="ceo_name" value="{{ isset($articles->ceo_name) ? $articles->ceo_name : old('ceo_name') }}" required autofocus>
                            </div>
                            @if ($errors->has('ceo_name'))
                              <span class="help-block">
                                              <strong>{{ $errors->first('ceo_name') }}</strong>
                                          </span>
                            @endif
                          </div>
                    </div>

              </div>

             

              <div class="row">
                  
                  <div class="col-md-6">
                      <div class="form-group {{ $errors->has('ceo_mobile') ? ' has-error' : '' }}">
                          <label>CEO/MD MOBILE NO * </label>
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-file-text"></i></span>
                          <input id="ceo_mobile" type="text" class="form-control" name="ceo_mobile" value="{{ isset($articles->ceo_mobile) ? $articles->ceo_mobile : old('ceo_mobile') }}"  autofocus>
                          </div>
                          @if ($errors->has('ceo_mobile'))
                            <span class="help-block">
                                            <strong>{{ $errors->first('ceo_mobile') }}</strong>
                                        </span>
                          @endif
                        </div>
                  </div>

                    <div class="col-md-6">
                        <div class="form-group {{ $errors->has('ceo_email') ? ' has-error' : '' }}">
                            <label>CEO/MD EMAIL* </label>
                            <div class="input-group">
                              <span class="input-group-addon"><i class="fa fa-file-text"></i></span>
                              <input id="ceo_email" type="text" class="form-control" name="ceo_email" value="{{ isset($articles->ceo_email) ? $articles->ceo_email : old('ceo_email') }}"  required autofocus>
                            </div>
                            @if ($errors->has('ceo_email'))
                              <span class="help-block">
                                              <strong>{{ $errors->first('ceo_email') }}</strong>
                                          </span>
                            @endif
                          </div>
                    </div>

              </div>

               <div class="row">
                  
                  <div class="col-md-6">
                      <div class="form-group {{ $errors->has('nominated_person') ? ' has-error' : '' }}">
                          <label>NAME OF CONTACT PERSON REPRESENTING ORGANIZATION* <span class="error">*</span></label>
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-file-text"></i></span>
                          <input id="nominated_person" type="text" class="form-control" name="nominated_person" value="{{ isset($articles->nominated_person) ? $articles->nominated_person : old('nominated_person') }}" required autofocus>
                          </div>
                          @if ($errors->has('nominated_person'))
                            <span class="help-block">
                                            <strong>{{ $errors->first('nominated_person') }}</strong>
                                        </span>
                          @endif
                        </div>
                  </div>

                    <div class="col-md-6">
                        <div class="form-group {{ $errors->has('RegistrationNO') ? ' has-error' : '' }}">
                            <label>Registration NO <span class="error">*</span></label>
                            <div class="input-group">
                              <span class="input-group-addon"><i class="fa fa-file-text"></i></span>
                            <input id="RegistrationNO" type="text" class="form-control" name="RegistrationNO" value="{{ isset($articles->RegistrationNO) ? $articles->RegistrationNO : old('RegistrationNO') }}" required autofocus>
                            </div>
                            @if ($errors->has('RegistrationNO'))
                              <span class="help-block">
                                              <strong>{{ $errors->first('RegistrationNO') }}</strong>
                                          </span>
                            @endif
                          </div>
                    </div>

              </div>

              <div class="row">
                  
                  <div class="col-md-6">
                      <div class="form-group {{ $errors->has('designation') ? ' has-error' : '' }}">
                          <label>DESIGNATION OF CONTACT PERSON </label>
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-file-text"></i></span>
                          <input id="designation" type="text" class="form-control" name="designation" value="{{ isset($articles->designation) ? $articles->designation : old('designation') }}"  autofocus>
                          </div>
                          @if ($errors->has('designation'))
                            <span class="help-block">
                                            <strong>{{ $errors->first('designation') }}</strong>
                                        </span>
                          @endif
                        </div>
                  </div>

                    <div class="col-md-6">
                        <div class="form-group {{ $errors->has('person_mobileno') ? ' has-error' : '' }}">
                            <label>MOBILE NO </label>
                            <div class="input-group">
                              <span class="input-group-addon"><i class="fa fa-file-text"></i></span>
                            <input id="person_mobileno" type="text" class="form-control" name="person_mobileno" value="{{ isset($articles->person_mobileno) ? $articles->person_mobileno : old('person_mobileno') }}"  autofocus>
                            </div>
                            @if ($errors->has('person_mobileno'))
                              <span class="help-block">
                                              <strong>{{ $errors->first('person_mobileno') }}</strong>
                                          </span>
                            @endif
                          </div>
                    </div>

              </div>

              <div class="row">
                  
                  <div class="col-md-6">
                      <div class="form-group {{ $errors->has('person_email') ? ' has-error' : '' }}">
                          <label>EMAIL </label>
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-file-text"></i></span>
                          <input id="person_email" type="text" class="form-control" name="person_email" value="{{ isset($articles->person_email) ? $articles->person_email : old('person_email') }}"  autofocus>
                          </div>
                          @if ($errors->has('person_email'))
                            <span class="help-block">
                                            <strong>{{ $errors->first('person_email') }}</strong>
                                        </span>
                          @endif
                        </div>
                  </div>

                    <div class="col-md-6">
                        <div class="form-group {{ $errors->has('amount') ? ' has-error' : '' }}">
                            <label>AMOUNT</label>
                            <div class="input-group">
                              <span class="input-group-addon"><i class="fa fa-file-text"></i></span>
                            <input id="amount" type="text" class="form-control" name="amount" value="{{ isset($articles->amount) ? $articles->amount : old('amount') }}"  autofocus>
                            </div>
                            @if ($errors->has('amount'))
                              <span class="help-block">
                                              <strong>{{ $errors->first('amount') }}</strong>
                                          </span>
                            @endif
                          </div>
                    </div>

              </div>

              <div class="row">
                  
              <div class="col-md-6">
                        <div class="form-group {{ $errors->has('MemberValidity') ? ' has-error' : '' }}">
                            <label>Member Validity </label>
                            <div class="input-group">
                              <span class="input-group-addon"><i class="fa fa-file-text"></i></span>
                            <input id="MemberValidity" type="date" class="form-control" name="MemberValidity" value="{{ isset($articles->MemberValidity) ? $articles->MemberValidity : old('MemberValidity') }}"  autofocus>
                            </div>
                            @if ($errors->has('MemberValidity'))
                              <span class="help-block">
                                              <strong>{{ $errors->first('MemberValidity') }}</strong>
                                          </span>
                            @endif
                          </div>
                    </div>
                    
                  <div class="col-md-6">
                      <div class="form-group {{ $errors->has('MembershipStatus') ? ' has-error' : '' }}">
                          <label>Membership Status </label>
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-file-text"></i></span>
                          <input id="MembershipStatus" type="text" class="form-control" name="MembershipStatus" value="{{ isset($articles->MembershipStatus) ? $articles->MembershipStatus : old('MembershipStatus') }}"  autofocus>
                          </div>
                          @if ($errors->has('MembershipStatus'))
                            <span class="help-block">
                                            <strong>{{ $errors->first('MembershipStatus') }}</strong>
                                        </span>
                          @endif
                        </div>
                  </div>

                   

              </div>

              <div class="row">
                  
                 

                     <div class="col-md-6">
                        <div class="form-group {{ $errors->has('OrderId') ? ' has-error' : '' }}">
                            <label>OrderId </label>
                            <div class="input-group">
                              <span class="input-group-addon"><i class="fa fa-file-text"></i></span>
                            <input id="OrderId" type="text" class="form-control" name="OrderId" value="{{ isset($articles->OrderId) ? $articles->OrderId : old('OrderId') }}"  autofocus>
                            </div>
                            @if ($errors->has('OrderId'))
                              <span class="help-block">
                                              <strong>{{ $errors->first('OrderId') }}</strong>
                                          </span>
                            @endif
                          </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group {{ $errors->has('Transactionid') ? ' has-error' : '' }}">
                            <label>Transaction id </label>
                            <div class="input-group">
                              <span class="input-group-addon"><i class="fa fa-file-text"></i></span>
                            <input id="Transactionid" type="text" class="form-control" name="Transactionid" value="{{ isset($articles->Transactionid) ? $articles->Transactionid : old('Transactionid') }}"  autofocus>
                            </div>
                            @if ($errors->has('Transactionid'))
                              <span class="help-block">
                                              <strong>{{ $errors->first('Transactionid') }}</strong>
                                          </span>
                            @endif
                          </div>
                    </div>

              </div>


              <div class="row">
                  
                  <div class="col-md-6">
                      <div class="form-group {{ $errors->has('StatusMessage') ? ' has-error' : '' }}">
                          <label>Status Message </label>
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-file-text"></i></span>
                          <input id="StatusMessage" type="text" class="form-control" name="StatusMessage" value="{{ isset($articles->StatusMessage) ? $articles->StatusMessage : old('StatusMessage') }}"  autofocus>
                          </div>
                          @if ($errors->has('StatusMessage'))
                            <span class="help-block">
                                            <strong>{{ $errors->first('StatusMessage') }}</strong>
                                        </span>
                          @endif
                        </div>
                  </div>

                    <div class="col-md-6">
                      <div class="form-group {{ $errors->has('OrderStatus') ? ' has-error' : '' }}">
                          <label>Order Status </label>
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-file-text"></i></span>
                          <input id="OrderStatus" type="text" class="form-control" name="OrderStatus" value="{{ isset($articles->OrderStatus) ? $articles->OrderStatus : old('OrderStatus') }}"  autofocus>
                          </div>
                          @if ($errors->has('OrderStatus'))
                            <span class="help-block">
                                            <strong>{{ $errors->first('OrderStatus') }}</strong>
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