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
                                {{-- <li class="dropdown dropdown-full-width dropdown-hover">
                                    <a href="#" data-toggle="dropdown">
                                        Our Store 
                                        <i class="fa fa-angle-down"></i>
                                        <span class="arrow top"></span>
                                    </a>
                                    <!-- BEGIN dropdown-menu -->
                                    <div class="dropdown-menu p-0">
                                        <!-- BEGIN dropdown-menu-container -->
                                        <div class="dropdown-menu-container">
                                            <!-- BEGIN dropdown-menu-sidebar -->
                                            <div class="dropdown-menu-sidebar">
                                                <h4 class="title">Shop By Categories</h4>
                                                <ul class="dropdown-menu-list">
                                                    <li><a href="product.html">Mobile Phone <i class="fa fa-angle-right pull-right"></i></a></li>
                                                    <li><a href="product.html">Tablet <i class="fa fa-angle-right pull-right"></i></a></li>
                                                    <li><a href="product.html">Laptop <i class="fa fa-angle-right pull-right"></i></a></li>
                                                    <li><a href="product.html">Desktop <i class="fa fa-angle-right pull-right"></i></a></li>
                                                    <li><a href="product.html">TV <i class="fa fa-angle-right pull-right"></i></a></li>
                                                    <li><a href="product.html">Speaker <i class="fa fa-angle-right pull-right"></i></a></li>
                                                    <li><a href="product.html">Gadget <i class="fa fa-angle-right pull-right"></i></a></li>
                                                </ul>
                                            </div>
                                            <!-- END dropdown-menu-sidebar -->
                                            <!-- BEGIN dropdown-menu-content -->
                                            <div class="dropdown-menu-content">
                                                <h4 class="title">Shop By Popular Phone</h4>
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <ul class="dropdown-menu-list">
                                                            <li><a href="product_detail.html"><i class="fa fa-fw fa-angle-right text-muted"></i> iPhone 7</a></li>
                                                            <li><a href="product_detail.html"><i class="fa fa-fw fa-angle-right text-muted"></i> iPhone 6s</a></li>
                                                            <li><a href="product_detail.html"><i class="fa fa-fw fa-angle-right text-muted"></i> iPhone 6</a></li>
                                                            <li><a href="product_detail.html"><i class="fa fa-fw fa-angle-right text-muted"></i> iPhone 5s</a></li>
                                                            <li><a href="product_detail.html"><i class="fa fa-fw fa-angle-right text-muted"></i> iPhone 5</a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <ul class="dropdown-menu-list">
                                                            <li><a href="product_detail.html"><i class="fa fa-fw fa-angle-right text-muted"></i> Galaxy S7</a></li>
                                                            <li><a href="product_detail.html"><i class="fa fa-fw fa-angle-right text-muted"></i> Galaxy A9</a></li>
                                                            <li><a href="product_detail.html"><i class="fa fa-fw fa-angle-right text-muted"></i> Galaxy J3</a></li>
                                                            <li><a href="product_detail.html"><i class="fa fa-fw fa-angle-right text-muted"></i> Galaxy Note 5</a></li>
                                                            <li><a href="product_detail.html"><i class="fa fa-fw fa-angle-right text-muted"></i> Galaxy S7</a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <ul class="dropdown-menu-list">
                                                            <li><a href="product_detail.html"><i class="fa fa-fw fa-angle-right text-muted"></i> Lumia 730</a></li>
                                                            <li><a href="product_detail.html"><i class="fa fa-fw fa-angle-right text-muted"></i> Lumia 735</a></li>
                                                            <li><a href="product_detail.html"><i class="fa fa-fw fa-angle-right text-muted"></i> Lumia 830</a></li>
                                                            <li><a href="product_detail.html"><i class="fa fa-fw fa-angle-right text-muted"></i> Lumia 820</a></li>
                                                            <li><a href="product_detail.html"><i class="fa fa-fw fa-angle-right text-muted"></i> Lumia Icon</a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <ul class="dropdown-menu-list">
                                                            <li><a href="product_detail.html"><i class="fa fa-fw fa-angle-right text-muted"></i> Xperia X</a></li>
                                                            <li><a href="product_detail.html"><i class="fa fa-fw fa-angle-right text-muted"></i> Xperia Z5</a></li>
                                                            <li><a href="product_detail.html"><i class="fa fa-fw fa-angle-right text-muted"></i> Xperia M5</a></li>
                                                            <li><a href="product_detail.html"><i class="fa fa-fw fa-angle-right text-muted"></i> Xperia C5</a></li>
                                                            <li><a href="product_detail.html"><i class="fa fa-fw fa-angle-right text-muted"></i> Xperia C4</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <h4 class="title">Shop By Brand</h4>
                                                <ul class="dropdown-brand-list m-b-0">
                                                    <li><a href="product.html"><img src="/img/brand/brand-apple.png" alt="" /></a></li>
                                                    <li><a href="product.html"><img src="/img/brand/brand-samsung.png" alt="" /></a></li>
                                                    <li><a href="product.html"><img src="/img/brand/brand-htc.png" alt="" /></a></li>
                                                    <li><a href="product.html"><img src="/img/brand/brand-microsoft.png" alt="" /></a></li>
                                                    <li><a href="product.html"><img src="/img/brand/brand-nokia.png" alt="" /></a></li>
                                                    <li><a href="product.html"><img src="/img/brand/brand-blackberry.png" alt="" /></a></li>
                                                    <li><a href="product.html"><img src="/img/brand/brand-sony.png" alt="" /></a></li>
                                                </ul>
                                            </div>
                                            <!-- END dropdown-menu-content -->
                                        </div>
                                        <!-- END dropdown-menu-container -->
                                    </div>
                                    <!-- END dropdown-menu -->
                                </li> --}}
                                {{-- <li class="dropdown dropdown-hover">
                                    <a href="#" data-toggle="dropdown">
                                        Accessories 
                                        <i class="fa fa-angle-down"></i> 
                                        <span class="arrow top"></span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="product.html">Mobile Phone</a></li>
                                        <li><a href="product.html">Tablet</a></li>
                                        <li><a href="product.html">TV</a></li>
                                        <li><a href="product.html">Desktop</a></li>
                                        <li><a href="product.html">Laptop</a></li>
                                        <li><a href="product.html">Speaker</a></li>
                                        <li><a href="product.html">Gadget</a></li>
                                    </ul>
                                </li> --}}
                                {{-- <li><a href="product.html">New Arrival</a></li> --}}
                                {{-- <li class="dropdown dropdown-hover">
                                    <a href="#" data-toggle="dropdown">
                                        Pages
                                        <i class="fa fa-angle-down"></i> 
                                        <span class="arrow top"></span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="index.html">Home (Default)</a></li>
                                        <li><a href="index_fixed_header.html">Home (Fixed Header)</a></li>
                                        <li><a href="index_inverse_header.html">Home (Inverse Header)</a></li>
                                        <li><a href="search_results.html">Search Results</a></li>
                                        <li><a href="product.html">Product Page</a></li>
                                        <li><a href="product_detail.html">Product Details Page</a></li>
                                        <li><a href="checkout_cart.html">Checkout Cart</a></li>
                                        <li><a href="checkout_info.html">Checkout Shipping</a></li>
                                        <li><a href="checkout_payment.html">Checkout Payment</a></li>
                                        <li><a href="checkout_complete.html">Checkout Complete</a></li>
                                        <li><a href="my_account.html">My Account</a></li>
                                        <li><a href="contact_us.html">Contact Us</a></li>
                                        <li><a href="about_us.html">About Us</a></li>
                                        <li><a href="faq.html">FAQ</a></li>
                                    </ul>
                                </li> --}}
                                {{-- <li class="dropdown dropdown-hover">
                                    <a href="#" data-toggle="dropdown">
                                        <i class="fa fa-search search-btn"></i>
                                        <span class="arrow top"></span>
                                    </a>
                                    <div class="dropdown-menu p-15">
                                        <form action="search_results.html" method="POST" name="search_form">
                                            <div class="input-group">
                                                <input type="text" placeholder="Search" class="form-control bg-silver-lighter" />
                                                <span class="input-group-btn">
                                                    <button class="btn btn-inverse" type="submit"><i class="fa fa-search"></i></button>
                                                </span>
                                            </div>
                                        </form>
                                    </div> 
                                </li> --}}
                            </ul>
                        </div>
                    </div>
                    <!-- END header-nav -->
                    <!-- BEGIN header-nav -->
                    <div class="header-nav">
                        <ul class="nav pull-right">
                            {{-- <li class="dropdown dropdown-hover">
                                <a href="#" class="header-cart" data-toggle="dropdown">
                                    <i class="fa fa-shopping-bag"></i>
                                    <span class="total">2</span>
                                    <span class="arrow top"></span>
                                </a>
                    
                                <div class="dropdown-menu dropdown-menu-cart p-0">
                                    <div class="cart-header">
                                        <h4 class="cart-title">Shopping Bag (1) </h4>
                                    </div>
                                    <div class="cart-body">
                                        <ul class="cart-item">
                                            <li>
                                                <div class="cart-item-image"><img src="/img/product/product-ipad.jpg" alt="" /></div>
                                                <div class="cart-item-info">
                                                    <h4>iPad Pro Wi-Fi 128GB - Silver</h4>
                                                    <p class="price">$699.00</p>
                                                </div>
                                                <div class="cart-item-close">
                                                    <a href="#" data-toggle="tooltip" data-title="Remove">&times;</a>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="cart-item-image"><img src="/img/product/product-imac.jpg" alt="" /></div>
                                                <div class="cart-item-info">
                                                    <h4>21.5-inch iMac</h4>
                                                    <p class="price">$1299.00</p>
                                                </div>
                                                <div class="cart-item-close">
                                                    <a href="#" data-toggle="tooltip" data-title="Remove">&times;</a>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="cart-item-image"><img src="/img/product/product-iphone.png" alt="" /></div>
                                                <div class="cart-item-info">
                                                    <h4>iPhone 6s 16GB - Silver</h4>
                                                    <p class="price">$649.00</p>
                                                </div>
                                                <div class="cart-item-close">
                                                    <a href="#" data-toggle="tooltip" data-title="Remove">&times;</a>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="cart-footer">
                                        <div class="row row-space-10">
                                            <div class="col-xs-6">
                                                <a href="checkout_cart.html" class="btn btn-default btn-block">View Cart</a>
                                            </div>
                                            <div class="col-xs-6">
                                                <a href="checkout_cart.html" class="btn btn-inverse btn-block">Checkout</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li> --}}
                            {{-- <li class="divider"></li> --}}
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