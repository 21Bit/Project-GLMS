<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function teacher(){
        return $this->belongsTo(User::class, 'teacher');
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
}
