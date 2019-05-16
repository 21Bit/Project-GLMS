<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    public $fillable = ['user_id', 'slot_id'];
    
    function slot(){
        return $this->belongsTo(Slot::class);
    }

    function user()
    {
        return $this->belongsTo(User::class);
    }
}
