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
    Cahotech
     
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{ env('APP_URL') }}/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="{{ env('APP_URL') }}/dashboard/cahotech">cahotech 2019</a></li>
      <li><a href="#"> Add / Edit</a></li>
    </ol>
  </section>

  <section class="content">

    <div class="box box-default">
      <div class="box-header with-border">
        <h3 class="box-title"> Add / Edit</h3>

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
                        <div class="form-group {{ $errors->has('reference_id') ? ' has-error' : '' }}">
                            <label>Reference id </label>
                            <div class="input-group">
                              <span class="input-group-addon"><i class="fa fa-file-text"></i></span>
                                <input id="reference_id" type="text" class="form-control" name="reference_id" value="{{ isset($articles->reference_id) ? $articles->reference_id : old('reference_id') }}"  autofocus>
                            </div>
                            @if ($errors->has('reference_id'))
                              <span class="help-block">
                                              <strong>{{ $errors->first('reference_id') }}</strong>
                                          </span>
                            @endif
                          </div>
                    </div>

                      <div class="col-md-6">
                          <div class="form-group {{ $errors->has('regorderno') ? ' has-error' : '' }}">
                              <label>Registration No. </label>
                              <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-file-text"></i></span>
                              <input id="regorderno" type="text" class="form-control" name="regorderno" value="{{ isset($articles->regorderno) ? $articles->regorderno : old('regorderno') }}"  autofocus>
                              </div>
                              @if ($errors->has('regorderno'))
                                <span class="help-block">
                                                <strong>{{ $errors->first('regorderno') }}</strong>
                                            </span>
                              @endif
                            </div>
                      </div>

                </div>

                <div class="row">
                  
                  <div class="col-md-6">
                      <div class="form-group {{ $errors->has('title') ? ' has-error' : '' }}">
                          <label>Title </label>
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-file-text"></i></span>
                              <input id="title" type="text" class="form-control" name="title" value="{{ isset($articles->title) ? $articles->title : old('title') }}"  autofocus>
                          </div>
                          @if ($errors->has('title'))
                            <span class="help-block">
                                            <strong>{{ $errors->first('title') }}</strong>
                                        </span>
                          @endif
                        </div>
                  </div>

                    <div class="col-md-6">
                        <div class="form-group {{ $errors->has('first_name') ? ' has-error' : '' }}">
                            <label>first Name </label>
                            <div class="input-group">
                              <span class="input-group-addon"><i class="fa fa-file-text"></i></span>
                            <input id="first_name" type="text" class="form-control" name="first_name" value="{{ isset($articles->first_name) ? $articles->first_name : old('first_name') }}"  autofocus>
                            </div>
                            @if ($errors->has('first_name'))
                              <span class="help-block">
                                              <strong>{{ $errors->first('first_name') }}</strong>
                                          </span>
                            @endif
                          </div>
                    </div>

               </div>

                <div class="row">
                  
                  <div class="col-md-6">
                      <div class="form-group {{ $errors->has('last_name') ? ' has-error' : '' }}">
                          <label>Last Name </label>
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-file-text"></i></span>
                              <input id="last_name" type="text" class="form-control" name="last_name" value="{{ isset($articles->last_name) ? $articles->last_name : old('last_name') }}"  autofocus>
                          </div>
                          @if ($errors->has('last_name'))
                            <span class="help-block">
                                            <strong>{{ $errors->first('last_name') }}</strong>
                                        </span>
                          @endif
                        </div>
                  </div>

                    <div class="col-md-6">
                        <div class="form-group {{ $errors->has('age') ? ' has-error' : '' }}">
                            <label>Age </label>
                            <div class="input-group">
                              <span class="input-group-addon"><i class="fa fa-file-text"></i></span>
                            <input id="age" type="text" class="form-control" name="age" value="{{ isset($articles->age) ? $articles->age : old('age') }}"  autofocus>
                            </div>
                            @if ($errors->has('age'))
                              <span class="help-block">
                                              <strong>{{ $errors->first('age') }}</strong>
                                          </span>
                            @endif
                          </div>
                    </div>

               </div>

                <div class="row">
                  
                  <div class="col-md-6">
                      <div class="form-group {{ $errors->has('organization') ? ' has-error' : '' }}">
                          <label>Organization </label>
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-file-text"></i></span>
                              <input id="organization" type="text" class="form-control" name="organization" value="{{ isset($articles->organization) ? $articles->organization : old('organization') }}"  autofocus>
                          </div>
                          @if ($errors->has('organization'))
                            <span class="help-block">
                                            <strong>{{ $errors->first('organization') }}</strong>
                                        </span>
                          @endif
                        </div>
                  </div>

                    <div class="col-md-6">
                        <div class="form-group {{ $errors->has('designation') ? ' has-error' : '' }}">
                            <label>Designation </label>
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

               </div>

               <div class="row">
                  
                  <div class="col-md-6">
                      <div class="form-group {{ $errors->has('address') ? ' has-error' : '' }}">
                          <label>Address </label>
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
                        <div class="form-group {{ $errors->has('city') ? ' has-error' : '' }}">
                            <label>City </label>
                            <div class="input-group">
                              <span class="input-group-addon"><i class="fa fa-file-text"></i></span>
                            <input id="city" type="text" class="form-control" name="city" value="{{ isset($articles->city) ? $articles->city : old('city') }}"  autofocus>
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
                      <div class="form-group {{ $errors->has('state') ? ' has-error' : '' }}">
                          <label>State </label>
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-file-text"></i></span>
                              <input id="state" type="text" class="form-control" name="state" value="{{ isset($articles->state) ? $articles->state : old('state') }}"  autofocus>
                          </div>
                          @if ($errors->has('state'))
                            <span class="help-block">
                                            <strong>{{ $errors->first('state') }}</strong>
                                        </span>
                          @endif
                        </div>
                  </div>

                    <div class="col-md-6">
                        <div class="form-group {{ $errors->has('pincode') ? ' has-error' : '' }}">
                            <label>Pincode </label>
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

               </div>

                <div class="row">
                  
                  <div class="col-md-6">
                      <div class="form-group {{ $errors->has('mobile') ? ' has-error' : '' }}">
                          <label>Mobile </label>
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-file-text"></i></span>
                              <input id="mobile" type="text" class="form-control" name="mobile" value="{{ isset($articles->mobile) ? $articles->mobile : old('mobile') }}"  autofocus>
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
                            <label>Email </label>
                            <div class="input-group">
                              <span class="input-group-addon"><i class="fa fa-file-text"></i></span>
                            <input id="email" type="text" class="form-control" name="email" value="{{ isset($articles->email) ? $articles->email : old('email') }}"  autofocus>
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
                      <div class="form-group {{ $errors->has('fee_category') ? ' has-error' : '' }}">
                          <label>Fee Category </label>
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-file-text"></i></span>
                              <input id="fee_category" type="text" class="form-control" name="fee_category" value="{{ isset($articles->fee_category) ? $articles->fee_category : old('fee_category') }}"  autofocus>
                          </div>
                          @if ($errors->has('fee_category'))
                            <span class="help-block">
                                            <strong>{{ $errors->first('fee_category') }}</strong>
                                        </span>
                          @endif
                        </div>
                  </div>

                    <div class="col-md-6">
                        <div class="form-group {{ $errors->has('fee_details') ? ' has-error' : '' }}">
                            <label>Fee Details </label>
                            <div class="input-group">
                              <span class="input-group-addon"><i class="fa fa-file-text"></i></span>
                            <input id="fee_details" type="text" class="form-control" name="fee_details" value="{{ isset($articles->fee_details) ? $articles->fee_details : old('fee_details') }}"  autofocus>
                            </div>
                            @if ($errors->has('fee_details'))
                              <span class="help-block">
                                              <strong>{{ $errors->first('fee_details') }}</strong>
                                          </span>
                            @endif
                          </div>
                    </div>

               </div>

               <div class="row">
                  
                  <div class="col-md-6">
                      <div class="form-group {{ $errors->has('workshop') ? ' has-error' : '' }}">
                          <label>Workshop </label>
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-file-text"></i></span>
                              <input id="workshop" type="text" class="form-control" name="workshop" value="{{ isset($articles->workshop) ? $articles->workshop : old('workshop') }}"  autofocus>
                          </div>
                          @if ($errors->has('workshop'))
                            <span class="help-block">
                                            <strong>{{ $errors->first('workshop') }}</strong>
                                        </span>
                          @endif
                        </div>
                  </div>

                    <div class="col-md-6">
                        <div class="form-group {{ $errors->has('fee_details') ? ' has-error' : '' }}">
                            <label>Fee Details </label>
                            <div class="input-group">
                              <span class="input-group-addon"><i class="fa fa-file-text"></i></span>
                            <input id="fee_details" type="text" class="form-control" name="fee_details" value="{{ isset($articles->fee_details) ? $articles->fee_details : old('fee_details') }}"  autofocus>
                            </div>
                            @if ($errors->has('fee_details'))
                              <span class="help-block">
                                              <strong>{{ $errors->first('fee_details') }}</strong>
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
