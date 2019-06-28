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
    
            <div class="row">
                <div class="col-sm-8">
                    <div class="panel panel-forum">
                        <div class="panel-heading">
                            Instructor's Slot
                        </div>
                        <div class="panel-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Instructor</th>
                                        <th>Date</th>
                                        <th>Credits</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($carts as $cart)
                                        <tr>
                                            <td>
                                                <img src="{{ optional($cart->slot->teacher)->getPicturePath(false) }}" class="img img-circle mr-3" alt="" />
                                                <a target="_blank" href="{{ route('front-end.teacher.show', $cart->slot->teacher->username) }}">{{ optional($cart->slot->teacher)->name }} </a>
                                            </td>
                                            <td>
                                                <span class="total-post">{{ date('h:iA', strtotime($cart->slot->date_time)) }}</span> <span class="divider">/</span> <span class="total-comment">{{ date('M j, Y', strtotime($cart->slot->date_time)) }}</span>
                                            </td>
                                            <td>
                                                {{ creditPerSlot() }}
                                            </td>
                                            <td align="center">
                                                    <a href="#" onclick="if(confirm('Are you sure to delete?')){ $('#form-{{ $cart->id }}').submit()  }" class="text-danger"><i class="fa fa-remove"></i></a>
                                                    <form id="form-{{ $cart->id }}" action="{{ route('front-end.cart.remove', $cart->id) }}" method="post">
                                                        @csrf
                                                        @method("DELETE")
                                                    </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>   
                </div>
                <div class="col-sm-4">
                    <div class="panel panel-forum">
                        <!-- begin panel-heading -->
                        <div class="panel-heading">
                            Summary
                        </div>
                        <div class="panel-body">
                            <div class="row  text-center">
                                <div class="col-xs-6">
                                    <h1>{{ Auth::user()->getTotalCartCredits() }}</h1>
                                    <label for="">Total Bag Credits</label>
                                </div>
                                <div class="col-xs-6">
                                    <h1>{{ Auth::user()->credits }}</h1>
                                    <label for="">My Current Credits</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if(Auth::user()->credits < 1)
                        <div class=" mt-2 mb-4">
                            <div class="text-danger mb-2">
                                You have no credits to continue. Please purchase first according to your needs to place your classes.
                            </div>
                            To purchase more credits, <a href="/credits">click here </a>
                        </div>
                    @else
                        <div class=" mt-2 mb-4">
                            <div class="mb-2">
                                <div class="mb-2">
                                    Note: {{ Auth::user()->getTotalCartCredits() }} credits will be deducted to your current credits upon this purchase.  
                                </div>
                            </div>
                        </div>
                    @endif
                    <div class="text-right">
                        <form action="{{ route('front-end.cart.place') }}" method="post">
                            @csrf
                            <button @if(Auth::user()->credits < 1) disabled @endif class="btn btn-success btn-lg p-3">BUY WITH CREDITS</button>
                        </form>
                    </div>
                        
                </div>
            </div>
      
                   
        </div>
    </div>
@endsection