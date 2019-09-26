@extends('dashboard/layouts.master')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Dashboard - Quick Glimpse 
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Dashboard</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
 
<div class="row">
    <div class="col-lg-12 content-header">
      <h1>All Modules</h1>
      <h1> &nbsp;</h1>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-red">
        <div class="inner">
         
          <p>TP Management</p>          
        </div>
        <div class="icon">
          
        </div>
        <a href="" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
     <!-- ./col -->
     <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-yellow">
        <div class="inner">  
           
          <p>CAHOTECH 2019</p>
        </div>
        <div class="icon">
          
        </div>
        <a href="" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-red">
        <div class="inner">   
          
          <p>CAHOCON 2019</p>
        </div>
        <div class="icon">
          
        </div>
        <a href="" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->

     <!-- ./col -->
     <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-green">
        <div class="inner"> 
         
          <p>Membership</p>
        </div>
        <div class="icon">
          
        </div>
        <a href="" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
     <!-- ./col -->
     <div class="col-lg-3 col-xs-6">
     <!-- small box -->
     <div class="small-box bg-aqua">
        <div class="inner">   
         
          <p>Feedback Enquiries</p>
        </div>
        <div class="icon">
          
        </div>
        <a href="" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->

    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
     <!-- small box -->
     <div class="small-box bg-aqua">
        <div class="inner">  
               
          <p>Newsletter Subscribers</p>
        </div>
        <div class="icon">
          
        </div>
        <a href="" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->

    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
     <!-- small box -->
     <div class="small-box bg-green">
        <div class="inner">    
        
          <p>Enquiries</p>
        </div>
        <div class="icon">
          
        </div>
        <a href="" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->

    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
     <!-- small box -->
     <div class="small-box bg-yellow">
        <div class="inner">  
              
          <p>Faculty Mgmt</p>
        </div>
        <div class="icon">
          
        </div>
        <a href="" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->

    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
     <!-- small box -->
     <div class="small-box bg-red">
        <div class="inner">   
            
          <p>Administartor</p>
        </div>
        <div class="icon">
          
        </div>
        <a href="" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
  </div>

