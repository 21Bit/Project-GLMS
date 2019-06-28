<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProofReading extends Model
{
    
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
}
