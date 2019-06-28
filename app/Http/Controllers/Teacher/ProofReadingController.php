<?php

namespace App\Http\Controllers\Teacher;

use Auth;
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
        $proofreadings = ProofReading::where('teacher', Auth::user()->id)->orderBy('created_at', 'DESC')->paginate(15);
        return view('teacher.proofreading.index', compact('proofreadings'));
    }



    public function show($id)
    {
        $proofreading = ProofReading::findOrFail($id);
        return view('teacher.proofreading.show', compact('proofreading'));
    }


    public function update(Request $request, $id)
    {
        //
    }

}
