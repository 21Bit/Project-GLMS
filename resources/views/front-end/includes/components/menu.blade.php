<div id="header" class="header" data-fixed-top="true">
            <!-- BEGIN container -->
            <div class="container">
                <!-- BEGIN header-container -->
                <div class="header-container">
                    <!-- BEGIN navbar-header -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <div class="header-logo">
                            <a href="/">
                                <span class="brand"></span>
                                <span>Bernas</span>LMS
                                <small>e-commerce frontend theme</small>
                            </a>
                        </div>
                    </div>
                    <!-- END navbar-header -->
                    <!-- BEGIN header-nav -->
                    <div class="header-nav">
                        <div class=" collapse navbar-collapse" id="navbar-collapse">
                            <ul class="nav">
                                <li><a href="/">Home</a></li>
                                <li><a href="index.html">Pricing</a></li>
                                <li><a href="{{ route("front-end.teacher.index") }}">Teacher</a></li>
                                <li><a href="index.html">Testimonials</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- END header-nav -->
                    <!-- BEGIN header-nav -->
                    <div class="header-nav">
                        <ul class="nav pull-right">
                            @auth
                                @include('front-end.includes.components.cart-top-menu')
                            @endif
                            @guest
                                <li>
                                    <a href="{{ route("login") }}">
                                        <span class="hidden-md hidden-sm hidden-xs">Login</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="my_account.html">
                                        <span class="hidden-md hidden-sm hidden-xs">Register</span>
                                    </a>
                                </li>
                            @else
                                <li class="dropdown dropdown-hover">
                                    <a href="#" data-toggle="dropdown">
                                        <img src="{{ Auth()->user()->getPicturePath(false) }}" class="user-img" alt="" /> 
                                        <span class="hidden-md hidden-sm hidden-xs"></span>
                                        <i class="fa fa-angle-down"></i> 
                                        <span class="arrow top"></span>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li><a href="{{ getDashBoardLink() }}">Dashboard</a></li>
                                        <li><a href="index.html">Profile</a></li>
                                        <li><a href="index.html">Activity</a></li>
                                        <li><a onclick="event.preventDefault();
							                    document.getElementById('logout-form').submit();"  href="{{ route('logout') }}">Logout</a></li>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </ul>
                                </li>
                                
                                
                            @endif
                        </ul>
                    </div>
                    <!-- END header-nav -->
                </div>
                <!-- END header-container -->
            </div>
            <!-- END container -->
        </div>