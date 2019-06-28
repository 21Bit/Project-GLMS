<?php

namespace App\Http\Controllers\FrontEnd;

use Auth;
use Session;
use App\Models\Cart;
use App\Models\Slot;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CartController extends Controller
{
    public function index(){
        $carts = Auth::user()->carts;
        return view("front-end.cart.index", compact('carts'));
    }

    public function placeClass(){
        $carts = Auth::user()->carts;
        
        if(Auth::user()->isCreditValid()){
            foreach($carts as $cart){
                $slot = Slot::find($cart->slot_id);
                $slot->student_id = Auth::user()->id;
                $slot->date_of_purchase = date("Y-m-d h:i:s");
                $slot->save();
                $cart->delete();
            }       
            Session::push("cartSuccess", true);
            Auth::user()->decrement("credits", Auth::user()->getTotalCartCredits());
            return redirect()->route("front-end.cart.success");
        }else{
            return back()->with("message", "Your current credit is not enough to purchase classes");
        }
    }

    public function success(){
        if(session("cartSuccess")){
            return view("front-end.cart.success");
            Session::forget("cartSuccess");
        }else{
            return redirect('/');
        }
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
