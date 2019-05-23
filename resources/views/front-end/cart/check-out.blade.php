@extends('layouts.front-end')

@section('title', "CART")

@section("content")
    <div id="page-header" class="section-container page-header-container bg-black">
        <!-- BEGIN page-header-cover -->
        <div class="page-header-cover">
            <img src="/img/cover/cover-11.jpg" alt="" />
        </div>
        <!-- END page-header-cover -->
        <!-- BEGIN container -->
        <div class="container">
            <h1 class="page-header"><b>Checkout</b></h1>
        </div>
        <!-- END container -->
    </div>
       <div id="about-us-cover" class="section-container">
            <div class="container">
                <div class="row">
                    <div class="col-sm-8">
                        <h4 class="mb-5">Payment Methods</h4>
                        <div class="search-item-container mb-5">
                            <!-- BEGIN item-row -->
                            <div class="item-row">
                                <!-- BEGIN item -->
                                <div class="item item-thumbnail">
                                    <a href="product-detail.html" class="item-image">
                                        <img src="https://cdn2.iconfinder.com/data/icons/finance-icons-1/256/Bank_Check-512.png" alt="" />
                                    </a>
                                    <div class="item-info">
                                        <h3 class="item-title mb-3">
                                            <a href="product-detail.html">Bank Payment</a>
                                        </h4>
                                        <button class="btn btn-success btn-lg btn-block">Pay</button>
                                    </div>
                                </div>
                                <div class="item item-thumbnail">
                                    <a href="product-detail.html" class="item-image">
                                        <img src="https://www.paypalobjects.com/webstatic/mktg/logo-center/PP_Acceptance_Marks_for_LogoCenter_266x142.png" alt="" />
                                    </a>
                                    <div class="item-info">
                                        <h3 class="item-title mb-3">
                                            <a href="product-detail.html">Paypal</a>
                                        </h4>
                                        <button class="btn btn-success btn-lg btn-block">Pay</button>
                                    </div>
                                </div>
                                <div class="item item-thumbnail">
                                    <a href="product-detail.html" class="item-image">
                                        <img src="https://library.kissclipart.com/20180831/qyw/kissclipart-payment-icon-clipart-payment-gateway-credit-card-3274d15c69375a25.png" alt="" />
                                    </a>
                                    <div class="item-info">
                                        <h3 class="item-title mb-3">
                                            <a href="product-detail.html">Credit Card</a>
                                        </h4>
                                        <button class="btn btn-success btn-lg btn-block">Pay</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <label for="">Note:</label>
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis porro sequi eaque enim fugiat! Quod in quia ipsam nisi, et quis maiores modi officia tempore dolorem quos sequi exercitationem quisquam.
                        </p>
                    </div>
                    <div class="col-sm-4">
                        <div class="box shadow">
                            <h4>Summary</h4>
                            <div class="cart-body">
                                    <ul class="cart-item">
                                        @foreach(Auth::user()->carts as $cart)
                                            <li id="cart-li-{{ $cart->id }}">
                                                <div class="cart-item-info">
                                                    <h4>
                                                        {{ date('M j,Y h:iA', strtotime(optional($cart->slot)->date_time)) }} <br>
                                                        <small>{{ optional(optional($cart->slot)->teacher)->name }}</small>
                                                    </h4>
                                                </div>
                                                <div class="cart-item-close">
                                                    <a href="#" class="remove-cart" data-id="{{ $cart->id }}" data-toggle="tooltip" data-title="Remove">&times;</a>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection