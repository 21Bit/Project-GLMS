<?php

namespace App\Http\Controllers\FrontEnd;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    function home()
    {
        $teachers = User::where("type", "teacher")->get()->take(6);
        return view("front-end.page.home", compact("teachers"));
    }
}
