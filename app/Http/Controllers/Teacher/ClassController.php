<?php

namespace App\Http\Controllers\Teacher;

use Auth;
use App\Models\Slot;
use App\Models\Creteria;
use App\Models\CreteriaRate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Teacher\SlotCollection;

class ClassController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $classes = Slot::where('student_id', '!=', Auth::user()->id)->orderBy('date_time','ASC')->paginate(15);
        return view('teacher.class.index');
    }

    function slots(){
        $classes = Auth::user()->slots()->where("student_id", '!=', null)->get();
        return new SlotCollection($classes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $class = Slot::findOrFail($id);
        $student = Auth::user();
        $creterias = Creteria::where("active", 1)->get();
        return view('teacher.class.show', compact('class', 'student', 'creterias'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
