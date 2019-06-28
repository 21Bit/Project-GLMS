@extends('layouts.student')

@section('title', "My Page | Message")

@section('header')
    <div class="panel-header panel-header-sm">
    </div>
@endsection

@section("content")
    <div class="content">
        <div class="row">
            <div class="col-sm-8 offset-sm-2">
                <div class="card">
                    <div class="card-body">
                        <h4 class="mt-2">Message</h4>
                        <form action="{{ route('student.message.update', $message->id) }}" method="post">
                            @csrf
                            @method("PUT")
                            <p>
                                <label for="">To</label>
                                <select name="teacher" class="form-control rounded-0">
                                    <option value="" @if($message->teacher == "") selected @endif>Administrator</option>
                                    @foreach($recipients as $recipient)
                                        <option value="{{ $recipient->id }}"  @if($message->teacher == $recipient->id) selected @endif>{{ $recipient->name }}</option>
                                    @endforeach
                                </select>
                            </p>
                            <textarea name="content" class="editor" id="" cols="30" rows="10">{!!  $message->content  !!}</textarea>    
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                            <a href="{{ $cancellink }}" class="btn btn-secondary">Cancel</a>
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
