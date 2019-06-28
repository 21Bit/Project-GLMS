<?php

namespace App\Http\Controllers\Teacher;

use App\Models\Mistake;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MistakeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $this->validate($request, [
            'mistake'   => 'required|string',
            'correction'   => 'required'
        ]);

        $mistake = new Mistake;
        $mistake->slot_id = $request->slot;
        $mistake->mistake = $request->mistake;
        $mistake->correction = $request->correction;
        $mistake->user_id = $request->user()->id;
        $mistake->save();
        
        if(request()->ajax()){
            return $mistake;
        }else{
            return back();
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Mistake::findOrFail($id)->delete();
        
        if(!request()->ajax()){
            return back();
        }

    }
}
