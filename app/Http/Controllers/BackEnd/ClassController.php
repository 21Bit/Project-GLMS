<?php

namespace App\Http\Controllers\BackEnd;

use DataTables;
use App\Models\Slot;
use Illuminate\Http\Request;
use Yajra\DataTables\Html\Builder;
use App\Http\Controllers\Controller;

class ClassController extends Controller
{
    public function index(Builder $builder)
    {
        if (request()->ajax()) {
            $classes = Slot::where('student', '!=', null)->get();
            return DataTables::of($classes)
              ->addColumn('action', function ($class) {
                  $buttons = '';
                  $buttons .= '<a href="' . route('back-end.class.show', $student->id) . '" class="btn btn-primary mr-1"><i class="fa fa-eye"></i> Show </a>';
                  return $buttons;
              })
              ->addColumn('check', function ($class) {
                  return '<input type="checkbox" name="item_checked[]" value="' . $class->id . '" >';
              })
              ->addColumn('student', function($class){
                    if($class->student){
                        return $class->student->name;
                    }
              })
              ->addColumn('teacher', function($class){
                    if($class->teacher){
                        return $class->teacher->name;
                    }
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
          ],
      
          [
              'data' => 'student', 
              'name' => 'student', 
              'title' => "Student"
          ],
          [
              'data' => 'teacher', 
              'name' => 'teacher', 
              'title' => "Teacher"
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
              'data' => 'attendance_status', 
              'name' => 'attendance_status', 
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
  
      return view('back-end.class.index', compact('html'));
      
    }
   
}
