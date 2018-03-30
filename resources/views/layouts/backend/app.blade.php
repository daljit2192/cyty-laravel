<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title></title>

        <!-- Meta -->
        <meta name="description" content="@yield('meta_description', 'Laravel 5 Boilerplate')">
        <meta name="author" content="@yield('meta_author', 'Anthony Rappa')">
        @yield('meta')

        <!-- Styles -->
        @yield('before-styles')

        <link href="{{ asset('css/backend/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/backend/metro.css') }}" rel="stylesheet">
        <link href="{{ asset('css/backend/bootstrap-fileupload.css') }}" rel="stylesheet">
        <link href="{{ asset('Font-Awesome/css/font-awesome.css') }}" rel="stylesheet">
        <link href="{{ asset('css/backend/style.css') }}" rel="stylesheet">
        <link href="{{ asset('css/backend/style_responsive.css') }}" rel="stylesheet">
        <link href="{{ asset('css/backend/style_default.css') }}" rel="stylesheet">
        
        @yield('after-styles')

        <!-- Scripts -->
        <script>
            window.Laravel = <?php
echo json_encode([
    'csrfToken' => csrf_token(),
]);
?>
        </script>

        <!--<link href="https://fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">-->
    </head>
    @if (Auth::check() && Auth::user()->role_id == 3)
    <body>
        <div class="header navbar navbar-inverse navbar-fixed-top">
            @include('includes.backend.nav')
        </div>
        <div class="page-container row-fluid">
            @include('includes.backend.sidebar')
            <div class="page-content" style="margin-top:25px;">
                <!-- BEGIN PAGE CONTAINER-->
                <div class="container-fluid">
                    @yield('content')
                </div>
                <!-- END PAGE CONTAINER-->		
            </div>
            <!-- END PAGE CONTAINER-->		
        </div>
        <div class="footer">
            2013 © Metronic by keenthemes.
            <div class="span pull-right">
                <span class="go-top"><i class="icon-angle-up"></i></span>
            </div>
        </div>
        @else
    <body class ="login">
        <div class="logo">
            <img src="assets/img/logo-big.png" alt=""> 
        </div>
        @yield('content')
    </body>
    @endif    

    @yield('before-scripts')
    @yield('after-scripts')
    <script src="{{ asset('js/backend/jquery.min.js') }}"></script>
    <script src="{{ asset('js/backend/breakpoints/breakpoints.js') }}"></script>
    <script src="{{ asset('js/backend/jquery-ui/jquery-ui-1.10.1.custom.min.js') }}"></script>
    <script src="{{ asset('js/backend/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ asset('js/backend/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/backend/bootstrap-fileupload.js') }}"></script>
    <script src="{{ asset('js/backend/flot/jquery.flot.js') }}"></script>
    <script src="{{ asset('js/backend/app.js') }}"></script>
    <script src="{{ asset('js/backend/script.js') }}"></script>
    <script>
        jQuery(document).ready(function () {
            App.setPage("index");  // set current page
            App.init(); // init the rest of plugins and elements
        });
    </script>
</body>
</html>