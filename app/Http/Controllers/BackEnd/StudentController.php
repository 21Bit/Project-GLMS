<?php

namespace App\Http\Controllers\BackEnd;

use DataTables;
use App\Models\User;
use Illuminate\Http\Request;
use App\Traits\HasTransaction;
use App\Models\User as Student;
use Yajra\DataTables\Html\Builder;
use App\Http\Controllers\Controller;
use App\Http\Resources\Transaction\TransactionCollection;
use App\Http\Resources\Transaction\Transaction as TransactionResource;

class StudentController extends Controller
{

    use HasTransaction;
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Builder $builder)
    {
        if (request()->ajax()) {
            $students = Student::where('type', 'student')->get();
            return DataTables::of($students)
              ->addColumn('action', function ($student) {
                  $buttons = '';
                  $buttons .= '<a href="' . route('back-end.student.show', $student->id) . '" class="mr-1"><i class="fa fa-eye"></i> Show </a>';
                  $buttons .= '<a href="' . route('back-end.student.edit', $student->id) . '" ><i class="fa fa-pencil"></i> Edit </a>';
                  return $buttons;
              })
              ->addColumn('check', function ($student) {
                  return '<input type="checkbox" name="item_checked[]" value="' . $student->id . '" >';
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
              "width"          => "25px"
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
              'data' => 'credits', 
              'name' => 'credits', 
              'title' => "Credits"
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
  
      return view('back-end.student.index', compact('html'));
  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back-end.student.create');
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
            'username' => 'unique:users|min:5',
            'email' => 'nullable|unique:users'
        ]);

        $teacher = new Student;
        $teacher->type = 'student';
        $teacher->name = $request->name;
        $teacher->gender = $request->gender;
        $teacher->dob = $request->dob;
        $teacher->contact_number = $request->contact_number;
        $teacher->email = $request->email;

        $teacher->username = $request->username;
        $teacher->password = bcrypt($request->password);
        $teacher->save();

        if(!$request->ajax()){
            return redirect()->route('back-end.student.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student = Student::findOrFail($id);
        return view('back-end.student.show', compact('student'));
    }

    public function transaction($id)
    {
        $student = Student::findOrFail($id);
        return view('back-end.student.transaction', compact('student'));
    }

    public function transactionList($id)
    {
        return new TransactionCollection($this->getTransaction($id));
    }

    public function addTransaction(Request $request)
    {
        $this->validate($request, [
            'count' => 'required',
        ]);
            
        if($request->isFree){
            $transaction = $this->makeTransaction([
                'reference_number'  => base_convert(time(), 10, 36),
                'user_id'           => $request->user_id,
                'count'             => $request->count,
                'note'              => $request->note,
                'processed_by'      => $request->user()->id
            ]);

            User::find($request->user_id)->increment('credits', $request->count);

        }else{
            $transaction = $this->makeTransaction([
                'reference_number'  => base_convert(time(), 10, 36),
                'user_id'           => $request->user_id,
                'count'             => $request->count,
                'processed_by'      => $request->user()->id,
                'price'             => $request->price,
                'payment_method'   => $request->payment_method,
                'status'            => $request->status,
                'note'              => $request->note,
            ]);

            if($request->status){
                User::find($request->user_id)->increment('credits', $request->count);
            }
        }
        
        return new TransactionResource($transaction);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = Student::findOrFail($id);
        return view('back-end.student.edit', compact('student'));
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
            'password' => 'required|confirmed|min:6',
            'username' => 'min:5|unique:users,username,' . $id,
            'email' => 'nullable|unique:users,email,' . $id
        ]);

        $teacher = Student::find($id);
        $teacher->name = $request->name;
        $teacher->gender = $request->gender;
        $teacher->dob = $request->dob;
        $teacher->contact_number = $request->contact_number;
        $teacher->email = $request->email;

        $teacher->username = $request->username;

        if($request->password){
            $teacher->password = bcrypt($request->password);
        }

        $teacher->save();

        if(!$request->ajax()){
            return redirect()->route('back-end.student.index');
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
            Student::find($id)->delete();
        }
        
        if(!$request->ajax()){
            return back();
        }
    }

    public function deletemultiple(Request $request)
    {
        if($request->item_checked){
           foreach($request->item_checked as $id){
                Student::find($id)->delete();
            }
        }

        if(!$request->ajax()){
            return back();
        }
    }
}
