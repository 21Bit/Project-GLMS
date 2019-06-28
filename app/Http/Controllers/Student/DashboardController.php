<?php

namespace App\Http\Controllers\Student;

use Auth;
use App\Models\Slot;
use App\Models\Message;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index(){
        $user = Auth::user();
        $messages = Message::where('user_id', $user->id)->take(5)->get();
        $classes = Slot::where('student_id', $user->id)->take(5)->get();
        return view('student-end.dashboard.index', compact('messages', 'classes'));
    }
}
