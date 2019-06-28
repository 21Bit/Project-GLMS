@extends('layouts.student')

@section('title', "My Page Dashboard")
@section('header')
     <div class="panel-header">
        <div class="header text-center">
            <img src="{{ request()->user()->getPicturePath() }}" class="mw-100 rounded-circle" style="width: 80px" alt="">
          <h2 class="title">Hello! {{ auth()->user()->name }}</h2>
        </div>
      </div>
@endsection

@section("content")
    <div class="row">
        <div class="col-sm-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">Today's Class</h5>
                </div>
                <div class="card-body">
                    @forelse($classes as $class)
                        <a href="{{ route('student.class.show', $class->id) }}">
                            <div class="media">
                                <img class="align-self-start mr-3 rounded-circle" src="{{ $class->teacher->getPicturePath(false) }}" alt="Generic placeholder image">
                                <div class="media-body">
                                    <h6 class="mt-0 mb-0">{{ $class->teacher->name }}</h6>
                                    <small class="mb-1 d-block text-muted">{{ date('h:iA', strtotime($class->date_time)) }} <br> {{ date('M d, Y', strtotime($class->date_time)) }}</small>
                                    <hr>
                                </div>
                            </div>
                        </a>
                    @empty
                        <h5 class="text-muted text-center mb-5 mt-5">No class</h5>
                    @endforelse
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">Recent Messages</h5>
                </div>
                <div class="card-body">
                    @forelse($messages as $message)
                        <div class="media" id="comment-{{$message->id}}">
                            <img class="align-self-start mr-3 rounded-circle" src="{{ $message->user->getPicturePath(false) }}" alt="Generic placeholder image">
                            <div class="media-body">
                                <h6 class="mt-0 mb-0">{{ $message->user->name }}</h6>
                                <small class="mb-1 d-block text-muted">{{ $message->created_at->diffForHumans() }}</small>
                                <small>
                                    {{ str_limit(strip_tags($message->content), 100) }}
                                </small>
                                <hr>
                            </div>
                        </div>
                    @empty
                        <h5 class="text-muted text-center mb-5 mt-5">No Message</h5>
                    @endforelse
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">Recent Transactions</h5>
                </div>
                <div class="card-body">

                </div>
            </div>
        </div>
       
    </div>
@endsection