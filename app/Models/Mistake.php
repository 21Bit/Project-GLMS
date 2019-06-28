<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mistake extends Model
{
    function user(){
        return $this->belongsTo(User::class);
    }

    function slot(){
        return $this->belongsTo(Slot::class);
    }
}
