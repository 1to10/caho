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
      <div class="box-header with-border">
        <h3 class="box-title">Registrations Listing</h3>

        <div class="box-tools pull-right">

          <a href="{{ env('APP_URL') }}/dashboard/registrations/add/new"><button class="btn-success" title="Add registrations"> <i class="ace-icon fa fa-plus icon-only bigger-100"></i></button></a>

         <a href="javascript:act_rec('{{ env('APP_URL') }}/dashboard/registrations');"><button class="btn-info" title="Publish"><i class="ace-icon fa fa-eye icon-only bigger-100"></i> </button></a>

          <a href="javascript:inact_rec('{{ env('APP_URL') }}/dashboard/registrations');"><button class="btn-warning" title="Unpublish"><i class="ace-icon fa   fa-eye-slash  icon-only bigger-100"></i></button></a>

          <a href="javascript:del_rec('{{ env('APP_URL') }}/dashboard/registrations');"><button class="btn-danger" title="Delete"><i class="ace-icon fa fa-trash-o  icon-only bigger-100"></i></button></a>

        </div>

      </div>

      <!-- /.box-header -->
      <div class="box-body">

      <div class="nav-tabs-custom">
          <style>
          .filter_boxes select{
            width: 100%;
              height: 33px;
              border: 1px solid #e0e0e0;
              padding: 5px;

          }
          .filter_boxes .cat,.filter_boxes .prog {
            margin-bottom:15px;
          }
          .filter_boxes {
              border: 1px solid #efefef;
              box-sizing: border-box;
              height: 110px;
              background: #f5f5f5;
              box-shadow: 0 0 10px #ccc;
              padding: 13px;
          }
          .filter_boxes input[type="submit"]{
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
              <li><a href="#Faculty" data-toggle="tab">Faculty</a></li>
              <li><a href="#ExpencesandSpent" data-toggle="tab">Expences and Spent</a></li>
              <li><a href="#Spents" data-toggle="tab">Spents</a></li>
              <li><a href="#OtherDetails" data-toggle="tab">Other Details</a></li>
        </ul>

        <div class="tab-content">

             <div class="tab-pane active" id="RegistrationDetail">
                1
            </div>
            <div class="tab-pane" id="Faculty">
                2
            </div>
            <div class="tab-pane" id="ExpencesandSpent">
                3
            </div>
            <div class="tab-pane" id="Spents">
                4
            </div>
            <div class="tab-pane" id="OtherDetails">
                5
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


setTimeout(function(){ 

$("#loader").hide();
$("#mainbody").show();

 }, 1000);

</script>
@endsection