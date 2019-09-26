@extends('dashboard/layouts.master')
@section('content')


<!-- DataTables -->
<link rel="stylesheet" href="{{ env('APP_URL') }}/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">



@include('dashboard/layouts.action')

<section class="content-header">
  <h1>
    Registrations Management
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Registrations Management</a></li>
  </ol>
</section>



<section class="content">

  <div class="box box-default">
    <div class="box-header with-border flex">
      <h3 class="box-title">Registrations Listing</h3>

      <div class="box-tools pull-right">
        <a href="{{ env('APP_URL') }}/dashboard/registrations/add/new"><button class="btn-success big-btn" title="Add registrations">+ Create New
            <!-- <i class="ace-icon fa fa-plus icon-only bigger-100"></i> -->
          </button></a>
        <a href="javascript:act_rec('{{ env('APP_URL') }}/dashboard/registrations');"><button class="btn-info big-btn excell-icon" title="Publish">Download
            <!-- <i class="ace-icon fa fa-eye icon-only bigger-100"></i>  -->
          </button></a>

          <a href="javascript:act_rec('{{ env('APP_URL') }}/dashboard/registrations');"><button class="btn-info big-btn" title="Publish">Publish
            <!-- <i class="ace-icon fa fa-eye icon-only bigger-100"></i>  -->
          </button></a>
        <a href="javascript:inact_rec('{{ env('APP_URL') }}/dashboard/registrations');"><button class="btn-warning big-btn" title="Unpublish">Unpublish
            <!-- <i class="ace-icon fa   fa-eye-slash  icon-only bigger-100"></i> -->
          </button></a>
        <a href="javascript:del_rec('{{ env('APP_URL') }}/dashboard/registrations');"><button class="btn-danger big-btn" title="Delete">Delete
            <!-- <i class="ace-icon fa fa-trash-o  icon-only bigger-100"></i> -->
          </button></a>

      </div>

    </div>

    <!-- /.box-header -->
    <div class="box-body">

      <div class="nav-tabs-custom">
        <style>
          .filter_boxes select {
            width: 100%;
            height: 33px;
            border: 1px solid #e0e0e0;
            padding: 5px;

          }

          .filter_boxes .cat,
          .filter_boxes .prog {
            margin-bottom: 15px;
          }

          .filter_boxes {
            border: 1px solid #efefef;
            box-sizing: border-box;
            background: #f5f5f5;
            box-shadow: 0 0 4px #ccc;
            padding: 20px;
          }

          .filter_boxes input[type="submit"] {
            padding: 2px 30px;
            text-transform: capitalize;
            background: #00a65a;
            border: 1px solid #00a65a;
            color: #fff;
            font-size: 17px;
            box-shadow: 0 0 6px #066f3f;
          }
        </style>

        <ul class="nav nav-tabs">
          <li class="active"><a href="#RegistrationDetail" data-toggle="tab">Registration Detail</a></li>
        </ul>

        <div class="tab-content">

          <div class="tab-pane active" id="RegistrationDetail">

            <div class="filter_boxes">

              <form>

                <input type="hidden" name="programstatus" value="{{$programstatus}}">
                <div class="row">
                  <div class="col-sm-6 cat">
                    <select name="cat_id">
                      <option value="">Select Category</option>
                      @foreach($categorylist as $slug=>$singlecat)
                      <option value="{{$slug}}" @if($cat_id==$slug) selected @endif>{{$singlecat}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="col-sm-6">
                    <select name="program">
                      <option value="">Select Program</option>
                      @foreach($programlist as $slug=>$singleprogm)
                      <option value="{{$slug}}" @if($program==$slug) selected @endif>{{$singleprogm}}</option>
                      @endforeach
                    </select></div>
                </div>
                <div class="row">
                  <div class="col-sm-3">
                    <select name="city">
                      <option value="">Select City</option>
                      @foreach($citylist as $singlecity)
                      <option value="{{$singlecity->city}}" @if($city==$singlecity->city) selected @endif>{{$singlecity->city}}</option>
                      @endforeach
                    </select></div>
                  <div class="col-sm-3">
                    <select name="state">
                      <option value="">Select State</option>
                      @foreach($statelist as $singlestate)
                      <option value="{{$singlestate->state}}" @if($state==$singlestate->state) selected @endif>{{$singlestate->state}}</option>
                      @endforeach
                    </select></div>
                  <div class="col-sm-3">
                    <select name="location">
                      <option value="">Select Location</option>
                      @foreach($program_locationlist as $singlelocation)
                      @if($singlelocation->program_location)
                      <option value="{{$singlelocation->program_location}}" @if($location==$singlelocation->program_location) selected @endif>{{$singlelocation->program_location}}</option>
                      @endif
                      @endforeach
                    </select>
                  </div>
                  <div class="col-sm-3">
                    <input type="submit" value="filter">
                  </div>
                </div>
              </form>

            </div>

            <div class="panel-body">

              <form action="" method="post" enctype="multipart/form-data" name="form" id="mainbody" style="display:none;">

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

                {{ csrf_field() }}


                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th width="7%">Unique ID</th>
                      <th width="16%">Name</th>
                      <th width="10%">Profession</th>
                      <th width="6%">Gender</th>
                      <th width="30%">Qualification</th>
                      <th width="14%">Program Location</th>
                      <th width="6%"><input name="allchk" value="yes" type="checkbox" onClick="Check(document.form.chkid)" /> All</th>
                      <th class="fixed-sec" width="12%">&nbsp;</th>
                    </tr>
                  </thead>
                  <tbody>

                    @foreach($articles as $article)
                    <tr class="odd gradeX">
                      <td>{{ $article->uniqueid }}</td>
                      <td>{{ $article->title }} {{ $article->first_name }} {{ $article->last_name }}</td>

                      <td>{{ $article->type_of_profession }}</td>
                      <td>{{ $article->sex }}</td>
                      <td>{{ $article->qualification }}</td>
                      <td>{{ $article->program_location }}</td>

                      <td class="center flex">


                        <input name="chkid[{{  $article->id }}]" id="chkid" type="checkbox" value="{{  $article->id }}" class="checkbtn" />

                        @if($article->status == 1)
                        <a id="{{  $article->id }} active" class="pub_unpub" href="{{ env('APP_URL') }}/dashboard/registrations/{{$article->id}}/deactivate" onclick="return confirm('Are you sure you want to Inactivate record!');"><img src="{{asset('backend/assets/images/tick-circle.gif')}}" width="16" height="16" border="0" title="Make Active" /></a>
                        @else
                        <a id="{{  $article->id }} inactive" class="pub_unpub" href="{{ env('APP_URL') }}/dashboard/registrations/{{$article->id}}/activate" onclick="return confirm('Are you sure you want to Activate record!');"><img src="{{asset('backend/assets/images/unpublish.gif')}}" width="16" height="16" border="0" title="Make Inactive" /></a>
                        @endif

                        <!-- <a href="{{ env('APP_URL') }}/dashboard/registrations/edit/{{ $article->id }}"><img src="{{asset('backend/assets/images/pencil.gif')}}" width="16" height="16" border="0" /></a> -->

                        <a href="{{ env('APP_URL') }}/dashboard/registrations/{{ $article->id }}/destroy" onClick="return confirm('Are you sure you want to delete record!');"><i class="fa fa-trash-o fa-fw"></i></a>

                      </td>
                      <td class="fixed-sec">
                        <a href="{{ env('APP_URL') }}/dashboard/registrations/edit/{{ $article->id }}">View</a>
                      </td>
                    </tr>
                    @endforeach




                  </tbody>
                </table>




              </form>
              <!-- /.table-responsive -->

              <div id="loader" style="display:block;text-align:center;">Please Wait..</div>

            </div>

          </div>

        </div>


      </div>

    </div>
    <!-- /.box-body -->
  </div>
</section>

@endsection

@section('javascript')
<!-- DataTables -->
<script src="{{ env('APP_URL') }}/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="{{ env('APP_URL') }}/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="{{ env('APP_URL') }}/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- page script -->
<script>
  $(function() {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging': true,
      'lengthChange': false,
      'searching': false,
      'ordering': true,
      'info': true,
      'autoWidth': false
    })
  })


  setTimeout(function() {

    $("#loader").hide();
    $("#mainbody").show();

  }, 1000);
</script>
@endsection