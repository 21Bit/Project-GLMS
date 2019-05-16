<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookPage extends Model
{
    function book(){
        return $this->belongsTo(Book::class);
    }
}
