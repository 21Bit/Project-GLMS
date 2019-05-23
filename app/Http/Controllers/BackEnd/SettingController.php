<?php

namespace App\Http\Controllers\BackEnd;

use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SettingController extends Controller
{
    public function index(Request $request)
    {
        return view('back-end.setting.' . $request->type);
    }

    public function store(Request $request)
    {
        // $rules = Setting::getValidationRules($request->file);
        
        // $data = $this->validate($request, $rules);

        // $validSettings = array_keys($rules);
        
        foreach ($request->all() as $key => $val) {
            // if (in_array($key, $validSettings)) {
                Setting::add($key, $val, Setting::getDataType($key));
            // }
        }

        return redirect()->back()->with('status', "Setting Saved");
    }
}
