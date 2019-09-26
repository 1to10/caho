@extends('dashboard/layouts.master')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    All Programs Category
    <!-- <small>Programs Category</small> -->
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Categories Listing</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

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
    <div class="col-lg-4 col-xs-6 programCat"> 
      <!-- small box -->
      <div class="small-box bg-{{$color[$index]}}">
        <img src="{{$article->img}}" style="text-align:center;">
        <div class="inner">
          <h3 style="font-size:23px;">{{$article->name}}</h3>
         
        </div>
        <div class="contentdesc">
          {!! $article->description !!}
        </div>
        
        <a href="{{ env('APP_URL') }}/dashboard/membership/edit/{{ $article->id }}" class="small-box-footer pro-cat-footer">Edit <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>

    @endforeach

  </div>

</section>
<!-- /.content -->
@endsection