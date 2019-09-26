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
    
   
</head>
<body>
Welcome    
</body>
</html>