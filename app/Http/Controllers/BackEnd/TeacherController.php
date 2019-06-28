<?php

namespace App\Http\Controllers\BackEnd;

use DataTables;
use App\Models\Slot;
use Illuminate\Http\Request;
use App\Models\User as Teacher;
use Yajra\DataTables\Html\Builder;
use App\Http\Controllers\Controller;
use App\Http\Resources\BackEnd\SlotCollection;
use App\Traits\HasImageIntervention;

class TeacherController extends Controller
{
    use HasImageIntervention;
    protected $teacher;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {
    //     $teachers = Teacher::where('type', 'teacher')->orderBy('name')->paginate(15);
    //     return view('back-end.teacher.index', compact('teachers'));
    // }

    public function index(Builder $builder)
    {
        if (request()->ajax()) {
            $teachers = Teacher::where('type', 'teacher')->get();
            return DataTables::of($teachers)
              ->addColumn('action', function ($teacher) {
                  $buttons = '';
                  $buttons .= '<a href="' . route('back-end.teacher.show', $teacher->id) . '" class="mr-2"><i class="fa fa-eye"></i> Show </a>';
                  $buttons .= '<a href="' . route('back-end.teacher.edit', $teacher->id) . '"><i class="fa fa-edit"></i> Edit </a>';
                  return $buttons;
              })
              ->addColumn('check', function ($teacher) {
                  return '<input type="checkbox" name="item_checked[]" value="' . $teacher->id . '" >';
              })
              ->addColumn('picture', function ($teacher) {
                  return "<img src='" . $teacher->getPicturePath(false) ."' class='rounded-0'>";
              })

              ->rawColumns(['check', 'action','picture', 'gender', ])
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
            ],
            [
              'data' => 'picture', 
              'name' => 'picture', 
              'title' => "Picture"
            ],
            [
              'data' => 'username', 
              'name' => 'username', 
              'title' => "Username"
            ],
            [
              'data' => 'name', 
              'name' => 'name', 
              'title' => "Name"
            ],
            [
              'data' => 'gender', 
              'name' => 'gender', 
              'title' => "Gender"
            ],
            [
              'data' => 'email', 
              'name' => 'email', 
              'title' => "Email"
            ],
            [
              'data' => 'dob', 
              'name' => 'dob', 
              'title' => "Birthdate"
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
            ],
  
      ]);
  
