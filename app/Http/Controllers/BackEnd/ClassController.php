<?php

namespace App\Http\Controllers\BackEnd;

use DataTables;
use App\Models\Slot;
use App\Models\User;
use App\Models\Creteria;
use App\Models\CreteriaRate;
use Illuminate\Http\Request;
use Yajra\DataTables\Html\Builder;
use App\Http\Controllers\Controller;

class ClassController extends Controller
{
    public function index(Builder $builder)
    {

            if(request()->status == "ready"){
                $classes = Slot::where('student_id', '!=', null)->get();
            }else if(request()->status == "today"){
                $classes = Slot::whereDate('date_time', date('Y-m-d'))->where('student_id', '!=', null)->get();
            }else{
                $classes = Slot::where('student_id', '!=', null)->get();
            }
       

        if (request()->ajax()) {         
            return DataTables::of($classes)
                ->addColumn('action', function ($class) {
                    $buttons = '';
                    $buttons .= '<a href="' . route('back-end.class.show', $class->id) . '" class="mr-1"><i class="fa fa-eye"></i> Show </a>';
                    return $buttons;
                })
                ->addColumn('check', function ($class) {
                    return '<input type="checkbox" name="item_checked[]" value="' . $class->id . '" >';
                })
                ->addColumn('student', function($class){
                    if($class->student){
                        return $this->statusIcon($class->attendance_status) . "  " . optional($class->student)->name;
                    }
                })
                ->addColumn('teacher', function($class){
                    if($class->teacher){
                        return $class->teacher->name;
                    }
                })
                ->addColumn('date_time', function($class){
                    return date('F j Y h:i A', strtotime($class->date_time));
                })
                ->rawColumns(['check', 'action','student', 'gender'])
                ->make(true);
        }
  
      $html = $builder->columns([
          [
              'data' => 'check',
              'name' => '',
              'title' => '<input type="checkbox" id="checkAll" >',
              'render'         => null,
              'orderable'      => false,
              'searchable'     => false,
              'exportable'     => false,
              'printable'      => true,
              'width'           => "15px"
          ],
        //   [
        //     'data'  => 'attendance_status', 
        //     'name'  => 'attendance_status', 
        //     'title' => "",
        //     'width' => "5px"
        //   ],
            [
                'data' => 'student', 
                'name' => 'student', 
                'title' => "Student"
            ],
            [
                'data' => 'minutes', 
                'name' => 'minutes', 
                'title' => "Minutes"
            ],
            [
                'data' => 'date_time', 
                'name' => 'date_time', 
                'title' => "Date Time"
            ],
            [
                'data' => 'teacher', 
                'name' => 'teacher', 
                'title' => "Teacher"
            ],
            [
                'defaultContent' => '',
                'data'           => 'action',
                'name'           => 'action',
                'title'          => '',
                'render'         => null,
                'orderable'      => false,
                'searchable'     => false,
                'exportable'     => false,
                'printable'      => true,
                'footer'         => '',
                'class'          => 'text-right'
            ],
  
      ]);
  
      return view('back-end.class.index', compact('html'));
      
    }

    function statusIcon($status){
        switch($status){
            case "ready":
                return "<i class='fa fa-circle text-info'></i>";
            case "present": 
                return "<i class='fa fa-circle text-success'></i>";
            case "postponed": 
                return "<i class='fa fa-circle text-warning'></i>";
        }
    }

    function create(){
        return view("back-end.class.create");
    }

    function store(Request $request)
    {
        $this->validate($request, [
            'student_id' => 'required',
            'teacher_id' => 'required',
            'date'      => 'required|date',
            'time'      => 'required',
        ]);

        $class = new Slot;
        $class->user_id = $request->teacher_id;
        $class->student_id = $request->student_id;
        $class->date_time = $request->date . " " . $request->time . ":00";
        $class->date_of_purchase = date('Y-m-d H:i:s');
        $class->attendance_status =  "ready";
        $class->save();
        
        if($request->gotoclass){
            return redirect()->route('back-end.class.show', $class->id);
        }else{
            return redirect()->route('back-end.clas.index');
        }
    }

    function show($id){
        $class = Slot::findOrFail($id);
        $student = User::findOrFail($class->student_id);
        $creterias = Creteria::where("active", 1)->get();
        return view("back-end.class.show", compact("class", 'student', 'creterias'));
    }

    function edit($id){
        $class = Slot::findOrFail($id);
        return view("back-end.class.edit", compact("class"));
    }


    function update(Request $request, $id){
       // return $request->all();
        $class = Slot::findOrFail($id);
        $class->attendance_status = $request->status;
        $class->comment = $request->comment;
        $class->save();
        
        //clear first all rates first
        CreteriaRate::where("user_id", $class->student_id)->where("slot_id", $class->id)->delete();
        
        // Adding rate to creterias
        $creterias = Creteria::where("active", 1)->get();
        
        foreach($creterias as $creteria){
            //clear first all rates

            $rate = new CreteriaRate;
            $rate->slot_id = $class->id;
            $rate->user_id = $class->student_id;
            $rate->creteria_id = $creteria->id;
            $rate->rate = $request['creteria-' . $creteria->id];
            $rate->save();
        }

        return back()->with("message", "Changes updated!");
    }   
   
}
