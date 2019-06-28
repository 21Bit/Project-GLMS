<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CreteriaRate extends Model
{
    public function creteria(){
        return $this->belongsTo(Creteria::class);
    }
    
    public function user(){
        return $this->belongsTo(User::class);
    }
}