      return view('back-end.teacher.index', compact('html'));
  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back-end.teacher.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'gender' => 'required',
            'password' => 'required|confirmed|min:6',
            'username' => 'unique:users|min:5'
        ]);

        $teacher = new Teacher;
        $teacher->name = $request->name;
        $teacher->gender = $request->gender;
        $teacher->type = 'teacher';
        $teacher->username = $request->username;
        $teacher->password = bcrypt($request->password);
  
       
        $teacher->save();
        
        if($request->hasFile('picture')){
            $image = $request->cropped_image;

            list($type, $image) = explode(';', $image);
            list(, $image)      = explode(',', $image);
            $image = base64_decode($image);
            $teacher->uploadPicture($request, true, $image);
        }

        if(!$request->ajax()){
            return redirect()->route('back-end.teacher.index');
        }
    }
    
    function getSlots(Request $request, $id){
        $slots = Slot::where('user_id', $id)
                ->whereBetween('date_time', [$request->start, $request->end])->get();
        
        return new SlotCollection($slots);
    }

    function slotStore(Request $request, $id)
    {
        $this->validate($request, [
            'date' => 'required',
            'minutes' => 'required',
            'time' => 'required',
        ]);
        
        $data = array(
            'date'      => $request->date,
            'time'      => $request->time,
            'minutes'   => $request->minutes,
            'id'        => $id,
        );

        $slot = $this->addSlot($data);

        if($request->multiple){
            $this->addMultipleSlot($request, $id);
        }
        
    //    return $slot;
    }

    private function addMultipleSlot(Request $request, $id){
        $days = $request->days;
        $loop = true;
        $i = 1;

        while ($loop) {
            $added_date = date("Y-m-d", strtotime("+$i days", strtotime($request->date)));
            \Log::info('Added:' . $added_date);
            if ($added_date <= $request->date_to) {
                $day_num = date('N', strtotime($added_date));
                if (in_array($day_num, $days)) {
                    $data = array(
                        'date'      => $added_date,
                        'time'      => $request->time,
                        'minutes'   => $request->minutes,
                        'id'        => $id,
                    );
                    $slot = $this->addSlot($data);
                }
            } else {
                $loop = false;
                break;
            }

            $i++;
        }
    }

    function deleteSlot($id)
    {
        $slot = Slot::find($id);
        $slot->delete();
        if(!request()->ajax){
            return back();
        }
    }


    private function addSlot($data){
        $slot = new Slot;
        $slot->date_time = joinTime($data['date'], $data['time']);
        $slot->minutes = $data['minutes'];
        $slot->user_id = $data['id'];
        $slot->save();    
        return $slot;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $teacher = Teacher::findOrFail($id);
        $this->teacher = $teacher; 
        return view('back-end.teacher.show', compact('teacher'));
    }


    public function classTable(Builder $builder, $id)
    {
        $teacher = Teacher::findOrFail($id);
        $classes = $teacher->classes();
        if (request()->ajax()) {
            return DataTables::of($classes)
              ->addColumn('action', function ($teacher) {
                  $buttons = '';
                  $buttons .= '<a href="' . route('back-end.teacher.show', $teacher->id) . '" class="mr-2"><i class="fa fa-eye"></i> Show </a>';
                  return $buttons;
              })
              ->addColumn('check', function ($class) {
                  return '<input type="checkbox" name="item_checked[]" value="' . $class->id . '" >';
              })
              ->addColumn('name', function ($class) {
                    return $class->student()->first()->name;
              })
              ->addColumn('time', function ($class) {
                    return date("h:iA", strtotime($class->date_time));
              })
              ->addColumn('date', function ($class) {
                    return date("Y-m-d", strtotime($class->date_time));
              })
              ->addColumn('status', function ($class) {
                    return strtoupper($class->attendance_status);
              })
              ->rawColumns(['check', 'action', 'time', 'date', 'status', 'name' ])
              ->make(true);
        }
  
      $html = $builder->columns([
          [
              'data' => 'name', 
              'name' => 'name', 
              'title' => "Student Name"
          ],
          [
              'data' => 'time', 
              'name' => 'time', 
              'title' => "Time"
          ],
          [
              'data' => 'date', 
              'name' => 'date', 
              'title' => "Date"
          ],
          [
              'data' => 'status', 
              'name' => 'status', 
              'title' => "Status"
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
          ],
  
      ]);
  
      return view('back-end.teacher.class', compact('html', 'teacher'));
  
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $teacher = Teacher::findOrFail($id);
        return view('back-end.teacher.edit', compact('teacher'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'gender' => 'required',
            'password' => 'nullable|min:6',
            'username' => 'min:5|unique:users,username,' . $id
        ]);

        $teacher = Teacher::find($id);
        $teacher->name = $request->name;
        $teacher->gender = $request->gender;
        $teacher->username = $request->username;

        if($request->password){
            $teacher->password = bcrypt($request->password);
        }

        if($request->hasFile('picture')){
            $teacher->clearPicture(true);

            $image = $request->cropped_image;
            list($type, $image) = explode(';', $image);
            list(, $image)      = explode(',', $image);
            $image = base64_decode($image);
            
            $teacher->uploadPicture($request, true, $image);
        }

        
        $teacher->save();

        if(!$request->ajax()){
            return redirect()->route('back-end.teacher.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        foreach($request->ids as $id){
            Teacher::find($id)->delete();
        }
        if(!$request->ajax()){
            return back();
        }
    }
    
    public function deletemultiple(Request $request)
    {
        if($request->item_checked){
           foreach($request->item_checked as $id){
                Teacher::find($id)->delete();
            }
        }

        if(!$request->ajax()){
            return back();
        }
    }

    public function profile(Request $request, $id){
        
    }

}