<div class="row">
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-aqua">
        <div class="inner">
          <h3>{{$programs}}</h3>

          <p>Current Programs</p>
        </div>
        <div class="icon">
         
        </div>
        <a href="#" class="small-box-footer">&nbsp;</a>
      </div>
    </div>

    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-green">
        <div class="inner">
          <h3>{{$activeuserreg}}</h3>

          <p>Current Program Registrations</p>
        </div>
        <div class="icon">
          
        </div>
        <a href="{{env('APP_URL')}}/dashboard/registrations?programstatus=current" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->


    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-yellow">
        <div class="inner">
          <h3>{{$inactiveuserreg}}</h3>

          <p>Past Program Registrations</p>
        </div>
        <div class="icon">
          
        </div>
        <a href="{{env('APP_URL')}}/dashboard/registrations?programstatus=past" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
   
   
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-red">
        <div class="inner">
          <h3>{{$categories}}</h3>

          <p>Categories</p>
        </div>
        <div class="icon">
          
        </div>
        <a href="{{env('APP_URL')}}/dashboard/categories" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->


  </div>
  <!--Conduct-->
  <div class="row">
    <div class="col-lg-12 content-header">
      <h1>All Programme Conducted</h1>
      <h1> &nbsp;</h1>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-red">
        <div class="inner">
          <h3>10</h3>
          <p>Basic CPQIH</p>
        </div>
        <div class="icon">
          
        </div>
        <a href="" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
     <!-- ./col -->
     <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-yellow">
        <div class="inner">
          <h3>70</h3>
          <p>Advance CPQIH</p>
        </div>
        <div class="icon">
          
        </div>
        <a href="" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
     <!-- ./col -->
     <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-green">
        <div class="inner">
          <h3>05</h3>
          <p>CPQIL</p>
        </div>
        <div class="icon">
          
        </div>
        <a href="" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
     <!-- ./col -->
     <div class="col-lg-3 col-xs-6">
     <!-- small box -->
     <div class="small-box bg-aqua">
        <div class="inner">
          <h3>10</h3>
          <p>TPNEL</p>
        </div>
        <div class="icon">
          
        </div>
        <a href="" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->    
    
     <!-- ./col -->
     <div class="col-lg-3 col-xs-6">
     <!-- small box -->
     <div class="small-box bg-aqua">
        <div class="inner">
          <h3>10</h3>
          <p>Basic CPHIC</p>
        </div>
        <div class="icon">
          
        </div>
        <a href="" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
     <!-- small box -->
     <div class="small-box bg-green">
        <div class="inner">
          <h3>10</h3>
          <p>Enhanced Clinical Communication Workshop</p>
        </div>
        <div class="icon">
          
        </div>
        <a href="" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->

    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
     <!-- small box -->
     <div class="small-box bg-yellow">
        <div class="inner">
          <h3>10</h3>
          <p>Basic NDLS</p>
        </div>
        <div class="icon">
          
        </div>
        <a href="" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->

    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
     <!-- small box -->
     <div class="small-box bg-red">
        <div class="inner">
          <h3>10</h3>
          <p>Nursing Communication Workshop</p>
        </div>
        <div class="icon">
          
        </div>
        <a href="" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->

    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
     <!-- small box -->
     <div class="small-box bg-red">
        <div class="inner">
          <h3>10</h3>
          <p>FSEPTCP</p>
        </div>
        <div class="icon">
          
        </div>
        <a href="" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->

    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
     <!-- small box -->
     <div class="small-box bg-yellow">
        <div class="inner">
          <h3>10</h3>
          <p>Basic Course on Cyber Security in Hospitals</p>
        </div>
        <div class="icon">
          
        </div>
        <a href="" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->

    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
     <!-- small box -->
     <div class="small-box bg-green">
        <div class="inner">
          <h3>10</h3>
          <p>Basic CSSD Training Program (online)</p>
        </div>
        <div class="icon">
          
        </div>
        <a href="" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->

    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
     <!-- small box -->
     <div class="small-box bg-aqua">
        <div class="inner">
          <h3>10</h3>
          <p>Healthcare Risk Management Course</p>
        </div>
        <div class="icon">
          
        </div>
        <a href="" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->

    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
     <!-- small box -->
     <div class="small-box bg-aqua">
        <div class="inner">
          <h3>10</h3>
          <p>CPQA</p>
        </div>
        <div class="icon">
          
        </div>
        <a href="" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->

    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
     <!-- small box -->
     <div class="small-box bg-green">
        <div class="inner">
          <h3>10</h3>
          <p>CPHQ</p>
        </div>
        <div class="icon">
          
        </div>
        <a href="" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->

    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
     <!-- small box -->
     <div class="small-box bg-yellow">
        <div class="inner">
          <h3>10</h3>
          <p>GCP</p>
        </div>
        <div class="icon">
          
        </div>
        <a href="" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
  </div>
  <!--Conduct-->
  <div class="row">
    <div class="col-lg-12 content-header">
      <h1>All Programme Conduct by City/State</h1>
      <h1> &nbsp;</h1>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-blue">
        <div class="inner">
          <h3>10</h3>
          <p>Delhi</p>
        </div>
        <div class="icon">
          
        </div>
        <a href="" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
     <!-- ./col -->
     <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-green">
        <div class="inner">
          <h3>70</h3>
          <p>Mumbai</p>
        </div>
        <div class="icon">
          
        </div>
        <a href="" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
     <!-- ./col -->
     <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-yellow">
        <div class="inner">
          <h3>05</h3>
          <p>Banglore</p>
        </div>
        <div class="icon">
          
        </div>
        <a href="" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
     <!-- ./col -->
     <div class="col-lg-3 col-xs-6">
     <!-- small box -->
     <div class="small-box bg-red">
        <div class="inner">
          <h3>10</h3>
          <p>Cochin</p>
        </div>
        <div class="icon">
          
        </div>
        <a href="" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->

    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
     <!-- small box -->
     <div class="small-box bg-red">
        <div class="inner">
          <h3>10</h3>
          <p>Pondicherry</p>
        </div>
        <div class="icon">
          
        </div>
        <a href="" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->

    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
     <!-- small box -->
     <div class="small-box bg-yellow">
        <div class="inner">
          <h3>10</h3>
          <p>Hyderabad</p>
        </div>
        <div class="icon">
          
        </div>
        <a href="" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->

    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
     <!-- small box -->
     <div class="small-box bg-green">
        <div class="inner">
          <h3>10</h3>
          <p>Hisar</p>
        </div>
        <div class="icon">
          
        </div>
        <a href="" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->

    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
     <!-- small box -->
     <div class="small-box bg-aqua">
        <div class="inner">
          <h3>10</h3>
          <p>Kerala</p>
        </div>
        <div class="icon">
          
        </div>
        <a href="" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
  </div>
  <!--Conduct-->
  <div class="row">
    <div class="col-lg-12 content-header">
      <h1>Users Stats</h1>
      <h1> &nbsp;</h1>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-red">
        <div class="inner">
          <h3>10</h3>
          <p>Doctors</p>
        </div>
        <div class="icon">
          
        </div>
        <a href="" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
     <!-- ./col -->
     <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-yellow">
        <div class="inner">
          <h3>70</h3>
          <p>Nurses</p>
        </div>
        <div class="icon">
          
        </div>
        <a href="" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
     <!-- ./col -->
     <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-green">
        <div class="inner">
          <h3>05</h3>
          <p>Admin</p>
        </div>
        <div class="icon">
          
        </div>
        <a href="" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
     <!-- ./col -->
     <div class="col-lg-3 col-xs-6">
     <!-- small box -->
     <div class="small-box bg-aqua">
        <div class="inner">
          <h3>10</h3>
          <p>Others</p>
        </div>
        <div class="icon">
          
        </div>
        <a href="" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
  </div>
  <!--Conduct-->
  

</section>

<!-- /.content -->
@endsection