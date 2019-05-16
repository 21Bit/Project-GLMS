@extends('layouts.front-end')

@section('title', config("app.name"))

@section("slider")
    @include("front-end.includes.components.slider")
@endsection

@section("content")
      <!-- BEGIN #promotions -->
        <div id="promotions" class="section-container bg-white">
            <!-- BEGIN container -->
            <div class="container">
                <!-- BEGIN section-title -->
                <h4 class="section-title clearfix">
                    <a href="#" class="pull-right">SHOW ALL</a>
                    Exclusive promotions
                    <small>from 25 September 2016 - 1 January 2017</small>
                </h4>
                <!-- END section-title -->
                <!-- BEGIN row -->
                <div class="row row-space-10">
                    <!-- BEGIN col-6 -->
                    <div class="col-md-6">
                        <!-- BEGIN promotion -->
                        <div class="promotion promotion-lg bg-black-darker">
                            <div class="promotion-image text-right promotion-image-overflow-bottom">
                                <img src="/img/product/product-iphone-se.png" alt="" />
                            </div>
                            <div class="promotion-caption promotion-caption-inverse">
                                <h4 class="promotion-title">iPhone SE</h4>
                                <div class="promotion-price"><small>from</small> $299.00</div>
                                <p class="promotion-desc">A big step for small.<br />A beloved design. Now with more to love.</p>
                                <a href="#" class="promotion-btn">View More</a>
                            </div>
                        </div>
                        <!-- END promotion -->
                    </div>
                    <!-- END col-6 -->
                    <!-- BEGIN col-3 -->
                    <div class="col-md-3 col-sm-6">
                        <!-- BEGIN promotion -->
                        <div class="promotion bg-blue">
                            <div class="promotion-image promotion-image-overflow-bottom promotion-image-overflow-top">
                                <img src="/img/product/product-apple-watch-sm.png" alt="" />
                            </div>
                            <div class="promotion-caption promotion-caption-inverse text-right">
                                <h4 class="promotion-title">Apple Watch</h4>
                                <div class="promotion-price"><small>from</small> $299.00</div>
                                <p class="promotion-desc">You. At a glance.</p>
                                <a href="#" class="promotion-btn">View More</a>
                            </div>
                        </div>
                        <!-- END promotion -->
                        <!-- BEGIN promotion -->
                        <div class="promotion bg-silver">
                            <div class="promotion-image text-center promotion-image-overflow-bottom">
                                <img src="/img/product/product-mac-mini.png" alt="" />
                            </div>
                            <div class="promotion-caption text-center">
                                <h4 class="promotion-title">Mac Mini</h4>
                                <div class="promotion-price"><small>from</small> $199.00</div>
                                <p class="promotion-desc">It’s mini in a massive way.</p>
                                <a href="#" class="promotion-btn">View More</a>
                            </div>
                        </div>
                        <!-- END promotion -->
                    </div>
                    <!-- END col-3 -->
                    <!-- BEGIN col-3 -->
                    <div class="col-md-3 col-sm-6">
                        <!-- BEGIN promotion -->
                        <div class="promotion bg-silver">
                            <div class="promotion-image promotion-image-overflow-right promotion-image-overflow-bottom text-right">
                                <img src="/img/product/product-mac-accessories.png" alt="" />
                            </div>
                            <div class="promotion-caption text-center">
                                <h4 class="promotion-title">Apple Accessories</h4>
                                <div class="promotion-price"><small>from</small> $99.00</div>
                                <p class="promotion-desc">Redesigned. Rechargeable. Remarkable.</p>
                                <a href="#" class="promotion-btn">View More</a>
                            </div>
                        </div>
                        <!-- END promotion -->
                        <!-- BEGIN promotion -->
                        <div class="promotion bg-black">
                            <div class="promotion-image text-right">
                                <img src="/img/product/product-mac-pro.png" alt="" />
                            </div>
                            <div class="promotion-caption promotion-caption-inverse">
                                <h4 class="promotion-title">Mac Pro</h4>
                                <div class="promotion-price"><small>from</small> $1,299.00</div>
                                <p class="promotion-desc">Built for creativity on an epic scale.</p>
                                <a href="#" class="promotion-btn">View More</a>
                            </div>
                        </div>
                        <!-- END promotion -->
                    </div>
                    <!-- END col-3 -->
                </div>
                <!-- END row -->
            </div>
            <!-- END container -->
        </div>
        <!-- END #promotions -->
    
        <!-- BEGIN #trending-items -->
        <div id="trending-items" class="section-container bg-silver">
            <!-- BEGIN container -->
            <div class="container">
                <!-- BEGIN section-title -->
                <h4 class="section-title clearfix">
                    <a href="#" class="pull-right m-l-5"><i class="fa fa-angle-right f-s-18"></i></a>
                    <a href="#" class="pull-right"><i class="fa fa-angle-left f-s-18"></i></a>
                    Our Top Instructors
                    <small>All been loved and favorite of our students over a decade.</small>
                </h4>
                <!-- END section-title -->
            
                <!-- BEGIN row -->
                <div class="row row-space-10">
                    <!-- BEGIN col-2 -->
                    @foreach($teachers as $teacher)
                        <div class="col-md-2 col-sm-4">
                            <div class="item item-thumbnail" style="margin-bottom:10px;min-height:265px">
                                <a href="{{ route("front-end.teacher.show", $teacher->username) }}" class="item-image">
                                    <img src="{{ $teacher->getPicturePath(true) }}" alt="" />        
                                </a>
                                <div class="item-info">
                                    <h4 class="item-title">
                                        <a href="{{ route("front-end.teacher.show", $teacher->username) }}">{{ $teacher->name }}</a>
                                    </h4>
                                    <p class="item-desc">3D Touch. 12MP photos. 4K video.</p>
                                    <div class="item-price"><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star"></i></div>
                                    <div class="item-discount-price">$739.00</div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <!-- END row -->
            </div>
            <!-- END container -->
        </div>
        <!-- END #trending-items -->
        
        <!-- BEGIN #policy -->
        <div id="policy" class="section-container p-t-30 p-b-30">
            <!-- BEGIN container -->
            <div class="container">
                <!-- BEGIN row -->
                <div class="row">
                    <!-- BEGIN col-4 -->
                    <div class="col-md-4 col-sm-4">
                        <!-- BEGIN policy -->
                        <div class="policy">
                            <div class="policy-icon"><i class="fa fa-truck"></i></div>
                            <div class="policy-info">
                                <h4>Free Delivery Over $100</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            </div>
                        </div>
                        <!-- END policy -->
                    </div>
                    <!-- END col-4 -->
                    <!-- BEGIN col-4 -->
                    <div class="col-md-4 col-sm-4">
                        <!-- BEGIN policy -->
                        <div class="policy">
                            <div class="policy-icon"><i class="fa fa-shield"></i></div>
                            <div class="policy-info">
                                <h4>1 Year Warranty For Phones</h4>
                                <p>Cras laoreet urna id dui malesuada gravida. <br />Duis a lobortis dui.</p>
                            </div>
                        </div>
                        <!-- END policy -->
                    </div>
                    <!-- END col-4 -->
                    <!-- BEGIN col-4 -->
                    <div class="col-md-4 col-sm-4">
                        <!-- BEGIN policy -->
                        <div class="policy">
                            <div class="policy-icon"><i class="fa fa-user-md"></i></div>
                            <div class="policy-info">
                                <h4>6 Month Warranty For Accessories</h4>
                                <p>Fusce ut euismod orci. Morbi auctor, sapien non eleifend iaculis.</p>
                            </div>
                        </div>
                        <!-- END policy -->
                    </div>
                    <!-- END col-4 -->
                </div>
                <!-- END row -->
            </div>
            <!-- END container -->
        </div>
        <!-- END #policy -->
    
        <!-- BEGIN #subscribe -->
        <div id="subscribe" class="section-container bg-silver p-t-30 p-b-30">
            <!-- BEGIN container -->
            <div class="container">
                <!-- BEGIN row -->
                <div class="row">
                    <!-- BEGIN col-6 -->
                    <div class="col-md-6 col-sm-6">
                        <!-- BEGIN subscription -->
                        <div class="subscription">
                            <div class="subscription-intro">
                                <h4> LET'S STAY IN TOUCH</h4>
                                <p>Get updates on sales specials and more</p>
                            </div>
                            <div class="subscription-form">
                                <form name="subscription_form" action="index.html" method="POST">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="email" placeholder="Enter Email Address" />
                                        <div class="input-group-btn">
                                            <button type="submit" class="btn btn-inverse"><i class="fa fa-angle-right"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- END subscription -->
                    </div>
                    <!-- END col-6 -->
                    <!-- BEGIN col-6 -->
                    <div class="col-md-6 col-sm-6">
                        <!-- BEGIN social -->
                        <div class="social">
                            <div class="social-intro">
                                <h4>FOLLOW US</h4>
                                <p>We want to hear from you!</p>
                            </div>
                            <div class="social-list">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                                <a href="#"><i class="fa fa-dribbble"></i></a>
                                <a href="#"><i class="fa fa-google-plus"></i></a>
                            </div>
                        </div>
                        <!-- END social -->
                    </div>
                    <!-- END col-6 -->
                </div>
                <!-- END row -->
            </div>
            <!-- END container -->
        </div>
@endsection