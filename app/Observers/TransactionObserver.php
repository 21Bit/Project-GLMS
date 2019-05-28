<?php
namespace App\Observers;

use Session;
use App\Models\User;
use App\Models\Transaction;

class TransactionObserver {

    function created(Transaction $transaction){

        if($transaction->payment_method != "bank"){
            $transaction->passCredit();
        }

        // Remove all Credit Packages Session
        Session::forget('creditPackages');
    }
}