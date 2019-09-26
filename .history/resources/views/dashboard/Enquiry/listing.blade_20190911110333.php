@extends('dashboard/layouts.master')
@section('content')


<!-- DataTables -->
<link rel="stylesheet" href="{{ env('APP_URL') }}/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">



@include('dashboard/layouts.action')

<section class="content-header">
  <h1>
  Enquiry Management
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Enquiry Management</a></li>
  </ol>
</section>



<section class="content">

  <div class="box box-default">
    <div class="box-header with-border flex">
      <h3 class="box-title">Enquiry Listing</h3>

      <div class="box-tools pull-right">


      </div>

    </div>

    <!-- /.box-header -->
    <div class="box-body">

      <div class="nav-tabs-custom">
       

        <ul class="nav nav-tabs">
          <li class="active"><a href="#RegistrationDetail" data-toggle="tab">Enquiries details</a></li>
          
        </ul>

        <div class="tab-content">

          <div class="tab-pane active" id="RegistrationDetail">

            <div class="filter_boxes" style="display:none;">

             

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
                      <th width="16%">first_name</th>
                      <th width="10%">last_name</th>
                      <th width="6%">email</th>
                      <th width="30%">mobile</th>
                      <th width="14%">message</th>
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