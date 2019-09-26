@extends('dashboard/layouts.master')
@section('content')


    <!-- DataTables -->
    <link rel="stylesheet" href="{{ env('APP_URL') }}/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">



  @include('dashboard/layouts.action')

  <section class="content-header">
    <h1>
        Category Management
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Category Management</a></li>
    </ol>
  </section>

  <section class="content">

    <div class="box box-default">
      <div class="box-header with-border">
        <h3 class="box-title">Category Listing</h3>

        <div class="box-tools pull-right">

          <a href="{{ env('APP_URL') }}/dashboard/categories/add/new"><button class="btn-success" title="Add categories"> <i class="ace-icon fa fa-plus icon-only bigger-100"></i></button></a>

         <a href="javascript:act_rec('{{ env('APP_URL') }}/dashboard/categories');"><button class="btn-info" title="Publish"><i class="ace-icon fa fa-eye icon-only bigger-100"></i> </button></a>

          <a href="javascript:inact_rec('{{ env('APP_URL') }}/dashboard/categories');"><button class="btn-warning" title="Unpublish"><i class="ace-icon fa   fa-eye-slash  icon-only bigger-100"></i></button></a>

          <a href="javascript:del_rec('{{ env('APP_URL') }}/dashboard/categories');"><button class="btn-danger" title="Delete"><i class="ace-icon fa fa-trash-o  icon-only bigger-100"></i></button></a>

        </div>

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
                    <thead>
                    <tr>
                        <th>Title</th>
                        <th>Code</th>
                        <th>Order</th>
                        <th>Create Date</th>
                        <th><input	name="allchk" value="yes" type="checkbox" onClick="Check(document.form.chkid)"  />   All</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($articles as $article)
                        <tr class="odd gradeX">
                            <td>{{  $article->title }}</td>
                            <td>{{  $article->cat_slug }}</td>
                            <td >{{  $article->ordering }} </td>
                            <td class="center">{{  $article->created_at }}</td>
                            <td class="center">

                                <a href="">Browse Programs</a>
                                <input name="chkid[{{  $article->id }}]" id="chkid" type="checkbox" value="{{  $article->id }}" class="checkbtn"  />

                                @if($article->status == 1)
                                <a id="{{  $article->id }} active" class="pub_unpub" href="{{ env('APP_URL') }}/dashboard/categories/{{$article->id}}/deactivate" onclick="return confirm('Are you sure you want to Inactivate record!');" ><img src="{{asset('backend/assets/images/tick-circle.gif')}}" width="16" height="16" border="0" title="Make Active"/></a>
                                @else
                                <a id="{{  $article->id }} inactive" class="pub_unpub" href="{{ env('APP_URL') }}/dashboard/categories/{{$article->id}}/activate" onclick="return confirm('Are you sure you want to Activate record!');"><img src="{{asset('backend/assets/images/unpublish.gif')}}" width="16" height="16" border="0" title="Make Inactive"/></a>
                                @endif

                                 <a href="{{ env('APP_URL') }}/dashboard/categories/edit/{{ $article->id }}"><img src="{{asset('backend/assets/images/pencil.gif')}}" width="16" height="16" border="0" /></a>

                                 <a href="{{ env('APP_URL') }}/dashboard/categories/{{ $article->id }}/destroy" onClick="return confirm('Are you sure you want to delete record!');"><i class="fa fa-trash-o fa-fw"></i></a>

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