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
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-aqua">
        <div class="inner">
          <h3>{{$programs}}</h3>

          <p>Current Programs</p>
        </div>
        <div class="icon">
          <i class="fa fa-building"></i>
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

          <p>Current Program Registrations1</p>
        </div>
        <div class="icon">
          <i class="fa fa-users"></i>
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
          <i class="fa fa-users"></i>
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
          <i class="fa fa-list"></i>
        </div>
        <a href="{{env('APP_URL')}}/dashboard/categories" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->


  </div>

</section>
<!-- /.content -->
@endsection