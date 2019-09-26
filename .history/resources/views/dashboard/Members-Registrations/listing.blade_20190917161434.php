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

          <!-- <a href="javascript:act_rec('{{ env('APP_URL') }}/dashboard/registrations');"><button class="btn-info big-btn" title="Publish">Publish -->
            <!-- <i class="ace-icon fa fa-eye icon-only bigger-100"></i>  -->
          </button></a>
        <!-- <a href="javascript:inact_rec('{{ env('APP_URL') }}/dashboard/registrations');"><button class="btn-warning big-btn" title="Unpublish">Unpublish -->
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
                    <select name="classification">
                      <option value="">Select Classification</option>
                      @foreach($categorylist as $singlecity)
                        @if($singlecity->classification)
                          <option value="{{$singlecity->classification}}" @if($cat_id==$singlecity->classification) selected @endif>{{$singlecity->classification}}</option>
                        @endif 
                      @endforeach
                    </select>
                  </div>
                  <div class="col-sm-6">
                    <select name="program">
                      <option value="">Select Organization</option>
                      @foreach($program_locationlist as $singlecity)
                       @if($singlecity->organization_name)
                         <option value="{{$singlecity->organization_name}}" @if($program==$singlecity->organization_name) selected @endif>{{$singlecity->organization_name}}</option>
                       @endif 
                      @endforeach
                    </select>
                    </div>
                </div>
                <div class="row">
                  <div class="col-sm-4">
                    <select name="city">
                      <option value="">Select City</option>
                      @foreach($citylist as $singlecity)
                       @if($singlecity->city)
                          <option value="{{$singlecity->city}}" @if($city==$singlecity->city) selected @endif>{{$singlecity->city}}</option>
                       @endif 
                      @endforeach
                    </select></div>
                  <div class="col-sm-4">
                    <select name="state">
                      <option value="">Select State</option>
                      @foreach($statelist as $singlestate)
                       @if($singlestate->state)
                          <option value="{{$singlestate->state}}" @if($state==$singlestate->state) selected @endif>{{$singlestate->state}}</option>
                       @endif 
                      @endforeach
                    </select>
                    </div>
                  
                  <div class="col-sm-4">
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
                      <th width="7%">Registration NO</th>
                      <th width="16%">Name</th>
                      <th width="10%">Email</th>
                      <th width="6%">Mobile</th>
                      <th width="30%">Qualification</th>
                      <th width="14%">Organization Name</th>
                      <th width="6%"><input name="allchk" value="yes" type="checkbox" onClick="Check(document.form.chkid)" /> All</th>
                      <th class="fixed-sec" width="12%">&nbsp;</th>
                    </tr>
                  </thead>
                  <tbody>

                    @foreach($articles as $article)
                    <tr class="odd gradeX">
                      <td>{{ $article->RegistrationNO }}</td>
                      <td>{{ $article->nominated_person }}</td>
                      <td>{{ $article->person_email }}</td>
                      <td>{{ $article->person_mobileno }}</td>
                      <td>{{ $article->qualification }}</td>
                      <td>{{ $article->organization_name }}</td>

                      <td class="center flex">


                        <input name="chkid[{{  $article->id }}]" id="chkid" type="checkbox" value="{{  $article->id }}" class="checkbtn" />

                        @if($article->MembershipStatus == 'Active')
                        <img src="{{asset('backend/assets/images/tick-circle.gif')}}" width="16" height="16" border="0" title="Make Active" />
                        @else
                        <img src="{{asset('backend/assets/images/unpublish.gif')}}" width="16" height="16" border="0" title="Make Inactive" />
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