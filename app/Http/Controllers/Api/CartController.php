<?php

namespace App\Http\Controllers\Api;

use Auth;
use App\Models\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\FrontEnd\Cart\CartCollection;


class CartController extends Controller
{
    
    public function index(Request $request){
        return new CartCollection(Auth::user()->carts);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $is_slot  = Auth::user()->carts()->where("slot_id", $request->slot_id)->first() ? true : false;
        
        if($is_slot){
            $cart = Cart::where('user_id', Auth::user()->id)->where("slot_id", $request->slot_id)->first();
            $id = $cart->id;
            $cart->delete();
            return ['is_added' => 0, 'id' => $id];
        }else{
            //$this->store($request);
            $cart = new Cart;
            $cart->user_id = $request->user()->id;
            $cart->slot_id = $request->slot_id;
            $cart->save();

            return [
                'is_added'  => 1,
                'id'        => $cart->id,
                'teacher'   => optional($cart->slot->teacher)->name,
                'date_time' => date('M j,Y h:iA', strtotime($cart->slot->date_time))
            ];
        }

        //$user = Auth::user()->carts()->sync(['slot_id', $request->slot_id]);
        //$cart = Cart::create([$request->user()->id, $request->slot_id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
