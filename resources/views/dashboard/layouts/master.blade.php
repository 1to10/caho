<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="csrf-token" content={{csrf_token()}}>
    <link rel="shortcut icon" href="{{ asset('frontend/img/favicon.ico')}}" type="image/x-icon" />
    <title>Leads | Dashboard</title>

    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{ env('APP_URL') }}/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ env('APP_URL') }}/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ env('APP_URL') }}/bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ env('APP_URL') }}/dist/css/AdminLTE.min.css">
    <!-- <link rel="stylesheet" href="{{ env('APP_URL') }}/dist/css/AdminLTE.css"> -->
    <link rel="stylesheet" href="{{ env('APP_URL') }}/css/custom.css">
    <link rel="stylesheet" href="{{ env('APP_URL') }}/frontend/css/main.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{ env('APP_URL') }}/dist/css/skins/_all-skins.min.css">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">


    <!-- jQuery 3 -->
    <script src="{{ env('APP_URL') }}/bower_components/jquery/dist/jquery.min.js"></script>

    <!-- <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script> 
    <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.min.js"></script>  -->

</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    @include('dashboard/layouts.header')

    @include('dashboard/layouts.sidebar')

    <div class="content-wrapper">
        @yield('content')
    </div>

    @include('dashboard/layouts.footer')
</div>
<!-- ./wrapper -->



<!-- Bootstrap 3.3.7 -->
<script src="{{ env('APP_URL') }}/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- FastClick -->
<script src="{{ env('APP_URL') }}/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="{{ env('APP_URL') }}/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ env('APP_URL') }}/dist/js/demo.js"></script>

@yield('javascript')

<script type="text/javascript">
      $('tbody').sortable();
    </script>

</body>
</html>
