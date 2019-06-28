@extends('layouts.teacher')

@section('title', "My Page Dashboard")
@section('header')
     <div class="panel-header">
        <div class="header text-center">
          <h2 class="title">Hello! {{ auth()->user()->name }}</h2>
          <h5 class="title">we hope you are okay!</h5>
        
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

                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">New Proof Readings</h5>
                </div>
                <div class="card-body">

                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">Recent Messages</h5>
                </div>
                <div class="card-body">

                </div>
            </div>
        </div>
    </div>
@endsection