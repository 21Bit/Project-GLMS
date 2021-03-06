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

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function processedBy(){
        return $this->belongsTo(User::class, 'processed_by');
    }

    public function passCredit(){
        self::user()->increment('credits', $this->credits);
    }

    public function getDataAttribute($value){
        return json_decode($value);
    }
}
