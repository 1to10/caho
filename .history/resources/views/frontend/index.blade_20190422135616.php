@extends('frontend/layouts.app')

@section('title', $pageinfo->metatitle)
@section('description', $pageinfo->metadescription)
@section('keywords', $pageinfo->metakeyword)

@section('content')

@include('frontend/elements.home-banner')

 <!--About Sec-->
   @if($aboutinfo->count() > 0)
    <section class="comon-sec main-container">
        <div class="about-sec">

           @if($aboutinfo->img)
            <div class="image">
                <img src="{{ env('APP_URL')}}{{ $aboutinfo->img}}" alt="">   
            </div>
          @endif
            <div class="content">
                <div class="heading">{!! $aboutinfo->title !!}</div>
                {!! $aboutinfo->introtext !!}
                <a class="default-btn orrange" href="{{env('APP_URL')}}/{{$aboutinfo->alias}}">Read More</a>
            </div>
        </div>
    </section>
   @endif
    <!--Service Sec-->
    <section class="service-sec">
        <div class="image">
           <!-- for background image-->
        </div>
        <div class="content">
            <div class="text">
                <div class="heading">Our Services</div>
                <p>
                    At Veritas, we believe in continuous research and knowledge development that enables us to offer customised solutions that meet our client needs.
                </p>
            </div>
        </div>
        <div class="main-container">
            <div class="service-tab">
              
              @if($services_list->count() >0)

                @foreach($services_list as $singleinfo)

                <div class="service">
                    <div class="heading short">{!! $singleinfo->title !!}</div>
                    <p>{!! substr($singleinfo->introtext,0,120) !!}..</p>
                    <a class="default-btn" href="{{env('APP_URL')}}/{{$singleinfo->alias}}">Read More</a>
                </div>
            
               @endforeach
                
            @endif
            </div>
        </div>
    </section>
    <!--Blog & Articles Sec-->
    <section class="comon-sec main-container">
        <div class="blog-articles-sec">
            <div class="heading">Insights</div>
            @if($knowledge_list->count() > 0)
                <ul id="owl-example1" class="owl-carousel">

                  @foreach($knowledge_list as $singleinfo)
                    <li>
                       
                        <div class="date-time">{!! date('M',strtotime($singleinfo->publishdate)) !!}<span>{!! date('Y',strtotime($singleinfo->publishdate)) !!}</span></div>
                        @if($singleinfo->img)
                            <img src="{{ env('APP_URL') }}{{ $singleinfo->img}}" alt="">
                        @else
                                <img src="{{ env('APP_URL') }}/photos/1/550x234.jpg">
                        @endif
                        <div class="detail">
                            <div class="title">
                            {!! $singleinfo->title !!}
                            </div>
                            {!! SEARCH_REPLACE($singleinfo->introtext) !!}
                            <a class="default-btn" href="{{env('APP_URL')}}/insight/{{$singleinfo->alias}}">Read More</a>
                        </div>
                    </li>
                @endforeach
                    
                </ul>
            @endif
        </div>
    </section>  


    <script type="text/javascript">
      $(".menuitem").removeClass('active');
	  $("#menu1").addClass('active');
    </script>
    
@endsection

