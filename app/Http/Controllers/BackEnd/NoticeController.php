<?php

namespace App\Http\Controllers\BackEnd;

use Lang;
use DataTables;
use App\Models\Notice;
use Illuminate\Http\Request;
use Yajra\DataTables\Html\Builder;
use App\Http\Controllers\Controller;

class NoticeController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Builder $builder)
    {
        if (request()->ajax()) {
            $notice = Notice::orderBy("created_at");//('notice');

            return DataTables::of($notice)
                ->addColumn('action', function ($notice) {
                    return '<a href="' . route('back-end.notice.edit', $notice->id) . '"><i class="fa fa-edit"></i> Edit</a>';
                })
                ->addColumn('check', function ($notice) {
                    return '<input type="checkbox" name="item_checked[]" value="' . $notice->id . '" >';
                })
                ->addColumn('author', function ($notice) {
                    return optional($notice->user)->name;
                })
                ->rawColumns(['check', 'action','author'])
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
                'data'          => 'title',
                'name'          => 'title',
                'title'         => "Title",
                'searchable'    => True,
                'orderable'      => True,
            ],
            [
                'data'          => 'author', 
                'name'          => 'author', 
                'title'         => "Author",
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

        return view('back-end.notice.index', compact('html'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back-end.notice.create');
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
            'title'     => 'string|required',
            'content'   => 'required'
        ]);

        $notice = new Notice;
        $notice->slug = base_convert(time(), 10, 36);
        $notice->title = $request->title;
        $notice->content = $request->content;
        $notice->is_published = $request->status ? 1 : 0;
        $notice->user_id = $request->user()->id;
        $notice->save();
        return redirect()->route('back-end.notice.index')->with('succcess', Lang::get('message.item_created'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $notice = Notice::findOrFail($id);
        return view('back-end.notice.show', compact('notice'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $notice = Notice::findOrFail($id);
        return view('back-end.notice.edit', compact('notice'));
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
            'title'     => 'string|required',
            'content'   => 'required'
        ]);

        $notice = Notice::find($id);
        $notice->title = $request->title;
        $notice->content = $request->content;
        $notice->is_published = $request->status ? 1 : 0;
        $notice->user_id = $request->user()->id;
        $notice->save();
        return redirect()->route('back-end.notice.index')->with('succcess', Lang::get('message.item_updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        foreach($request->ids as $id){
            Notice::find($id)->delete();
        }
        if(!$request->ajax()){
            return back();
        }
    }
}
