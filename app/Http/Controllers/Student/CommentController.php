<?php

namespace App\Http\Controllers\Student;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
    function destroy($id){
        Comment::find($id)->delete();
        if(!request()->ajax())
            return back();
    
    }
}
