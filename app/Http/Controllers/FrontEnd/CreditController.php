<?php

namespace App\Http\Controllers\FrontEnd;

use Session;
use Illuminate\Http\Request;
use App\Models\CreditPackage;
use App\Http\Controllers\Controller;

class CreditController extends Controller
{

    public function index()
    {
        $featured = CreditPackage::where('featured', 1)->orderBy("credit", "DESC")->get();
        $packages = CreditPackage::where("featured",'!=', 1)->orderBy("credit",'ASC')->get();
        return view("front-end.credit.index", compact("featured","packages"));
    }

    public function saveSelection(Request $request){
        Session::forget("creditPackages");
        Session::push('creditPackages', $request->package);
        return redirect()->route("front-end.credit.checkout");
    }

    public function checkout(){
        return view("front-end.credit.checkout");
    }

}
