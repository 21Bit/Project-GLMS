@extends('layouts.student')

@section('title', "My Page: Change Password")

@section('header')
    <div class="panel-header panel-header-sm">
    </div>
@endsection

@section("content")
<div class="row">
          <div class="col-md-8">
            <div class="card">
              <div class="card-header">
                <h5 class="title">Change Password</h5>
              </div>
              <div class="card-body">
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if(Session::has('message'))
                    <BR>
                    <div class="alert {{ Session::get('alert-class', 'alert-info') }}" id="alert-box">{!! Session::get('message') !!}</div>
                @endif
                <form method="post"  action="{{ route('student.profile.validatepassword') }}">
                    @csrf
                    <div class="row">
                        <div class="col-sm-6">
                            
                            <form action="" method="post">
                                @csrf
                                <p>
                                    <label for="">Current Password</label>
                                    <input required class="form-control rounded-0" type="password" name="current" placeholder=" current password.." >
                                </p>
                                <hr>
                                <p>
                                    <label for="">New Password</label>
                                    <input required  class="form-control rounded-0" type="password" name="password" placeholder=" new password.." >
                                </p>
                                <p>
                                    <label for="">Repeat Password</label>
                                    <input required  class="form-control rounded-0" type="password" name="password_confirmation" placeholder=" repeat password.." >
                                </p>
                                <button class="btn btn-primary" type="submit">Submit</button>
                            </form>
                        </div>
                    </div>
                </form>
              </div>
            </div>
          </div>
        </div>
  
@endsection