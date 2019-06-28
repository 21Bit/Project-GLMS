@extends('layouts.student')

@section('title', "My Page | Message")

@section('header')
    <div class="panel-header panel-header-sm">
        <div class="header text-center">
            <h2 class="title">Message</h2>
        </div>
    </div>
@endsection

@section("content")
    <div class="content">
        <a href="{{ route('student.message.create') }}" class="btn btn-primary pull-right mt-5"><i class="now-ui-icons ui-1_simple-add"></i></a>
        <div class="clearfix"></div>
        <div class="message-list">
            @forelse($messages as $message)
                <div class="card">
                    <div class="card-body text-dark">
                        <div class="mb-2">
                            <a href="{{ route('student.message.show', $message->id) }}" class="text-dark content">
                                {!! str_limit(strip_tags($message->content), 350) !!}
                            </a>
                        </div>
                        
                        <span>
                            <i class="fa fa-comment"></i> {{ count($message->comments) }} comments
                        </span>
                        <span class="pull-right mb-2">
                            <a href="{{ route('student.message.show', $message->id) }}" class="mr-3">Show</a>
                            <a href="{{ route('student.message.edit', $message->id) }}" class="mr-3">Edit</a>
                            <a href="#" onclick="if(confirm('Are you sure to delete?')){ $('#message-{{ $message->id }}').submit(); return false;  }" class="mr-3">Delete</a>
                            <form style='display:none' id="message-{{$message->id}}" action="{{ route('student.message.destroy', $message->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                            </form>
                            <label for="" >Date Created: June 21, 2019</label>
                        </span>
                    </div>
                </div>
            @empty
                <h4 class="text-center mt-5 text-muted">No Message Yet</h4>
            @endforelse
        </div>
    </div>
@endsection