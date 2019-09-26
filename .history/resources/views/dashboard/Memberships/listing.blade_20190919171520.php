@extends('dashboard/layouts.master')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    All Membership Plans
    <!-- <small>Programs Category</small> -->
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Membership Plans Listing</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

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

  <div class="row flex">
    @php
    $color = array('teal','green','light-green','yellow','yellow-green');
    $i=0;
    @endphp
    @foreach($articles as $article)

    @php
    if($i > 4)
    {
      $i=0;
    }
    $index = $i;
    $i++;
    @endphp
    <div class="col-lg-4 col-xs-6 programCat" style="height:450px;"> 
      <!-- small box -->
      <div class="small-box bg-{{$color[$index]}}">
        <img src="{{$article->img}}" style="margin:0 auto;">
        <div class="inner">
          <h3>{!! $article->name !!}</h3>
        </div>
        <div class="user-count"><span>{{$array_number[$index+1]}}</span> Users Registered</div>
        <!--<div class="contentdesc" style="margin-top:20px;padding-bottom:20px;height:120px;">
          {!! $article->short_desc !!} 
        </div>-->

    <div class="btn_center">
    <a href="{{ env('APP_URL') }}/dashboard/member-registrations/{{ $article->id }}" class="regbtn" target="_blank">More Details</a>
    </div>
        
        
        <!-- <a href="{{ env('APP_URL') }}/dashboard/membership/edit/{{ $article->id }}" class="small-box-footer pro-cat-footer">Edit <i class="fa fa-arrow-circle-right"></i></a> -->
        
      </div>
    </div>

    @endforeach

  </div>
  <div class="row">
    <div class="col-lg-12 content-header">
      <h1>Total Members</h1>
      <h1> &nbsp;</h1>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-green">
        <div class="inner">
          <h3>10</h3>
          <p>Active Members</p>
        </div>
        <div class="icon">
          
        </div>
        <a href="" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-red">
        <div class="inner">
          <h3>10</h3>
          <p>Expired Members</p>
        </div>
        <div class="icon">
          
        </div>
        <a href="" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
  </div>

</section>
<!-- /.content -->
@endsection