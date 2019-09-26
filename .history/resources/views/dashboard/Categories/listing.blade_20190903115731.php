@extends('dashboard/layouts.master')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    All 
    <small>Programs Category</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Categories Listing</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
 
<div class="row">
@php 
$color = array('green','red');
@endphp
@foreach($articles as $article)

@php 
$index = ($article->id%2);
@endphp 
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
        <div class="small-box bg-{{$color[$index]}}">
          <div class="inner" style="height:200px;">
            <h3 style="font-size:20px;">{{$article->cat_slug}}</h3>

            <p>{{$article->title}}</p>
          </div>
          <ul class="locationlist">
            @php
            $locationlist = getLocation($article->cat_slug); 
            @endphp
            @foreach($locationlist as $singlecat)
            @php 
            $usercnt = Usercount($article->cat_slug,$singlecat->location);
            @endphp 
              <li><a href="{{ env('APP_URL') }}/dashboard/registrations?cat_id={{ $article->cat_slug }}&location={{$singlecat->location}}">{{$singlecat->location}} ({{$usercnt}})</a></li>
            @endforeach
          </ul>
          <a href="{{ env('APP_URL') }}/dashboard/registrations?cat_id={{ $article->cat_slug }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    
@endforeach
   
  </div>

</section>
<!-- /.content -->
@endsection