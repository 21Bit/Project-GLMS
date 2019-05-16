<?php
namespace App\Observers;

use App\Models\User;
use App\Models\Transaction;

class TransactionObserver {

    function created(Transaction $transaction){

        //add to user credits
       
        //User::find($transaction->user_id)->increment('credits', $transaction->count);
    }
}