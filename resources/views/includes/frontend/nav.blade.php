<header id="header" class="header style1 v1 bg-color">
    <div class="container">
        <div class="row">
            <div class="header-wrap">
                <div class="col-md-12">
                    <div class="flat-header-wrap">
                        <div class="flat-show-search">
                            <div class="show-search">
                                <i class="fa fa-search"></i>                                             
                            </div>
                            <div class="top-search">                        
                                <form action="#" id="searchform-all" method="get">
                                    <div>
                                        <input type="text" id="s" class="sss" placeholder="Search...">
                                        <input type="submit" value="" id="searchsubmit">
                                    </div>
                                </form>
                            </div> <!-- /.top-search -->
                        </div>  <!-- /.flat-show-search -->                      
                        <div class="nav-wrap">
                            <div class="btn-menu">
                                <span></span>
                            </div><!-- //mobile menu button -->
                            <nav id="mainnav" class="mainnav">
                                <ul class="menu">
                                    <li class="active">
                                        <a href="#" title="">Home</a>
                                    </li>
                                    <li class="">
                                        <a href="#" title="">How it works</a>
                                    </li>
                                    <li class="">
                                        <a href="#" title="">FAQ'S</a>
                                    </li>
                                    <li>
                                        <a href="#" title="">Contact Us</a>
                                    </li>
                                    @if(Auth::check())
                                    <li>
                                        <a href="{{url('/shop')}}">Shop</a>
                                        <ul class="sub-menu">
                                            <li><a href="" title="">Cart</a></li>
                                            <li><a href="" title="">Checkout</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a title="">My Account</a>
                                        <ul class="sub-menu">
                                            <li><a href="{{url('/serviceprovider/logout')}}" title="">Logout</a></li>
                                            <li><a href="" title="">Profile</a></li>
                                        </ul>
                                    </li>
                                    @else
                                    <li>
                                        <a title="">My Account</a>
                                        <ul class="sub-menu">
                                            <li><a href="{{url('/serviceprovider/login')}}" title="">Login</a></li>
                                            <li><a href="{{url('/serviceprovider/register')}}" title="">Register</a></li>
                                        </ul>
                                    </li>
                                    @endif
                                </ul><!-- /.menu -->
                            </nav><!-- /#mainnav -->
                        </div><!-- /.nav-wrap -->
                    </div>
                </div><!-- /.col-md-9 -->
            </div><!-- /.header-wrap -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</header>