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
    Program
      <small>Management</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{ env('APP_URL') }}/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="{{ env('APP_URL') }}/dashboard/programs">Program Management</a></li>
      <li><a href="#">Program Add / Edit</a></li>
    </ol>
  </section>

  <section class="content">

    <div class="box box-default">
      <div class="box-header with-border">
        <h3 class="box-title">Program Add / Edit</h3>

        <div class="box-tools pull-right">

          <a href="{{ env('APP_URL') }}/dashboard/programs" class="btn btn-danger btn-xs"><i class="fa fa-arrow-left"></i></a>

        </div>
      </div>
      @empty($articles)
        <form role="form" method="POST" action="{{ env('APP_URL') }}/dashboard/programs/add/new" enctype="multipart/form-data">
          @endempty

          @isset($articles)
            <form role="form" method="POST" action="{{ env('APP_URL') }}/dashboard/programs/edit/{{$articles->id}}" enctype="multipart/form-data">
              @endisset


              {{ csrf_field() }}
              <div class="box-body">
                <input type="hidden" name="content_type" value="page"/>
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
                    <!-- /.form-group -->

                     

                    <div class="form-group">
                      <label>Order</label>
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-sort-numeric-asc"></i></span>
                      <input id="ordering" type="number" class="form-control" name="ordering" value="{{ isset($articles->ordering) ? $articles->ordering : old('ordering') }}" >
                      </div>
                      </div>


                  </div>
                  <!-- /.col -->
                  <div class="col-md-6">


                    <div class="form-group {{ $errors->has('status') ? ' has-error' : '' }}">
                      <label>Status <span class="error">*</span></label>
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-file-text"></i></span>
                      <select name="status" id="status" class="form-control" required autofocus>
                        <option value="">Select</option>
                        <option value="1" @isset($articles->status)  @if($articles->status==1){{ 'selected' }} @endif @endisset>Active</option>
                        <option value="0" @isset($articles->status)  @if($articles->status==0){{ 'selected' }} @endif @endisset>Inactive</option>
                      </select>
                      </div>
                      @if ($errors->has('status'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('status') }}</strong>
                                    </span>
                      @endif
                    </div>

                    <div class="form-group {{ $errors->has('parent_id') ? ' has-error' : '' }}">
                            <label>Category</label>
                            <div class="input-group">
                              <span class="input-group-addon"><i class="fa fa-file-text"></i></span>
                                <select name="parent_id" id="parent_id" class="form-control"  autofocus>
                                  
                                  @foreach($categorylist as $catid=>$singlecat)

                                  @php 
                                    $selected='';
                                    if(isset($articles->parent_id))
                                    {
                                      if($articles->program_id)
                                      {
                                        $registrationslistarray = explode(',',$articles->parent_id);
                                      
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
                            @if ($errors->has('parent_id'))
                            <span class="help-block">
                                            <strong>{{ $errors->first('parent_id') }}</strong>
                                        </span>
                          @endif
                        </div>
                   
                  </div>
                  <!-- /.col -->

                </div>
                <!-- /.row -->
                <div class="box-footer">



                  @empty($articles)
                    <button type="submit" class="btn btn-primary">Add Category</button>
                  @endempty

                  @isset($articles)
                    <button type="submit" class="btn btn-primary">Update Category</button>
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
    $('#lfm').filemanager('image', {prefix: domains});
    $('#lfm1').filemanager('image', {prefix: domains});
</script>
@endsection
