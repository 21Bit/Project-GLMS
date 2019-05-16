<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
    function user(){
        return $this->belongsTo(User::class);
    }
}
