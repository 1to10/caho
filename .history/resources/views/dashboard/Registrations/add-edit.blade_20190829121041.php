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
                          <div class="form-group {{ $errors->has('alias') ? ' has-error' : '' }}">
                              <label>Slug <span class="error">*</span></label>
                              <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-file-text"></i></span>
                              <input id="alias" type="text" class="form-control" name="alias" value="{{ isset($articles->alias) ? $articles->alias : old('alias') }}" required autofocus>
                              </div>
                              @if ($errors->has('alias'))
                                <span class="help-block">
                                                <strong>{{ $errors->first('alias') }}</strong>
                                            </span>
                              @endif
                            </div>
                      </div>

                </div>


                <div class="row">
                  
                  <div class="col-md-6">
                      <div class="form-group">
                          <label>Banner Img</label>
                          <div class="input-group">
                            <span class="input-group-btn"><a  data-input="imgdata2" data-preview="holder2" class="btn btn-primary lfm" id="lfm2"><i class="fa fa-picture-o"></i> Choose</a></span>
                            <input id="imgdata2"  value="{{(isset($articles->banner_img))?$articles->banner_img:''}}" class="form-control" type="text" name="banner_img">
                          </div>
                          <img id="holder2" style="margin-top:15px;max-height:100px;" @if(isset($articles->banner_img)) src="{{ env('APP_URL') }}{{ $articles->banner_img}}" @endif />
                        </div>
                  </div>

                    <div class="col-md-6">
                    <div class="form-group">
                      <label>Icon Img</label>
                      <div class="input-group">
                        <span class="input-group-btn"><a  data-input="imgdata" data-preview="holder" class="btn btn-primary lfm" id="lfm"><i class="fa fa-picture-o"></i> Choose</a></span>
                        <input id="imgdata"  value="{{(isset($articles->iconimg))?$articles->iconimg:''}}" class="form-control" type="text" name="iconimg">
                      </div>
                      <img id="holder" style="margin-top:15px;max-height:100px;" @if(isset($articles->iconimg)) src="{{ env('APP_URL') }}{{ $articles->iconimg}}" @endif />
                    </div>
                    </div>

                </div>

                <div class="row">
                  
                  <div class="col-md-6">
                  <div class="form-group" >
                      <label>Banner Text</label>

                      <input id="Banner_text" name="Banner_text" type="text" class="form-control" value="{{ isset($articles->Banner_text) ? $articles->Banner_text : old('Banner_text') }}">
                    </div>
                  </div>

                    <div class="col-md-6">

                      <div class="form-group">
                      <label>Featured Img</label>
                      <div class="input-group">
                        <span class="input-group-btn"><a  data-input="imgdata1" data-preview="holder1" class="btn btn-primary lfm" id="lfm1"><i class="fa fa-picture-o"></i> Choose</a></span>
                        <input id="imgdata1"  value="{{(isset($articles->img))?$articles->img:''}}" class="form-control" type="text" name="img">
                      </div>
                      <img id="holder1" style="margin-top:15px;max-height:100px;" @if(isset($articles->img)) src="{{ env('APP_URL') }}{{ $articles->img}}" @endif />
                    </div>

                    </div>

                </div>

                <div class="row">

                      <div class="col-md-6">
                        <div class="form-group {{ $errors->has('catid') ? ' has-error' : '' }}">
                            <label>Faculty </label>
                            <div class="input-group">
                              <span class="input-group-addon"><i class="fa fa-file-text"></i></span>
                                <select name="facultylist_iddata[]" id="facultylist_id" class="form-control select2"  autofocus multiple="multiple">
                                  
                                  @foreach($facultylist as $catid=>$singlecat)

                                  @php 
                                    $selected='';
                                    if(isset($articles->facultylist_id))
                                    {
                                      if($articles->facultylist_id)
                                      {
                                        $registrationslistarray = explode(',',$articles->facultylist_id);
                                      
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
                            @if ($errors->has('catid'))
                            <span class="help-block">
                                            <strong>{{ $errors->first('catid') }}</strong>
                                        </span>
                          @endif
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group {{ $errors->has('catid') ? ' has-error' : '' }}">
                            <label>Labs </label>
                            <div class="input-group">
                              <span class="input-group-addon"><i class="fa fa-file-text"></i></span>
                                <select name="lablist_iddata[]" id="lablist_id" class="form-control select2"  autofocus multiple="multiple">
                                  
                                  @foreach($lablist as $catid=>$singlecat)

                                  @php 
                                    $selected='';
                                    if(isset($articles->lablist_id))
                                    {
                                      if($articles->lablist_id)
                                      {
                                        $registrationslistarray = explode(',',$articles->lablist_id);
                                      
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
                            @if ($errors->has('catid'))
                            <span class="help-block">
                                            <strong>{{ $errors->first('catid') }}</strong>
                                        </span>
                          @endif
                        </div>
                    </div>

                </div>

                <div class="row">
                  
                  <div class="col-md-6">
                  
                  <div class="form-group" >
                      <label>Short Description</label>

                      <textarea id="introtext"  name="introtext" class="form-control ckeditor">{{ isset($articles->introtext) ? $articles->introtext : old('introtext') }}</textarea>

                    </div>

                  </div>

                    <div class="col-md-6">

                      <div class="form-group" >
                      <label>Description</label>
                      <textarea id="article-ckeditor"  name="article_description" class="form-control">{{ isset($articles->article_description) ? $articles->article_description : old('article_description') }}</textarea>
                    </div>

                    </div>

                </div>

                <div class="row">
                  
                  <div class="col-md-12">
                  
                    <div class="form-group" >
                      <label>Laboratory Description</label>

                      <textarea id="introtext"  name="lab_overview" class="form-control ckeditor">{{ isset($articles->lab_overview) ? $articles->lab_overview : old('lab_overview') }}</textarea>

                    </div>

                  </div>

                    

                </div>

                 <div class="row">

                 <div class="col-md-6">
                  
                  <div class="form-group" >
                    <label>Faculty Description </label>

                    <textarea id="faculty_desc"  name="faculty_desc" class="form-control ckeditor">{{ isset($articles->faculty_desc) ? $articles->faculty_desc : old('faculty_desc') }}</textarea>

                  </div>

                </div>
                  
                  <div class="col-md-6">
                  
                    <div class="form-group" >
                      <label>Research and Recognition</label>

                      <textarea id="research_recognition"  name="research_recognition" class="form-control ckeditor">{{ isset($articles->research_recognition) ? $articles->research_recognition : old('research_recognition') }}</textarea>

                    </div>

                  </div>

                    

                </div>

                <div class="row">
                  
                  <div class="col-md-6">
                  
                  <div class="form-group {{ $errors->has('metatitle') ? ' has-error' : '' }}">
                      <label>Meta Title</label>
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-file-text"></i></span>
                      <input id="metatitle" type="text" class="form-control" name="metatitle" value="{{ isset($articles->metatitle) ? $articles->metatitle : old('metatitle') }}"  autofocus>
                      </div>
                      @if ($errors->has('metatitle'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('metatitle') }}</strong>
                                    </span>
                      @endif
                    </div>

                  </div>

                    <div class="col-md-6">

                      <div class="form-group {{ $errors->has('metakeyword') ? ' has-error' : '' }}">
                      <label>Meta Keywords</label>
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-file-text"></i></span>
                      <input id="metakeyword" type="text" class="form-control" name="metakeyword" value="{{ isset($articles->metakeyword) ? $articles->metakeyword : old('metakeyword') }}"  autofocus>
                      </div>
                      @if ($errors->has('metakeyword'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('metakeyword') }}</strong>
                                    </span>
                      @endif
                    </div>

                    </div>

                </div>

                <div class="row">
                  
                  <div class="col-md-6">
                  
                  <div class="form-group {{ $errors->has('metadescription') ? ' has-error' : '' }}">
                      <label>Meta Description</label>
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-file-text"></i></span>
                      <input id="metadescription" type="text" class="form-control" name="metadescription" value="{{ isset($articles->metadescription) ? $articles->metadescription : old('metadescription') }}"  autofocus>
                      </div>
                      @if ($errors->has('metadescription'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('metadescription') }}</strong>
                                    </span>
                      @endif
                    </div>

                  </div>

                    <div class="col-md-6">

                     <div class="form-group {{ $errors->has('status') ? ' has-error' : '' }}">
                      <label>Status <span class="error">*</span></label>
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-file-text"></i></span>
                      <select name="status" id="status" class="form-control" required autofocus>
                        <option value="">Select</option>
                        <option value="1" @isset($articles->status)  @if($articles->status==1){{ 'selected' }} @endif @endisset>Active</option>
                        <option value="2" @isset($articles->status)  @if($articles->status==2){{ 'selected' }} @endif @endisset>Inactive</option>
                      </select>
                      </div>
                      @if ($errors->has('status'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('status') }}</strong>
                                    </span>
                      @endif
                    </div>

                    </div>
                    <div class="col-md-6">

<div class="form-group {{ $errors->has('type') ? ' has-error' : '' }}">
 <label>Type <span class="error">*</span></label>
 <div class="input-group">
   <span class="input-group-addon"><i class="fa fa-file-text"></i></span>
 <select name="type" id="type" class="form-control" required autofocus>
   <option value="">Select</option>
   <option value="1" @isset($articles->type)  @if($articles->status==1){{ 'selected' }} @endif @endisset>Program</option>
   <option value="0" @isset($articles->type)  @if($articles->status==0){{ 'selected' }} @endif @endisset>Department</option>
 </select>
 </div>
 @if ($errors->has('status'))
   <span class="help-block">
                   <strong>{{ $errors->first('type') }}</strong>
               </span>
 @endif
</div>

</div>

                </div>

                <div class="row">
                  
                  <div class="col-md-6">
                  
                  <div class="form-group">
                      <label>Order</label>
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-sort-numeric-asc"></i></span>
                      <input id="ordering" type="number" class="form-control" name="ordering" value="{{ isset($articles->ordering) ? $articles->ordering : old('ordering') }}" >
                      </div>
                      </div>

                  </div>

                   

                    </div>

                </div>
                
                 

                <div class="box-footer">



                  @empty($articles)
                    <button type="submit" class="btn btn-primary">Add Program</button>
                  @endempty

                  @isset($articles)
                    <button type="submit" class="btn btn-primary">Update Program</button>
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
