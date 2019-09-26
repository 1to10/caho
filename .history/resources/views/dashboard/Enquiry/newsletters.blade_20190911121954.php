@extends('dashboard/layouts.master')
@section('content')


<!-- DataTables -->
<link rel="stylesheet" href="{{ env('APP_URL') }}/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">



@include('dashboard/layouts.action')

<section class="content-header">
  <h1>
  Newsletter Management
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Newsletter Management</a></li>
  </ol>
</section>



<section class="content">

  <div class="box box-default">
    <div class="box-header with-border flex">
      <h3 class="box-title">Newsletter Listing</h3>

      <div class="box-tools pull-right">


      </div>

    </div>

    <!-- /.box-header -->
    <div class="box-body">

      <div class="nav-tabs-custom">
       

        <ul class="nav nav-tabs">
          <li class="active"><a href="#RegistrationDetail" data-toggle="tab">Newsletters details</a></li>
          
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
                      
                      <th width="16%">First Name</th>
                      <th width="6%">Email</th>
                      <th width="6%">Added On</th>
                      <th class="fixed-sec" width="12%">&nbsp;</th>
                    </tr>
                  </thead>
                  <tbody>

                    @foreach($articles as $article)
                    <tr class="odd gradeX">
                      
                      <td>{{ $article->name }}</td>
                      <td>{{ $article->email }}</td>
                      <td>{{ date('d F ,Y H:i:s',strtotime($article->created_at)) }}</td>
                      
                      <td class="fixed-sec">
                        <a href="{{ env('APP_URL') }}/dashboard/newsletters/{{ $article->id }}/deletenewsletter" onClick="return confirm('Are you sure you want to delete record!');">Delete</a>
                        
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