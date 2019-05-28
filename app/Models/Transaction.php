<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'reference_number', 
        'user_id', 
        'count', 
        'processed_by', 
        'payment_method', 
        'payment_gateway', 
        'price', 
        'status', 
        'data', 
    ];

    function user(){
        return $this->belongsTo(User::class);
    }

    function passCredit(){
        self::user()->increment('credits', $this->credits);
    }

    function getDataAttribute($value){
        return json_decode($value);
    }
}
