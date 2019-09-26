@extends('dashboard/layouts.master')
@section('content')


<!-- DataTables -->
<link rel="stylesheet" href="{{ env('APP_URL') }}/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">



@include('dashboard/layouts.action')

<section class="content-header">
  <h1>
  CAHOCON 2019 
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">  CAHOCON 2019  </a></li>
  </ol>
</section>



<section class="content">

  <div class="box box-default">
    <div class="box-header with-border flex">
      <h3 class="box-title">Registrations Listing</h3>

      <div class="box-tools pull-right">
        <!-- <a href="{{ env('APP_URL') }}/dashboard/registrations/add/new"><button class="btn-success big-btn" title="Add registrations">+ Create New
           
          </button></a> -->
        <a href="javascript:act_rec('{{ env('APP_URL') }}/dashboard/registrations');"><button class="btn-info big-btn excell-icon" title="Publish">Download
          
          </button></a>

          <!-- <a href="javascript:act_rec('{{ env('APP_URL') }}/dashboard/registrations');"><button class="btn-info big-btn" title="Publish">Publish
           
          </button></a>
        <a href="javascript:inact_rec('{{ env('APP_URL') }}/dashboard/registrations');"><button class="btn-warning big-btn" title="Unpublish">Unpublish
           
          </button></a> -->
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
                    <select name="cat_id">
                      <option value="">Fee Category</option>
                      @foreach($categorylist as $singlecat)
                      <option value="{{$singlecat->fee_category}}" @if($cat_id==$singlecat->fee_category) selected @endif>{{$singlecat->fee_category}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="col-sm-6">
                    <select name="designation">
                      <option value="">Select Designation</option>
                      @foreach($programlist as $singlecity)
                      <option value="{{$singlecity->designation}}" @if($designation==$singlecity->designation) selected @endif>{{$singlecity->designation}}</option>
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
                    </select>
                    </div>
                  <div class="col-sm-3">
                    <select name="state">
                      <option value="">Select State</option>
                      @foreach($statelist as $singlestate)
                      <option value="{{$singlestate->state}}" @if($state==$singlestate->state) selected @endif>{{$singlestate->state}}</option>
                      @endforeach
                    </select></div>
                  <div class="col-sm-3">
                    <select name="order_status">
                      <option value="">Select Order Status</option>
                      @foreach($program_locationlist as $singlelocation)
                      @if($singlelocation->order_status)
                      <option value="{{$singlelocation->order_status}}" @if($order_status==$singlelocation->order_status) selected @endif>{{$singlelocation->order_status}}</option>
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
                      <th width="7%">Registration ID</th>
                      <th width="16%">Name</th>
                      <th width="10%">Profession</th>
                      <th width="6%">Fee Category</th>
                      <th width="30%">Fee Amount</th>
                      <th width="14%">Location</th>
                      <th width="6%"><input name="allchk" value="yes" type="checkbox" onClick="Check(document.form.chkid)" /> All</th>
                      <th class="fixed-sec" width="12%">&nbsp;</th>
                    </tr>
                  </thead>
                  <tbody>

                    @foreach($articles as $article)
                    <tr class="odd gradeX">
                      <td>{{ $article->regorderno }}</td>
                      <td>{{ $article->title }} {{ $article->first_name }} {{ $article->last_name }}</td>

                      <td>{{ $article->designation}}</td>
                      <td>{{ $article->fee_category }}</td>
                      <td>Rs. {{ $article->amount}}</td>
                      <td>{{ $article->city}},{{ $article->state}}</td>

                      <td class="center flex">


                        <input name="chkid[{{  $article->id }}]" id="chkid" type="checkbox" value="{{  $article->id }}" class="checkbtn" />

                        <!-- @if($article->status == 1)
                        <a id="{{  $article->id }} active" class="pub_unpub" href="{{ env('APP_URL') }}/dashboard/registrations/{{$article->id}}/deactivate" onclick="return confirm('Are you sure you want to Inactivate record!');"><img src="{{asset('backend/assets/images/tick-circle.gif')}}" width="16" height="16" border="0" title="Make Active" /></a>
                        @else
                        <a id="{{  $article->id }} inactive" class="pub_unpub" href="{{ env('APP_URL') }}/dashboard/registrations/{{$article->id}}/activate" onclick="return confirm('Are you sure you want to Activate record!');"><img src="{{asset('backend/assets/images/unpublish.gif')}}" width="16" height="16" border="0" title="Make Inactive" /></a>
                        @endif -->

                        

                        <a href="{{ env('APP_URL') }}/dashboard/member-registrations/{{ $article->id }}/destroy" onClick="return confirm('Are you sure you want to delete record!');"><i class="fa fa-trash-o fa-fw"></i></a>

                      </td>
                      <td class="fixed-sec">
                        <a href="javascript:void(0);">View</a>
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