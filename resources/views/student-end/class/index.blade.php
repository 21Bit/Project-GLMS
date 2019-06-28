@extends('layouts.student')

@section('title', "My Page | Classes")

@section('header')
    <div class="panel-header panel-header-sm">
    </div>
@endsection

@section("content")
    <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div id="calendar" data-render="calendar" data-url="{{ route('student.class.slots') }}"></div>
                </div>
            </div>
        </div>
    </div>
@endsection