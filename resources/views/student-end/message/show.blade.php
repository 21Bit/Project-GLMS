@extends('layouts.student')

@section('title', "My Page | Message")

@section('header')
    <div class="panel-header panel-header-sm">
    </div>
@endsection

@section("content")
    <div class="content">
        <div class="row">
            <div class="col-sm-8">
                <div class="card">
                    <div class="card-body">
                        <div class="dropdown pull-right">
                            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="{{ route('student.message.edit', $message->id) }}?self=1">Edit</a>
                                <a class="dropdown-item" onclick="if(confirm('Are you sure to delete?')){ $('#message-{{ $message->id }}').submit(); return false;  }"  href="#">Delete</a>
                                <form style='display:none' id="message-{{$message->id}}" action="{{ route('student.message.destroy', $message->id) }}?self=1" method="post">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </div>
                        </div>
                        <h4 class="mt-2 mb-0">
                            @if($message->teacher)
                                {{ optional($message->teacher)->name }}
                            @else
                                Administrator
                            @endif
                        </h4>
                        <label>
                            {{ $message->created_at }}
                        </label>
                        <br />

                        {!! $message->content  !!}
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-body">
                        <h5>Replies</h5>
                         @forelse($message->comments as $comment)
                            <div class="media" id="comment-{{$comment->id}}">
                                <img class="align-self-start mr-3 rounded-circle" src="{{ $comment->user->getPicturePath(false) }}" alt="Generic placeholder image">
                                <div class="media-body">
                               
                                    @if($comment->user_id == Auth::user()->id)
                                        <button type="button" class="close remove-comment" id="{{ $comment->id }}" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    @endif
                                    <h6 class="mt-0 mb-0">{{ $comment->user->name }}</h6>
                                    <small class="mb-1 d-block text-muted">{{ $comment->created_at->diffForHumans() }}</small>
                                    <p>{{ $comment->message }}</p>
                                </div>
                            </div>
                        @empty
                            <h5 class="text-muted text-center mb-5 mt-5">No comment yet</h5>
                        @endforelse
                        <form action="{{ route('student.message.sendComment', $message->id) }}" method="post">
                            @csrf
                            <div class="input-group mb-3 p-0">
                                <input type="text" name="message" required class="form-control form-control-xs border-0" placeholder="type your comment here.." aria-label="Recipient's username" aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-secondary" type="submit">Send</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
@include('back-end.includes.component.tinymce')
@endpush
