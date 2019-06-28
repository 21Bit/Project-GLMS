<?php

namespace App\Http\Controllers\BackEnd;

use DataTables;
use App\Models\Creteria;
use Illuminate\Http\Request;
use Yajra\DataTables\Html\Builder;
use App\Http\Controllers\Controller;

class CreteriaController extends Controller
{

    public function index(Builder $builder)
    {
        if (request()->ajax()) {
            $creterias = Creteria::orderBy("created_at");//('package');

            return DataTables::of($creterias)
                ->addColumn('action', function ($creteria) {
                    return '<a href="' . route('back-end.creteria.edit', $creteria->id) . '"><i class="fa fa-edit"></i> Edit</a>';
                })
                ->addColumn('check', function ($creteria) {
                    return '<input type="checkbox" name="item_checked[]" value="' . $creteria->id . '" >';
                })
                ->rawColumns(['check', 'action'])
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
                'data'          => 'name',
                'name'          => 'name',
                'title'         => "Name",
                'searchable'    => True,
                'orderable'      => True,
            ],
            [
                'data'          => 'description',
                'name'          => 'description',
                'title'         => "Description",
                'searchable'    => True,
                'orderable'      => True,
            ],
            [
                'data'          => 'active', 
                'name'          => 'active', 
                'title'         => "Active",
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

        return view('back-end.creteria.index', compact('html'));
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
            'name' => 'required',
        ]);

        $creteria = new Creteria;
        $creteria->name = $request->name;
        $creteria->description = $request->description;
        $creteria->active = $request->active ? 1 : 0;
        $creteria->save();
        
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


    
    public function deletemultiple(Request $request)
    {
        if($request->item_checked){
           foreach($request->item_checked as $id){
                Creteria::find($id)->delete();
            }
        }

        if(!$request->ajax()){
            return back();
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
