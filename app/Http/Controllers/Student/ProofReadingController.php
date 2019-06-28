<?php

namespace App\Http\Controllers\Student;

use App\Models\ProofReading;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProofReadingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proofreadings = ProofReading::where('user_id', auth()->user()->id)->orderBy('created_at', 'DESC')->paginate(15);
        return view('student-end.proofreading.index', compact('proofreadings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("student-end.proofreading.create");
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
            'content' => 'required'
        ]);

        $pr = new ProofReading;
        $pr->content = $request->content;
        $pr->user_id = $request->user()->id;
        $pr->save();
        
        return redirect()->route('student.proofreading.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $proofreading = ProofReading::findOrFail($id);
        return view('student.proofreading.show', compact('proofreading'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $proofreading = ProofReading::findOrFail($id);
        return view('student.proofreading.edit', compact('proofreading'));
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
        //
    }
}
