<?php

namespace App\Http\Controllers\FrontEnd;

use Auth;
use App\Models\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CartController extends Controller
{
    public function index(){
        $carts = Auth::user()->carts;
        return view("front-end.cart.index", compact('carts'));
    }

    public function checkout()
    {
        return view("front-end.cart.check-out");
    }

    public function remove($id){
        $cart = Cart::find($id)->delete();
        return back();
    }
}
