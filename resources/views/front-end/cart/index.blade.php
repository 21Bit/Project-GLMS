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
            <h1 class="page-header"><b>My</b> Bag </h1>
        </div>
        <!-- END container -->
    </div>
    <div id="trending-items" class="section-container bg-silver">
        <!-- BEGIN container -->
        <div class="container">
            {{-- <div class="text-right mb-2">
                <a href="#" class="btn btn-lg btn-success">Checkout</a>
            </div> --}}
            <div class="panel panel-forum">
                <!-- begin panel-heading -->
                <div class="panel-heading text-right">
                   <a href="/cart/check-out" class="btn btn-lg btn-success">Checkout</a>
                </div>
                <!-- end panel-heading -->
                <!-- begin forum-list -->
                <ul class="forum-list">
                    @foreach($carts as $cart)
                        <li>
                            <div class="media">
                                <img src="{{ $cart->slot->teacher->getPicturePath() }}" alt="" />
                            </div>
                            <div class="info-container">
                                <div class="info">
                                    <h4 class="title"><a href="{{ route('front-end.teacher.show', $cart->slot->teacher->username) }}">{{ optional($cart->slot->teacher)->name }}</a></h4>
                                    <!-- <p class="desc">
                                        The latest official news, events , announcements, updates and other information released .
                                    </p> -->
                                </div>
                                <div class="total-count">
                                 <span class="total-post">{{ date('h:iA', strtotime($cart->slot->date_time)) }}</span> <span class="divider">/</span> <span class="total-comment">{{ date('M j, Y', strtotime($cart->slot->date_time)) }}</span>
                                    {{-- <span class="total-post">{{ date('M j, Y', strtotime($cart->slot->date_time)) }}</span> --}}
                                </div>
                                <div class="latest-post text-right">
                                    <button onclick="if(confirm('Are you sure to delete?')){ $('#form-{{ $cart->id }}').submit()  }" class="btn btn-sm btn-danger"><i class="fa fa-remove"></i> Remove</button>
                                    <form id="form-{{ $cart->id }}" action="{{ route('front-end.cart.remove', $cart->id) }}" method="post">
                                        @csrf
                                        @method("DELETE")
                                    </form>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
                   
        </div>
    </div>
@endsection