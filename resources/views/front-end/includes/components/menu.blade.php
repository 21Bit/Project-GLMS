<div id="header" class="header" data-fixed-top="true">
    <div class="container">
        <div class="header-container">
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
            <div class="header-nav">
                <div class=" collapse navbar-collapse" id="navbar-collapse">
                    <ul class="nav">
                        <li><a href="/">Home</a></li>
                        <li class="{{ menuHighLighter("credits", 1, "active") }}"><a href="{{ route("front-end.credit.index") }}">Pricing</a></li>
                        <li class="{{ menuHighLighter("teacher", 1, "active") }}"><a href="{{ route("front-end.teacher.index") }}">Teacher</a></li>
                        <li><a href="index.html">Notice</a></li>
                        <li><a href="index.html">Blog</a></li>
                    </ul>
                </div>
            </div>
            <div class="header-nav">
                <ul class="nav pull-right">
                    @auth
                        @include('front-end.includes.components.cart-top-menu')
                    @endif
                    @guest
                        <li>
                            {{-- <a href="{{ route("login") }}"> --}}
                            <a href="#" data-toggle="modal" data-target="#loginRegisterModal">
                                <span class="hidden-md hidden-sm hidden-xs">Login / Register</span>
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
                                <li><a href="#" class="text-muted">MY CREDITS: <span class="text-danger">{{ Auth::user()->credits }}</span></a></li>
                                <li><a href="{{ getDashBoardLink() }}">My Profile</a></li>
                                <li><a href="{{ getDashBoardLink() }}">Setting</a></li>
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
        </div>
    </div>
</div>