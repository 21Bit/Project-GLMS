<?php

namespace App\Http\Controllers\Student;

use Auth;
use App\Models\Slot;
use App\Models\User;
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
    public function index()
    {
        $messages = Message::orderBy('created_at', 'DESC')->paginate(10);
        return view('student-end.message.index', compact('messages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $recipients = $this->getRecipients(Auth::user()->id);
        return view('student-end.message.create', compact('recipients'));
    }

    function getRecipients($userId){
        $classTeachers = Slot::where('student_id', $userId)->pluck('user_id');
        return User::find($classTeachers);
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
            'content' => 'required',
        ]);

        $message = new Message;
        $message->user_id = $request->user()->id;
        $message->teacher = $request->teacher ? $request->teacher : "0";
        $message->content = $request->content;
        $message->save();

        return redirect()->route('student.message.index');
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
        return view('student-end.message.show', compact('message'));
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
        $message = Message::findOrFail($id);   
        $recipients = $this->getRecipients(Auth::user()->id);
        request('self') ? $cancellink = route('student.message.show', $message->id) :  $cancellink = route('student.message.index');
        return view('student-end.message.edit', compact('message', 'recipients', 'cancellink'));
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
            'content' => 'required',
        ]);

        $message = Message::find($id);
        $message->teacher = $request->teacher ? $request->teacher : "0";
        $message->content = $request->content;
        $message->save();

        return redirect()->route('student.message.index');
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
        
        if($message->comments()->count() > 0){
            $message->comments()->delete();
        }
        
        $message->delete();

        if(!request()->ajax()){
            if(request('self')){
                return redirect()->route('student.message.index');
            }
            return back();
        }
    }
}
