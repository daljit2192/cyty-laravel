<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Scripts -->


        <!-- Fonts -->
        <link rel="dns-prefetch" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/frontend/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/frontend/font-awesome.css') }}" rel="stylesheet">
        <link href="{{ asset('css/frontend/owl.carousel.css') }}" rel="stylesheet">
        <link href="{{ asset('css/frontend/flexslider.css') }}" rel="stylesheet">
        <link href="{{ asset('css/frontend/ionicons.css') }}" rel="stylesheet">
        <link href="{{ asset('css/frontend/shortcodes.css') }}" rel="stylesheet">
        <link href="{{ asset('css/frontend/themify-icons.css') }}" rel="stylesheet">
        <link href="{{ asset('css/frontend/layers.css') }}" rel="stylesheet">
        <link href="{{ asset('css/frontend/settings.css') }}" rel="stylesheet">
        <link href="{{ asset('css/frontend/fancybox.css') }}" rel="stylesheet">
        <link href="{{ asset('css/frontend/style.css') }}" rel="stylesheet">
        <link href="{{ asset('css/frontend/color1.css') }}" rel="stylesheet">
        <link href="{{ asset('css/frontend/responsive.css') }}" rel="stylesheet">
        <link href="{{ asset('css/frontend/animate.css') }}" rel="stylesheet">
        <link href="{{ asset('css/frontend/et-line.css') }}" rel="stylesheet">
    </head>
    <body>
        <div id="loading-overlay">
            <div class="loader"></div>
        </div>

        <div class="boxed">
            <div class="top style2">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="title-page">
                                Welcome to Finance Consultant Theme
                            </div>
                            <ul class="flat-social">
                                <li>
                                    <a href="#" title=""><i class="fa fa-facebook-f"></i></a>
                                </li>
                                <li>
                                    <a href="#" title=""><i class="fa fa-google-plus"></i></a>
                                </li>
                                <li>
                                    <a href="#" title=""><i class="fa fa-linkedin"></i></a>
                                </li>
                                <li>
                                    <a href="#" title=""><i class="fa fa-rss"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div><!-- /.clearfix -->
                        </div>
                    </div>
                </div>
            </div><!-- /.top -->
            <div class="header-top">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-sm-6">
                            <div id="logo" class="logo">
                                <a href="#" title="">
                                    <img src="images/logo.png" alt="logo Finance Business" style="margin: 0 0 35px 0;" />
                                </a>
                            </div><!-- /#logo -->
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <div class="iconbox style2 v2">
                                <div class="iconbox-icon">
                                    <i class="fa fa-paper-plane-o"></i>
                                </div>
                                <div class="iconbox-content">
                                    <h4>+61 3 8376 6284</h4>
                                    <p>themesflat@gmail.com</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <div class="iconbox style2 v2">
                                <div class="iconbox-icon">
                                    <i class="fa fa-map-marker"></i>
                                </div>
                                <div class="iconbox-content">
                                    <h4>4946 Marmora Road,</h4>
                                    <p>Central New, UK</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <div class="iconbox style2 v2">
                                <div class="iconbox-icon">
                                    <i class="fa fa-clock-o"></i>
                                </div>
                                <div class="iconbox-content">
                                    <h4>Mon - Sat: 8 am - 5 pm</h4>
                                    <p>Sunday: CLOSED</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.top -->
            @include('includes.frontend.nav')
            @yield('content')
            <footer id="footer">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-md-6">
                            <div class="widget-ft widget-about">
                                <div id="logo-ft">
                                    <a href="#" title="">
                                        <img src="images/logo.png" alt="">
                                    </a>
                                </div>
                                <p>The industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. 
                                </p>
                                <ul class="social">
                                    <li>
                                        <a href="#" title="">
                                            <i class="fa fa-facebook-f"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" title="">
                                            <i class="fa fa-twitter"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" title="">
                                            <i class="fa fa-linkedin"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" title="">
                                            <i class="fa fa-google-plus"></i>
                                        </a>
                                    </li>
                                </ul>   
                            </div><!-- /.widget-text -->
                        </div><!-- /.col-md-3 col-sm-6 -->
                        <div class="col-lg-3 col-md-6">
                            <div class="widget-ft widget-services">
                                <h3 class="title">Quicklink</h3>
                                <ul class="one-half first">
                                    <li><a href="#" title="">Home</a></li>
                                    <li><a href="#" title="">About us</a></li>
                                    <li><a href="#" title="">Services</a></li>
                                    <li><a href="#" title="">Cases</a></li>
                                </ul><!-- /.one-half -->
                                <ul class="one-half">
                                    <li><a href="#" title="">Contact us</a></li>
                                    <li><a href="#" title="">Clients</a></li>
                                    <li><a href="#" title="">Testimonial</a></li>
                                    <li><a href="#" title="">News</a></li>
                                </ul><!-- /.one-half -->
                                <div class="clearfix"></div>
                            </div><!-- /.widget-services -->
                        </div><!-- /.col-md-3 col-sm-6 -->
                        <div class="col-lg-3 col-md-6">
                            <div class="widget-ft widget-lastest">
                                <h3 class="title">Latest Twitter</h3>
                                <ul>
                                    <li>
                                        <a href="#" title=""><i class="fa fa-twitter"></i>@Themesflat</a> Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.
                                    </li>
                                    <li>
                                        <a href="#" title=""><i class="fa fa-twitter"></i>@Samon.D</a> Lorem Ipsum is simply dummy text of the printing and typesetting.Lorem Ipsum is simply dummy.
                                    </li>
                                </ul>
                            </div><!-- /.widget-services -->
                        </div><!-- /.col-md-3 col-sm-6 -->
                        <div class="col-lg-3 col-md-6">
                            <div class="widget-ft widget-subscribe">
                                <h3 class="title">Subscribe</h3>
                                <form id="subscribe-form" action="#" method="post" accept-charset="utf-8" data-mailchimp="true">
                                    <div id="subscribe-content">
                                        <div class="input-email">
                                            <input type="email" name="email-form" id="subscribe-email" placeholder="Your email address..." />
                                        </div>
                                        <button type="button" id="subscribe-button" class="button-subscribe">SUBMIT NOW</button>
                                    </div>
                                    <div id="subscribe-msg"></div>
                                </form>
                            </div><!-- /.widget-subscribe -->
                        </div><!-- /.col-md-3 col-sm-6 -->
                    </div><!-- /.row .widget-box -->
                </div><!-- /.container -->          
            </footer><!-- /#footer -->

            <div class="footer-bottom">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="copyright">
                                <p>© Copyright <a href="#" title="">Themesflat 2018</a>. All Rights Reserved.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.footer-bottom -->
        </div>
        @yield('before-scripts')
        @yield('after-scripts')
        <script src="{{ asset('js/frontend/jquery.min.js') }}" defer></script>
        <script src="{{ asset('js/frontend/tether.min.js') }}" defer></script>
        <script src="{{ asset('js/frontend/bootstrap.min.js') }}" defer></script>
        <script src="{{ asset('js/frontend/owl.carousel.js') }}" defer></script>
        <script src="{{ asset('js/frontend/jquery.easing.js') }}" defer></script>
        <script src="{{ asset('js/frontend/parallax.js') }}" defer></script>
        <script src="{{ asset('js/frontend/jquery.flexslider-min.js') }}" defer></script>
        <script src="{{ asset('js/frontend/waypoints.min.js') }}" defer></script>
        <script src="{{ asset('js/frontend/kinetic.js') }}" defer></script>
        <script src="{{ asset('js/frontend/jquery-countTo.js') }}" defer></script>
        <script src="{{ asset('js/frontend/jquery.owl-filter.js') }}" defer></script>
        <script src="{{ asset('js/frontend/jquery.cookie.js') }}" defer></script>
        <script src="{{ asset('js/frontend/jquery-validate.js') }}" defer></script>
        <script src="{{ asset('js/frontend/main.js') }}" defer></script>
        <script src="{{ asset('js/frontend/jquery.themepunch.tools.min.js') }}" defer></script>
        <script src="{{ asset('js/frontend/jquery.themepunch.revolution.min.js') }}" defer></script>
        <script src="{{ asset('js/frontend/slider_v3.js') }}" defer></script>
        <script src="{{ asset('js/frontend/revolution.extension.actions.min.js') }}" defer></script>
        <script src="{{ asset('js/frontend/revolution.extension.carousel.min.js') }}" defer></script>
        <script src="{{ asset('js/frontend/revolution.extension.kenburn.min.js') }}" defer></script>
        <script src="{{ asset('js/frontend/revolution.extension.layeranimation.min.js') }}" defer></script>
        <script src="{{ asset('js/frontend/revolution.extension.migration.min.js') }}" defer></script>
        <script src="{{ asset('js/frontend/revolution.extension.navigation.min.js') }}" defer></script>
        <script src="{{ asset('js/frontend/revolution.extension.parallax.min.js') }}" defer></script>
        <script src="{{ asset('js/frontend/revolution.extension.slideanims.min.js') }}" defer></script>
        <script src="{{ asset('js/frontend/revolution.extension.video.min.js') }}" defer></script>
        <script src="{{ asset('js/frontend/script.js') }}" defer></script>
    </body>
</html>
