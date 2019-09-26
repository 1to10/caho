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
    Membership
      <small>Management</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{ env('APP_URL') }}/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="{{ env('APP_URL') }}/dashboard/membership">Membership Management</a></li>
      <li><a href="#">Membership Add / Edit</a></li>
    </ol>
  </section>

  <section class="content">

    <div class="box box-default">
      <div class="box-header with-border">
        <h3 class="box-title">membership Add / Edit</h3>

        <div class="box-tools pull-right">

          <a href="{{ env('APP_URL') }}/dashboard/membership" class="btn btn-danger btn-xs"><i class="fa fa-arrow-left"></i></a>

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
                        <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                            <label>Title <span class="error">*</span></label>
                            <div class="input-group">
                              <span class="input-group-addon"><i class="fa fa-file-text"></i></span>
                            <input id="title" type="text" class="form-control" name="name" value="{{ isset($articles->name) ? $articles->name : old('name') }}" required autofocus>
                            </div>
                            @if ($errors->has('name'))
                              <span class="help-block">
                                              <strong>{{ $errors->first('name') }}</strong>
                                          </span>
                            @endif
                          </div>
                    </div>

                      <div class="col-md-6">
                          <div class="form-group {{ $errors->has('img') ? ' has-error' : '' }}">
                              <label>Icon Path <span class="error">*</span></label>
                              <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-file-text"></i></span>
                              <input id="img" type="text" class="form-control" name="img" value="{{ isset($articles->img) ? $articles->img : old('img') }}" required autofocus>
                              </div>
                              @if ($errors->has('img'))
                                <span class="help-block">
                                                <strong>{{ $errors->first('img') }}</strong>
                                            </span>
                              @endif
                            </div>
                      </div>

                </div>

              <div class="row">
                  
                  <div class="col-md-6">
                      <div class="form-group {{ $errors->has('short_desc') ? ' has-error' : '' }}">
                          <label>Short Desc <span class="error">*</span></label>
                          
                          <textarea id="introtext"  name="short_desc" class="form-control ckeditor">{{ isset($articles->short_desc) ? $articles->short_desc : old('short_desc') }}</textarea>
                         
                          @if ($errors->has('short_desc'))
                            <span class="help-block">
                                            <strong>{{ $errors->first('short_desc') }}</strong>
                                        </span>
                          @endif
                        </div>
                  </div>

                    <div class="col-md-6">
                        <div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
                            <label>Description <span class="error">*</span></label>
                            
                            <textarea id="description"  name="description" class="form-control ckeditor">{{ isset($articles->description) ? $articles->description : old('description') }}</textarea>

                            @if ($errors->has('description'))
                              <span class="help-block">
                                              <strong>{{ $errors->first('description') }}</strong>
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
  </script>
@endsection
