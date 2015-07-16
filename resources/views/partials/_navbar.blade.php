@include('partials._login-modal')

<!-- Top Bar -->
<header id="topHead">
    <div class="container">

        <!-- LANGUAGE -->
        <div class="btn-group pull-right hidden-xs">
            <button class="dropdown-toggle language" type="button" data-toggle="dropdown">
                <img src="{{ asset('img/flags/us.png') }}" width="16" height="11" alt="EN Language" /> English <span class="caret"></span>
            </button>

            <ul class="dropdown-menu">
                <li>
                    <a href="#">
                        <img src="{{ asset('img/flags/us.png') }}" width="16" height="11" alt="EN Language" /> [US] English
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="{{ asset('img/flags/kr.png') }}" width="16" height="11" alt="KR Language" /> [KR] Korean
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="{{ asset('img/flags/fr.png') }}" width="16" height="11" alt="FR Language" /> [FR] French
                    </a>
                </li>
            </ul>
        </div>
        <!-- /LANGUAGE -->

        @if(Auth::guest())
            <!-- SIGN IN -->
            <div class="pull-right nav signin-dd">
                <a id="quick_sign_in" href="{{ url('/auth/login') }}"><i class="fa fa-users"></i><span class="hidden-xs"> Sign In</span></a>
                <div class="dropdown-menu" role="menu" aria-labelledby="quick_sign_in">

                    <h4>Sign In</h4>
                    <form action="" method="post" role="form">

                        <div class="form-group"><!-- email -->
                            <input required type="email" class="form-control" placeholder="Username or email">
                        </div>

                        <div class="input-group">

                            <!-- password -->
                            <input required type="password" class="form-control" placeholder="Password">

                            <!-- submit button -->
                                    <span class="input-group-btn">
                                        <button class="btn btn-primary">Sign In</button>
                                    </span>

                        </div>

                        <div class="checkbox"><!-- remmember -->
                            <label>
                                <input type="checkbox"> Remember me &bull; <a href="{{ url('/auth/login') }}">Forgot password?</a>
                            </label>
                        </div>

                    </form>

                    <hr />

                    <a href="#" class="btn-facebook fullwidth radius3"><i class="fa fa-facebook"></i> Connect With Facebook</a>
                    <a href="#" class="btn-twitter fullwidth radius3"><i class="fa fa-twitter"></i> Connect With Twitter</a>
                    <!--<a href="#" class="btn-google-plus fullwidth radius3"><i class="fa fa-google-plus"></i> Connect With Google</a>-->

                    <p class="bottom-create-account">
                        <a href="{{ url('/auth/register') }}">Manual create account</a>
                    </p>
                </div>
            </div>
            <!-- /SIGN IN -->
        @else
            <a href="{{ url('/my-account') }}"><i class="fa fa-users"></i><span class="hidden-xs">{{ Auth::user()->name}}</span></a>
            <a href="{{ url('/auth/logout') }}"><i class="fa fa-sign-out"></i><span class="hidden-xs">Sign Out</span></a>
        @endif

        <!-- CART MOBILE BUTTON -->
        <a class="pull-right" id="btn-mobile-quick-cart" href="shop-cart.html"><i class="fa fa-shopping-cart"></i></a>
        <!-- CART MOBILE BUTTON -->

        <!-- LINKS -->
        <div class="pull-right nav hidden-xs">
            <a href="page-about-us.html"><i class="fa fa-angle-right"></i> About</a>
            <a href="contact-us.html"><i class="fa fa-angle-right"></i> Contact</a>
        </div>
        <!-- /LINKS -->

    </div>
</header>
<!-- /Top Bar -->

<!-- TOP NAV -->
<header id="topNav" class="topHead"><!-- remove class="topHead" if no topHead used! -->
    <div class="container">

        <!-- Mobile Menu Button -->
        <button class="btn btn-mobile" data-toggle="collapse" data-target=".nav-main-collapse">
            <i class="fa fa-bars"></i>
        </button>

        <!-- Logo text or image -->
        <a class="logo" href="{{ url('/') }}">
            <img src="{{ asset('img/logo.png') }}" alt="werefoodies" />
        </a>

        <!-- Top Nav -->
        <div class="navbar-collapse nav-main-collapse collapse pull-right">
            <nav class="nav-main mega-menu">
                <ul class="nav nav-pills nav-main scroll-menu" id="topMain">                    
                    
                    <li class="dropdown">
                        <a class="dropdown-toggle" href="{{ url('/') }}">
                            <b>Home</b> <i class="fa fa-angle-down"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="magazine-home.html">How does it work?</a></li>
                            <li><a href="magazine-category.html">Tips & Tricks</a></li>
                            <li><a href="magazine-single.html">About Us</a></li>
                            <li class="divider"></li>
                            <li><a href="realestate-home.html">Contact Us</a></li>
                        </ul>
                    </li>

                    <!-- GLOBAL SEARCH -->
                    <li class="search">
                        <!-- search form -->
                        <form method="get" action="#" class="input-group pull-right">
                            <input type="text" class="form-control" name="k" id="k" value="" placeholder="Search">
									<span class="input-group-btn">
										<button class="btn btn-primary notransition"><i class="fa fa-search"></i></button>
									</span>
                        </form>
                        <!-- /search form -->
                    </li>
                    <!-- /GLOBAL SEARCH -->

                    

                </ul>
            </nav>
        </div>
        <!-- /Top Nav -->

    </div>

</header>

<span id="header_shadow"></span>
<!-- /TOP NAV -->