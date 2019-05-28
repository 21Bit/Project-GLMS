<?php

namespace App\Http\Controllers\FrontEnd;

use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TransactionController extends Controller
{
    public function success(Request $request){
        $transaction = Transaction::where("reference_number", $request->r)->firstOrFail();
        return view("front-end.credit.success", compact("transaction"));
    }
}
