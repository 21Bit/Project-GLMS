<?php

namespace App\Http\Controllers\FrontEnd;

use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BankPaymentController extends Controller
{
    public function storeTransaction(Request $request){
        $this->validate($request, [
            'date_of_payment' => 'required|date',
            'name_of_depositor' => 'required'
        ]);

        $transaction = new Transaction;
        $transaction->reference_number = base_convert(time(), 10, 36);
        $transaction->user_id = $request->user()->id;
        $transaction->processed_by = $request->user()->id;
        $transaction->payment_method = "bank";
        $transaction->status = "pending";

        //Price and Credits
        $transaction->credits = totalCreditPackages('credit'); 
        $transaction->price = totalCreditPackages('price'); 
        
        $data = json_encode([
            'date_of_payment' => $request->date_of_payment,
            'name_of_depositor' => $request->name_of_depositor
        ]);

        $transaction->data = $data;
        $transaction->save();
        
        if($request->ajax()){
            return $transaction; 
        }else{
            return redirect()->route("front-end.transaction.success");
        }
    }
}
