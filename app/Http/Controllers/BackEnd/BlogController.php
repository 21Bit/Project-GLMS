<?php

namespace App\Http\Controllers\BackEnd;

use Lang;
use DataTables;
use App\Models\Blog;
use Illuminate\Http\Request;
use Yajra\DataTables\Html\Builder;
use App\Http\Controllers\Controller;

class BlogController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Builder $builder)
    {
        if (request()->ajax()) {
            $blogs = Blog::orderBy("created_at");//('blogs');

            return DataTables::of($blogs)
                ->addColumn('action', function ($book) {
                    return '<a href="' . route('back-end.blog.edit', $book->id) . '"><i class="fa fa-edit"></i> Edit</a>';
                })
                ->addColumn('check', function ($blog) {
                    return '<input type="checkbox" name="item_checked[]" value="' . $blog->id . '" >';
                })
                ->addColumn('author', function ($blog) {
                    return optional($blog->user)->name;
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

        return view('back-end.blog.index', compact('html'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back-end.blog.create');
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

        $blog = new Blog;
        $blog->slug = base_convert(time(), 10, 36);
        $blog->title = $request->title;
        $blog->content = $request->content;
        $blog->is_published = $request->status ? 1 : 0;
        $blog->user_id = $request->user()->id;
        $blog->save();
        
        return redirect()->route('back-end.blog.index')->with('succcess', Lang::get('message.item_created'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $blog = Blog::findOrFail($id);
        return view('back-end.blog.show', compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        return view('back-end.blog.edit', compact('blog'));
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

        $blog = Blog::find($id);
        $blog->title = $request->title;
        $blog->content = $request->content;
        $blog->is_published = $request->status ? 1 : 0;
        $blog->user_id = $request->user()->id;
        $blog->save();
        return redirect()->route('back-end.blog.index')->with('succcess', Lang::get('message.item_updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        foreach($request->ids as $id){
            Blog::find($id)->delete();
        }
        if(!$request->ajax()){
            return back();
        }
    }

    public function multidelete(Request $request)
    {
        if($request->item_checked){
           foreach($request->item_checked as $id){
                Blog::find($id)->delete();
            }
        }

        if(!$request->ajax()){
            return back();
        }
    }

   
}
