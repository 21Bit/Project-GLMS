 <li class="dropdown dropdown-hover">
    <a href="#" class="header-cart" data-toggle="dropdown">
        <i class="fa fa-shopping-bag"></i>
        <span class="total" id="slotnumber">{{ Auth::user()->carts()->count() }}</span>
        <span class="arrow top"></span>
    </a>

    <div class="dropdown-menu dropdown-menu-cart p-0">
        <div class="cart-header">
            <h4 class="cart-title">Selected Class</h4>
        </div>
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
        <div class="cart-footer">
            <div class="row row-space-10">
                <div class="col-xs-6">
                    <a href="checkout_cart.html" class="btn btn-default btn-block">View Bag</a>
                </div>
                <div class="col-xs-6">
                    <a href="checkout_cart.html" class="btn btn-inverse btn-block">Checkout</a>
                </div>
            </div>
        </div>
    </div>
</li>
<li class="divider"></li>