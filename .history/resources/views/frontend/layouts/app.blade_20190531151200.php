<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="@yield('description')">
    <meta name="keywords" content="@yield('keywords')">
    <meta name="_token" content="{{csrf_token()}}" />
    @if(isset($pageinfo))
        <meta property="og:url"    content="{{url()->current()}}" />
        <meta property="og:type"   content="article" />
        <meta property="og:title"  content="{{$pageinfo->title}}" />
        @if($pageinfo->article_description)
        <meta property="og:description" content="{{substr(strip_tags($pageinfo->article_description),0,100)}}" />
        @endif
        @if($pageinfo->img)
        <meta property="og:image"  content="{{env('APP_URL')}}{{$pageinfo->img}}" />
        @else
        <meta property="og:image"  content="{{env('APP_URL')}}{{'/photos/1/550x234.jpg'}}" />
        @endif

    @endif

    <link rel="shortcut icon" href="{{ asset('frontend/img/favicon.ico')}}" type="image/x-icon" />
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,500,600,700|Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" type="text/css" media="screen" href="{{ asset('frontend/css/responsiveslides.css') }}" /> 
    <link rel="stylesheet" type="text/css" media="screen" href="{{ asset('frontend/owl-carousel/owl.carousel.css')}}" /> 
    <link rel="stylesheet" type="text/css" media="screen" href="{{ asset('frontend/owl-carousel/owl.theme.css') }}" /> 
    <link rel="stylesheet" type="text/css" media="screen" href="{{ asset('frontend/css/slicknav.css') }}" /> 
    <link rel="stylesheet" type="text/css" media="screen" href="{{ asset('frontend/css/main.css') }}" /> 
    <script src="{{ asset('frontend/js/jquery-1.9.1.min.js') }}"></script> 
    <script src="{{ asset('frontend/js/responsiveslides.min.js') }}"></script>
    <script src="{{ asset('frontend/owl-carousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.slicknav.js')}}"></script>
    <script src="{{ asset('frontend/js/custom.js')}}"></script>
    <script src="{{ asset('frontend/js/customfunctions.js')}}"></script>
   
</head>
<body>
<?php $baseurl = url('');?>
<script type="text/javascript">
	var siteurl = <?php echo json_encode($baseurl);?>
</script>
    
    <header class="header">
    <div class="main-container">
        <div class="logo">
            <a href="{{ env('APP_URL')}}"><img src="{{ asset('frontend/img/top-logo.jpg')}}" alt="Veritas"></a>
        </div>
        <nav class="top-navbar">
            
        <ul>
                        @foreach($topmenu as $singlemenu)

                            @php 
                            $activecls='';
                            if(isset($pageinfo))
                            {

                                if($pageinfo->alias==$singlemenu->alias)
                                {
                                    $activecls='active';
                                }
                                
                            }
                            else
                            {
                                if($slug==$singlemenu->alias && $slug!='#')
                                {
                                    $activecls='active';
                                }
                            }
                            
                            @endphp
                            
                            <li @if($singlemenu->childs->count() >0) class="menuitem parentlevel drop-down {{$activecls}}" @else class="@if($singlemenu->id==9) {{ 'enq'}} @endif menuitem parentlevel {{$activecls}}" @endif id="menu{{$singlemenu->id}}">
                                @if($singlemenu->url)
                                <a href="{{ $singlemenu->url }}" target="_blank">{{$singlemenu->title}}</a>
                                @else
                                <a href="@if($singlemenu->alias && $singlemenu->alias!='#'){{env('APP_URL')}}/{{$singlemenu->alias}}@else{{ '#' }}@endif">{{$singlemenu->title}}</a>
                                @endif
                                @if($singlemenu->childs->count() >0)

                                    <ul>
                                            @foreach($singlemenu->childs as $singlemenu2)

                                                @php 
                                                    $activecls='';
                                                    if(isset($pageinfo))
                                                    {

                                                        $menuarray = explode('/', $singlemenu2->alias);
                                                        $menuslug = @end($menuarray);
                                                        if(count($menuarray) > 1)
                                                        {
                                                            if($pageinfo->alias==$menuslug && $singlemenu->alias==$menuarray[0])
                                                            {
                                                                $activecls='active';
                                                            }
                                                            elseif($pageinfo->alias==$menuslug)
                                                            {
                                                                $activecls='active';
                                                            }
                                                        }
                                                        else
                                                        {
                                                            if($pageinfo->alias==$menuslug)
                                                            {
                                                                $activecls='active';
                                                            }
                                                        }
                                                        
                                                        
                                                    }
                                                    else
                                                    {
                                                        if($slug==$singlemenu2->alias)
                                                        {
                                                            $activecls='active';
                                                        }
                                                    }
                                                    @endphp
                                                    
                                                <li @if($singlemenu2->childs->count() >0) class="menuitem drop-down level2 {{ $activecls }}" @else class="menuitem level2 {{ $activecls }}" @endif id="menu{{$singlemenu2->id}}">
                                                    @if($singlemenu2->url)
                                                    <a href="{{ $singlemenu2->url }}" target="_blank" @if($singlemenu2->childs->count() >0) class="menu-bold" @endif>{{$singlemenu2->title}}</a>
                                                    @else
                                                    <a href="@if($singlemenu2->alias && $singlemenu2->alias!='#'){{env('APP_URL')}}/{{$singlemenu2->alias}}@else{{ '#' }}@endif" @if($singlemenu2->childs->count() >0) class="menu-bold" @endif>{{$singlemenu2->title}}</a>
                                                    @endif

                                                    
                                                        @if($singlemenu2->childs->count() >0)

                                                           
                                                                <ul>
                                                                    @foreach($singlemenu2->childs as $singlemenu3)

                                                                        @php 
                                                                            $activecls='';
                                                                            if(isset($pageinfo))
                                                                            {
                                                                                $menuarray = explode('/', $singlemenu3->alias);
                                                                                $menuslug = @end($menuarray);
                                                                                if(count($menuarray) > 1)
                                                                                {
                                                                                    if($pageinfo->alias==$menuslug && $singlemenu2->alias==$menuarray[0])
                                                                                    {
                                                                                        $activecls='active';
                                                                                    }
                                                                                    elseif($pageinfo->alias==$menuslug)
                                                                                    {
                                                                                        $activecls='active';
                                                                                    }
                                                                                }
                                                                                else
                                                                                {
                                                                                    if($pageinfo->alias==$menuslug)
                                                                                    {
                                                                                        $activecls='active';
                                                                                    }
                                                                                }
                                                                                
                                                                                
                                                                            }
                                                                            else
                                                                            {
                                                                                if($slug==$singlemenu3->alias)
                                                                                {
                                                                                    $activecls='active';
                                                                                }
                                                                            }
                                                                            @endphp
                                                                        <li class="menuitem level3 {{$activecls}}" id="menu{{$singlemenu3->id}}" >
                                                                        @if($singlemenu3->url)
                                                                        <a href="{{ $singlemenu3->url }}" target="_blank">{{$singlemenu3->title}}</a>
                                                                        @else
                                                                        <a href="@if($singlemenu3->alias && $singlemenu3->alias!='#'){{env('APP_URL')}}/{{$singlemenu3->alias}}@else{{ '#' }}@endif">{{$singlemenu3->title}}</a>
                                                                        @endif
                                                                        </li>
                                                                    @endforeach

                                                                </ul>
                                                                
                                                        @endif
                                                </li>
                                            @endforeach

                                        </ul>

                                @endif
                            </li>
                        @endforeach
                        
                    </ul>

        </nav>
    </div>
