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
          <h3 style="font-size:23px;">{{$article->name}}</h3>
        </div>
        
        <div class="contentdesc" style="margin-top:20px;padding-bottom:20px;height:120px;">
          {!! $article->short_desc !!} 
        </div>

    <div class="btn_center">
    <a href="{{ env('APP_URL') }}/dashboard/member-registrations/{{ $article->id }}" class="regbtn">View Registration</a>
    </div>
        
        
        <a href="{{ env('APP_URL') }}/dashboard/membership/edit/{{ $article->id }}" class="small-box-footer pro-cat-footer">Edit <i class="fa fa-arrow-circle-right"></i></a>
        
      </div>
    </div>

    @endforeach

  </div>

</section>
<!-- /.content -->
@endsection