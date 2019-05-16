<?php

namespace App\Http\Controllers\Api;

use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Traits\HasTransaction;
use App\Http\Controllers\Controller;

class TransactionController extends Controller
{
    use HasTransaction;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return $this->addTransaction($request->id);
       // return Transaction::where('user_id', $request->id)->get();
    }

    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'count' => 'required'
        ]);
        
        $transaction = new Transaction;
        $transaction->reference_number = base_convert(time(), 10, 36);
        $transaction->user_id = $request->user_id;
        $transaction->count = $request->count;
        $transaction->processed_by = $request->processed_by;
        $transaction->payment_method = $request->payment_method;
        $transaction->payment_gateway = $request->payment_gateway;


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
