<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    function pages(){
        return $this->hasMany(BookPage::class);
    }

    function firstPage(){
        return $this->pages()->first();
    }

    function lastPage(){
        return $this->pages()->orderBy('ID','DESC')->first();
    }

    function pageCount(){
        return $this->pages()->count();
    }
}
