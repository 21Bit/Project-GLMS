<?php

namespace App\Http\Controllers\Api;

use Auth;
use App\Models\Slot;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\FrontEnd\SlotCollection as SlotCollectionFrontEnd;

class TeacherApiController extends Controller
{
    
    function getSlots(Request $request, $id){
        $slots = Slot::where('user_id', $id)->where("student_id", Null)
                ->whereBetween('date_time', [$request->start, $request->end])->get();
        
        return new SlotCollectionFrontEnd($slots);
    }

    function select2Teacher(Request $request){
        $teachers = User::where('type', 'teacher')->where("username", 'LIKE', '%' . $request->q . '%')->orWhere("name", 'LIKE', '%' . $request->q .'%')->take(30)->get();

        $data = array();
        foreach($teachers as $teacher){
            array_push($data, [
                'id' => $teacher->id,
                'text' => $teacher->name,
            ]);
        }
        return $data;
    }


    function select2Student(Request $request){
        $teachers = User::where('type', 'student')->where("username", 'LIKE', '%' . $request->q . '%')->orWhere("name", 'LIKE', '%' . $request->q .'%')->take(30)->get();

        $data = array();
        foreach($teachers as $teacher){
            array_push($data, [
                'id' => $teacher->id,
                'text' => $teacher->name,
            ]);
        }
        return $data;
    }
}
