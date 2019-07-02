@extends('layouts.front-end')

@section('title',  "Checkout | ". config('app.name'))

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
                <div class="col-sm-4">
                    <div class="box shadow p-5">
                        <div class="input-group">
                            <input type="text" placeholder="COUPON CODE" class="form-control">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="button"><i class="fa fa-plus fa-lg"></i></button>
                            </span>
                        </div><!-- /input-group -->
                        <h3>Summary</h3>
                        <h3 class="text-warning" id="total-credits">{{ number_format(totalCreditPackages('credit')) }}</h3>
                        <label class="text-muted">Credits</label>
                        <hr>
                        
                        <h3 class="text-warning" >$<span id="total-price">{{ number_format(totalCreditPackages('price')) }}</span></h3>
                        <label class="text-muted">Price</label>
                        <hr>
                        You want to add more credit?<br> <a href="{{ route('front-end.credit.index') }}">Back to Credit Page</a>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        @auth

                              <h2 class="title text-center">We are almost done!</h2>
                                <p class="desc text-center mb-5">
                                    Choose the payment gateway suite to your need and comfort.<br />
                                    We are working to make several options made available to you.  
                                </p>
                            <!-- BEGIN row -->
                            <div>

                                    <!-- Nav tabs -->
                                    <ul class="nav nav-tabs" role="tablist">
                                      <li role="presentation" class="active"><a href="#paypaltab" aria-controls="paypaltab" role="tab" data-toggle="tab">Paypal Payment</a></li>
                                      <li role="presentation"><a href="#bankpaymenttab" aria-controls="bankpaymenttab" role="tab" data-toggle="tab">Bank Payment</a></li>
                                    </ul>
                                  
                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                      <div role="tabpanel" class="tab-pane active" id="paypaltab">
                                           
                                            <div class="service p-5">
                                                <div class="info">
                                                    <h4 class="title">Paypal Payment</h4>
                                                    <p class="desc">Worlds secured and hassle-free payment gateway. You will be redirect to paypal page to proceed the payment and goes back here if the payment success.</p>
                                                    <button class="btn btn-success btn-lg"> Proceed</button>
                                                </div>
                                            </div> 
                                        </div>
                                        <div role="tabpanel" class="tab-pane" id="bankpaymenttab">
                                          
                                            <div class="service p-5">
                                                <div class="info">
                                                    <h4 class="title">Bank Transfer Payment</h4>
                                            
                                                    <p class="desc">Need to settle your payment over the counter at your prefered bank. 
                                                        <br>
                                                        <br>
                                                        <small class="text-warning">Note: Your order will be effective only if the payment is already in placed.</small>
                                                    </p>
                                                    
                                                    <div class="row mt-5">
                                                        <div class="col-sm-8">
                                                            <form id="bankPaymentForm" action="{{ route('front-end.credit.checkout.bank') }}" method="post">
                                                                @csrf
                                                                <p>
                                                                    <label for="">Bank Name</label>
                                                                    <input type="text" class="form-control" readonly value='hehe'>
                                                                </p>
                                                                <p>
                                                                    <label for="">Acount Name</label>
                                                                    <input type="text" class="form-control" readonly value='hehe'>
                                                                </p>
                                                                <p>
                                                                    <label for="">Acount Number</label>
                                                                    <input type="text" class="form-control" readonly value='hehe'>
                                                                </p>
                                                                <p>
                                                                    <label for="">Price</label>
                                                                    <input type="text" class="form-control" readonly value='{{ number_format(totalCreditPackages('price')) }}'>
                                                                </p>
                                                                <p>
                                                                    <label for="">Date of Payment</label>
                                                                    <input type="date" required name="date_of_payment" class="form-control" value='{{ date("Y-m-d") }}'>
                                                                </p>
                                                                <p>
                                                                    <label for="">Name of Depositor</label>
                                                                    <input type="text" required name="name_of_depositor" class="form-control" value='{{ request()->user()->name }}'>
                                                                </p>
                                                                <br />
                                                                <p>
                                                                    <button type='submit' class="btn btn-success btn-lg"> Place Payment</button>   
                                                                </p>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                  
                                  </div>
                         
                        @else
                            <div class="account-container">
                                <div class="account-sidebar">
                                    <div class="account-sidebar-cover">
                                        <img src="/images/covers/login-modal-bg.jpg" alt="" />
                                    </div>
                                    <div class="account-sidebar-content">
                                        <login-component></login-component>
                                    </div>
                                </div>
                                <div class="account-body">
                                    <register-component></register-component>    
                                </div>
                            </div>
                            <br>
                            <br>
                        @endif
                    </div>
                    
                </div>
            </div>
        </div>
@endsection