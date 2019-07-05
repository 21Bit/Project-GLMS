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

    public function getTeacherInClass($id){

        $class = Slot::findOrFail($id);
        $teacher =  $class->teacher;

        $data = array(
            'id'                => $teacher->id,
            'username'          => $teacher->username,
            'name'              => $teacher->name,
            'contact_number'    => $teacher->contact_number,
            'picture'           => $teacher->getPicturePath(false),
        );

        return $class->teacher ? $data : Null;
    }

    public function changeTeacher(Request $request, $id){
        $class = Slot::findOrFail($id);
        $class->user_id = $request->teacher_id;
        $class->save();

        if(request()->ajax()){
            $teacher =  $class->teacher;

            return array(
                'id'                => $teacher->id,
                'username'          => $teacher->username,
                'name'              => $teacher->name,
                'contact_number'    => $teacher->contact_number,
                'picture'           => $teacher->getPicturePath(false),
            );   

        }else{

            return back();

        }
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
