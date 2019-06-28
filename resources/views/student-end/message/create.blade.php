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
                        <form action="{{ route('student.message.store') }}" method="post">
                            @csrf
                            <p>
                                <label for="">To</label>
                                <select name="teacher" class="form-control rounded-0">
                                    <option value="">Administrator</option>
                                    @foreach($recipients as $recipient)
                                        <option value="{{ $recipient->id }}">{{ $recipient->name }}</option>
                                    @endforeach
                                </select>
                            </p>
                            <textarea name="content" class="editor" id="" cols="30" rows="10"></textarea>    
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="{{ route('student.message.index') }}" class="btn btn-secondary">Cancel</a>
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
