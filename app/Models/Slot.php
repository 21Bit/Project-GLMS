<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slot extends Model
{
    public function student(){
        return $this->belongsTo(User::class, 'student_id');    
    }

    public function teacher(){
        return $this->belongsTo(User::class, 'user_id');    
    }

    public function mistakes(){
        return $this->hasMany(Mistake::class);
    }
    
}
