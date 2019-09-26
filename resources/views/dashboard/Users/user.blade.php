@extends('dashboard/layouts.master')
@section('content')


    <!-- DataTables -->
    <link rel="stylesheet" href="{{ env('APP_URL') }}/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">



  @include('dashboard/layouts.action')

  <section class="content-header">
    <h1>
      User Management
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">User Management</a></li>
    </ol>
  </section>

  <section class="content">

    <div class="box box-default">
      <div class="box-header with-border">
        <h3 class="box-title">User Listing</h3>

        <!-- <div class="box-tools pull-right">

          @if (Sentinel::getUser()->hasAccess(['User.AddUser']))
            <a href="{{ env('APP_URL') }}/dashboard/user/add/new"><button class="btn-success" title="Add User"> <i class="ace-icon fa fa-plus icon-only bigger-100"></i></button></a>
          @endif

          @if (Sentinel::getUser()->hasAccess(['User.Activate']))
            <a href="javascript:act_rec('{{ env('APP_URL') }}/dashboard/user');"><button class="btn-info" title="Publish"><i class="ace-icon fa fa-eye icon-only bigger-100"></i> </button></a>
          @endif

          @if (Sentinel::getUser()->hasAccess(['User.Deactivate']))
            <a href="javascript:inact_rec('{{ env('APP_URL') }}/dashboard/user');"><button class="btn-warning" title="Unpublish"><i class="ace-icon fa 	fa-eye-slash  icon-only bigger-100"></i></button></a>
          @endif

          @if (Sentinel::getUser()->hasAccess(['User.Destroy']))
            <a href="javascript:del_rec('{{ env('APP_URL') }}/dashboard/user');"><button class="btn-danger" title="Delete"><i class="ace-icon fa fa-trash-o  icon-only bigger-100"></i></button></a>
          @endif

        </div> -->

      </div>
      <!-- /.box-header -->
      <div class="box-body">

        <div class="panel-body">

          <form action="" method="post" enctype="multipart/form-data" name="form">

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
              <thead class="thead-light">
              <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email ID</th>
                <th>Role</th>
                <th>Last Login</th>
                <th>Create Date</th>
                <th>
                  <!-- <input	name="allchk" value="yes" type="checkbox" onClick="Check(document.form.chkid)"  />  All -->
                  Action
                </th>
              </tr>
              </thead>
              <tbody>

              @foreach($users as $user)
                <tr class="odd gradeX">
                  <td>{{  $user->first_name }}</td>
                  <td>{{  $user->last_name }}</td>
                  <td>{{  $user->email }}</td>
                  <td>{{ $user->name }}</td>
                  <td class="center">{{  $user->last_login }}</td>
                  <td class="center">{{  $user->created_at }}</td>
                  <td class="center">
                    @if (Sentinel::getUser()->hasAccess(['User.EditUser']))
                      <a href="{{ env('APP_URL') }}/dashboard/user/edit/{{ $user->id }}"><i class="fa fa-edit fa-fw"></i></a>
                    @endif
                  </td>
                </tr>
              @endforeach




              </tbody>
            </table>
          </form>
          <!-- /.table-responsive -->

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
    $(function () {
        $('#example1').DataTable()
        $('#example2').DataTable({
            'paging'      : true,
            'lengthChange': false,
            'searching'   : false,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : false
        })
    })
</script>
@endsection