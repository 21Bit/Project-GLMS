@extends('layouts.student')

@section('title', "My Page | ProofReadings")

@section('header')
    <div class="panel-header panel-header-sm">
        <div class="header text-center">
            <h2 class="title">Proofreadings</h2>
        </div>
    </div>
@endsection

@section("content")
    <div class="content">
        <a href="{{ route('student.proofreading.create') }}" class="btn btn-primary pull-right mt-5"><i class="now-ui-icons ui-1_simple-add"></i></a>
        <div class="proofreading-list">
            @foreach($proofreadings as $proofreading)
                <div class="card">
                    <div class="card-body text-dark">
                        <div class="mb-2">
                        <a href="{{ route('student.proofreading.show', $proofreading->id) }}" class="text-dark content">
                            {!! str_limit(strip_tags($proofreading->content), 350) !!}
                        </a>
                        </div>
                        <span>
                            <i class="fa fa-comment"></i> {{ count($proofreading->comments) }} comments
                        </span>
                        <span class="pull-right mb-2">
                            <a href="" class="mr-3">Edit</a>
                            <a href="" class="mr-3">Delete</a>
                            <label for="" >Date Created: June 21, 2019</label>
                        </span>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection