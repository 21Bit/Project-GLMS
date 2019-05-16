<?php

namespace App\Http\Controllers\FrontEnd;

use App\Models\Slot;
use Illuminate\Http\Request;
use App\Models\User as Teacher;
use App\Http\Controllers\Controller;

class TeacherController extends Controller
{
    function index(Request $request)
    {
        $teachers = Teacher::where('type', 'teacher')->paginate();
        return view("front-end.teacher.index", compact("teachers"));
    }

    function show($username){
        $teacher = Teacher::where('username', $username)->firstOrFail();
        $teachers = Teacher::where('type', 'teacher')->inRandomOrder()->get()->take(6);
        return view("front-end.teacher.show", compact("teachers", 'teacher'));
    }

    function getSlots(Request $request, $id){
        $slots = Slot::where('user_id', $id)
                ->whereBetween('date_time', [$request->start, $request->end])->get();
        
        return new SlotCollection($slots);
    }


}
