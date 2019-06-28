@extends('layouts.back-end')

@section('title', 'All Message')

@push('css')
	<link href="/back-end/plugins/datatables/css/dataTables.bootstrap4.css" rel="stylesheet" />
	<link href="/back-end/plugins/datatables/css/fixedHeader/fixedHeader.bootstrap4.min.css" rel="stylesheet" />
	<link href="/back-end/plugins/datatables/css/responsive/responsive.bootstrap4.css" rel="stylesheet" />
@endpush

@section('content')
	<!-- begin breadcrumb -->
	<ol class="breadcrumb pull-right">
		<li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
		<li class="breadcrumb-item active">All messages</li>
	</ol>
	<h1 class="page-header">Message</h1>
	<div class="row">
		<div class="col-lg-12">
            <div class="row">
                <div class="col-sm-8">
                    <div class="panel panel-inverse">
                        <div class="panel-body">
                            <div class="dropdown">
                                <button class="btn pull-right btn-outline dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                     <a class="dropdown-item" onclick="if(confirm('Are you sure to delete?')){ $('#message-{{ $message->id }}').submit(); return false;  }"  href="#">Delete</a>
                                        <form style='display:none' id="message-{{$message->id}}" action="{{ route('back-end.message.destroy', $message->id) }}?self=1" method="post">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                </div>
                            </div>
                            <h4 class="mb-0">
                                {{ optional($message->user)->name }}
                            </h4>
                            <label for=""><i class="fa fa-clock-o"></i>{{ $message->created_at }}</label> <br />
                            {!! $message->content !!}    
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                        <div class="panel panel-default ">
                            <div class="panel-body">
                            <h5>Comments</h5>
                                @forelse($message->comments as $comment)
                                    <div class="media" id="comment-{{$comment->id}}">
                                        <img class="align-self-start mr-3 rounded-circle" src="{{ $comment->user->getPicturePath(false) }}" alt="Generic placeholder image">
                                        <div class="media-body">

                                            <button type="button" class="close remove-comment" id="{{ $comment->id }}" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            
                                            <h6 class="mt-0 mb-0">{{ $comment->user->name }}</h6>
                                            <small class="mb-1 d-block">{{ $comment->created_at->diffForHumans() }}</small>
                                            <p>{{ $comment->message }}</p>
                                        </div>
                                    </div>
                                @empty
                                    <h5 class="text-muted text-center mb-5 mt-5">No comment yet</h5>
                                @endforelse
                                <form action="{{ route('back-end.message.sendComment', $message->id) }}" method="post">
                                    @csrf
                                    <div class="input-group mb-3">
                                        <input type="text" name="message" required class="form-control" placeholder="type your comment here.." aria-label="Recipient's username" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary" type="submit">Send</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
            </div>
		</div>
	</div>
@endsection