</header>
<aside class="sidebar-social-media">
    <ul>            
        <!-- <li><a href="#"><img src="{{ asset('frontend/img/facebook-icon.png')}}" alt=""></a></li> -->
        <!-- <li><a href=""><img src="{{ asset('frontend/img/twiter-icon.png')}}" alt=""></a></li> -->
        <li><a href="https://www.linkedin.com/company/veritas-actuaries-and-consultants"><img src="{{ asset('frontend/img/linkding.png')}}" alt=""></a></li>            
    </ul>
</aside>
     
@yield('content')

<footer class="footer">
    <div class="main-container">
        <div class="col-4">
            <img src="{{ asset('frontend/img/logo.png')}}" alt="">
            <div class="social-media">
                <!-- <a href="#" target="_blank"><img src="{{ asset('frontend/img/icon-fb.png')}}" alt=""></a> -->
                <!-- <a href="" target="_blank"><img src="{{ asset('frontend/img/icon-tw.png')}}" alt=""></a> -->
                <a href="https://www.linkedin.com/company/veritas-actuaries-and-consultants" target="_blank"><img src="{{ asset('frontend/img/icon-linkdin.png')}}" alt=""></a>
            </div>
        </div>
        <div class="col-4">
            <h6>Quick Links</h6>
            @if($footer1_menu->count() >0)
               <ul>
                    @foreach($footer1_menu as $singlemenu)
                        <li>
                            
                            @if($singlemenu->url)
                            <a href="{{ $singlemenu->url }}" target="_blank">{{$singlemenu->title}}</a>
                            @else
                            <a href="@if($singlemenu->alias){{env('APP_URL')}}/{{$singlemenu->alias}}@else{{ env('APP_URL') }}@endif">{{$singlemenu->title}}</a>
                            @endif
                        </li>
                    @endforeach
               </ul>
            @endif
            
        </div>
        <div class="col-4">
            <h6>Our Services</h6>
            @if($footer2_menu->count() >0)
               <ul>
               @foreach($footer2_menu as $singlemenu)
                        <li>
                            
                            @if($singlemenu->url)
                            <a href="{{ $singlemenu->url }}" target="_blank">{{$singlemenu->title}}</a>
                            @else
                            <a href="@if($singlemenu->alias){{env('APP_URL')}}/{{$singlemenu->alias}}@else{{ env('APP_URL') }}@endif">{{$singlemenu->title}}</a>
                            @endif
                        </li>
                    @endforeach                  
                </ul>
            @endif
        </div>
        <div class="col-4">
            <h6>Contact Info</h6>
            <p>
                <b>Veritas Actuaries and Consultants</b>
                DLH Park, Ramlal Compound,<br>
                S V Road Level 17th Road,<br> 
                Near Goregaon Flyover,<br> 
                Goregaon West, Mumbai - 400064                    
            </p>
        </div>
    </div>
    <div class="company-name">Veritas Actuaries and Consultants</div>
    <div class="bottom-footer">
        <div class="main-container">
            <div class="left">
                <p>© Copyright Veritas {{date('Y')}}. All Rights Reserved.</p>
            </div>
            <div class="right">
                <p>Web Design & Development: <a href="https://interactivebees.com/" target="_blank">Interactive Bees</a></p>
            </div>
        </div>
    </div>
</footer>
<script>
$("#menu1 a").attr('href',siteurl);
</script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-139126016-1"></script>
<script>
window.dataLayer = window.dataLayer || [];
function gtag(){dataLayer.push(arguments);}
gtag('js', new Date());

gtag('config', 'UA-139126016-1');
</script>
</body>
</html>