<?php

namespace App\Http\Controllers\BackEnd;

use DataTables;
use Illuminate\Http\Request;
use App\Models\CreditPackage;
use Yajra\DataTables\Html\Builder;
use App\Http\Controllers\Controller;

class CreditPackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Builder $builder)
    {
        if (request()->ajax()) {
            $package = CreditPackage::orderBy("created_at");//('package');

            return DataTables::of($package)
                ->addColumn('action', function ($package) {
                    return '<a href="' . route('back-end.credit-package.edit', $package->id) . '"><i class="fa fa-edit"></i> Edit</a>';
                })
                ->addColumn('check', function ($package) {
                    return '<input type="checkbox" name="item_checked[]" value="' . $package->id . '" >';
                })
                ->addColumn('user', function ($package) {
                    return optional($package->user)->name;
                })
                ->addColumn('featured', function ($package) {
                    return $package->featured ? "<i class='fa fa-check'></i>" : "";
                })
                ->rawColumns(['check', 'action','user', 'featured'])
                ->make();
        }

        $html = $builder
              ->parameters([
                'order' => [ [3, 'ASC'] ],
                'pageLength' => 25,
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
                "width"          => "20px"
            ],
            [
                'data'          => 'credit',
                'name'          => 'credit',
                'title'         => "Credits",
                'searchable'    => True,
                'orderable'      => True,
            ],
            [
                'data'          => 'price',
                'name'          => 'price',
                'title'         => "Prices",
                'searchable'    => True,
                'orderable'      => True,
            ],
            [
                'data'          => 'note',
                'name'          => 'note',
                'title'         => "Note",
                'searchable'    => True,
                'orderable'      => True,
            ],
            [
                'data'          => 'user', 
                'name'          => 'user', 
                'title'         => "Created By",
            ],
            [
                'data'          => 'featured', 
                'name'          => 'featured', 
                'title'         => "Featured",
                'orderable'     => True,
                'width'         => '25px'
            ],
            [
                'data'          => 'created_at', 
                'name'          => 'created_at', 
                'title'         => "Created",
                'orderable'      => True,
            ],
            [
                'data'           => 'action',
                'name'           => 'action',
                'title'          => '',
                'render'         => null,
                'orderable'      => false,
                'searchable'     => false,
                'exportable'     => false,
                'printable'      => true,
                "align"          => "right"
            ],

        ])->parameters([
                'buttons' => ['export'],
                "iDisplayLength" => 50
        ]);

        return view('back-end.credit-package.index', compact('html'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("back-end.credit-package.create");
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
            'credit'    => 'required|integer',
            'price'     => "required|integer"
        ]);

        $creditPackage = new CreditPackage;
        $creditPackage->credit = $request->credit;
        $creditPackage->price = $request->price;
        $creditPackage->featured = $request->featured ? 1 : 0;
        $creditPackage->note = $request->note;
        $creditPackage->user_id = $request->user()->id;
        $creditPackage->save();

        if(!$request->ajax()){
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
        return view("back-end.credit-package.show");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $creditPackage = CreditPackage::findOrFail($id);
        return view("back-end.credit-package.edit", compact("creditPackage"));
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
            'credit'    => 'required|integer',
            'price'     => "required|integer"
        ]);

        $creditPackage = CreditPackage::findOrFail($id);
        $creditPackage->credit = $request->credit;
        $creditPackage->price = $request->price;
        $creditPackage->featured = $request->featured ? 1 : 0;
        $creditPackage->note = $request->note;
        $creditPackage->save();

        return redirect()->route("back-end.credit-package.index");
    }

    public function deletemultiple(Request $request)
    {
        $ids = $request->item_checked;
        if(count($ids)){
            foreach($ids as $id){
                $creditPackage = CreditPackage::find($id);
                $creditPackage->delete();
            }
        }

        if(!$request->ajax()){
            return redirect()->back()->with('message', Lang::get('label.item_deleted'));
        }
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
