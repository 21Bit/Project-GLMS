<?php

namespace App\Http\Controllers\BackEnd;

use DataTables;
use App\Models\Holiday;
use Illuminate\Http\Request;
use Yajra\DataTables\Html\Builder;
use App\Http\Controllers\Controller;

class HolidayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Builder $builder)
    {
        if(request()->ajax()){
            $holidays = Holiday::all();

            return Datatables::of($holidays)
                ->addColumn('action', function ($holiday) {
                    $buttons = '';
                    $buttons .= '<a href="' . route('back-end.holiday.edit', $holiday->id) . '" data-id="'. $holiday->id .'" class="editHoliday "><i class="fa fa-edit"></i> Edit </a>';
                    return $buttons;
                })
                ->addColumn('check', function ($holiday) {
                    return '<input type="checkbox" name="item_checked[]" value="' . $holiday->id . '" >';
                })
                ->rawColumns(['check', 'action'])
                ->make(true);
        }

        $html = $builder
            ->parameters([
                'responsive' => true
            ])
            ->columns([
            [
                'data' => 'check',
                'name' => '',
                'title' => '<input type="checkbox" id="checkAll" >',
                'render'         => null,
                'orderable'      => false,
                'searchable'     => false,
                'exportable'     => false,
                'printable'      => true,
                'width'          => "20px"
            ],
            [
                'data' => 'date', 
                'name' => 'date', 
                'title' => "Date"
            ],
            [
                'data' => 'name', 
                'name' => 'name', 
                'title' => "Name"
            ],
            [
                'data' => 'details', 
                'name' => 'details', 
                'title' => "Details"
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
        

        return view('back-end.holiday.index', compact('html'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'date'  => 'required|date'
        ]); 

        $holiday = new Holiday;
        $holiday->name = $request->name;
        $holiday->date = $request->date;
        $holiday->details = $request->details;
        $holiday->save();

        if(!$request->ajax()){
            return redirect()->route('back-end.holiday.index');
        }else{
            return $holiday;
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $holiday = Holiday::findOrFail($id);
        if(request()->ajax()){
            return $holiday;
        }else{

        }
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
        $this->validate($request,[
            'name' => 'required',
            'date'  => 'required|date'
        ]); 

        $holiday = Holiday::find($id);
        $holiday->name = $request->name;
        $holiday->date = $request->date;
        $holiday->details = $request->details;
        $holiday->save();

        if(!$request->ajax()){
            return redirect()->route('back-end.holiday.index');
        }else{
            return $holiday;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function multidelete(Request $request)
    {
        if($request->item_checked){
           foreach($request->item_checked as $id){
                Holiday::find($id)->delete();
            }
        }

        if(!$request->ajax()){
            return back();
        }
    }

    public function destroy(Request $request, $id)
    {
        
        Holiday::find($id)->delete();
    
        if(!$request->ajax()){
            return back();
        }

    }
}
