<?php

namespace App\Http\Controllers\BackEnd;

use App\Models\Comment;
use App\Models\Message;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->for == "teacher"){
            $messages = Message::where('teacher', '!=', 0)->paginate(15);
        }else{
            $messages = Message::where('teacher', '=', 0)->paginate(15);
        }

        return view('back-end.message.index', compact('messages'));
        
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $message = Message::findOrFail($id);
        return view('back-end.message.show', compact('message'));
    }

    public function sendComment(Request $request, $id){
        $notice = Message::findOrFail($id);
        $comment = new Comment;
        $comment->message = $request->message;
        $comment->user_id = $request->user()->id;
        $notice->comments()->save($comment);
        
        if(!$request->ajax()){
            return back();
        }
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
        $message = Message::findOrFail($id);

        if($message->comments){
            $message->comments()->delete();
        }

        $message->delete();

        if(!request()->ajax()){
            return redirect()->route('back-end.message.index');
        }
    }
}
