@extends('dashboard/layouts.master')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Dashboard 
    <small>Control panel</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Dashboard</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
 
<div class="row">

@foreach($articles as $article)

    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
        <div class="small-box bg-green">
          <div class="inner" style="height:200px;">
            <h3>{{$article->cat_slug}}</h3>

            <p>{{$article->title}}</p>
          </div>
          <div class="icon">
            <i class="fa fa-building"></i>
          </div>
          <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    
@endforeach
   
  </div>

</section>
<!-- /.content -->
@endsection