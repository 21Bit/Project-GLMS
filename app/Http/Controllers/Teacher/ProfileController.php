<?php

namespace App\Http\Controllers\Teacher;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    public function index()
    {
        return view('teacher.profile.index');
    }

    public function changepassword(){
        return view('teacher.profile.change-password'); 
    }

    public function validatePassword(Request $request){
        $this->validate($request,[
            'password' => 'required|string|min:6|confirmed',
        ]);

        if (\Hash::check($request->current, \Auth::user()->password))
        {
            $user = Auth::user();
            $user->password = bcrypt($request->password);
            $user->save();
            \Session::flash('message', "Your password had been change succesfully");
            \Session::flash('alert-class', 'alert-success');
        }else{
            \Session::flash('message', "Current Password not match");
            \Session::flash('alert-class', 'alert-danger');
        }

        return redirect()->back();
    }
}
