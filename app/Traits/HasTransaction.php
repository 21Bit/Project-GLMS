<?php
namespace App\Traits;

use App\Models\Transaction;

trait HasTransaction{

    function makeTransaction(array $array){
        return Transaction::create($array);
    }

    function getTransaction($user_id){
        return Transaction::where('user_id', $user_id)->get();
    }

}