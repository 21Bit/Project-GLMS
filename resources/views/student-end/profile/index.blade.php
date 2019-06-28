@extends('layouts.student')

@section('title', "My Page Dashboard")

@section('header')
    <div class="panel-header panel-header-sm">
    </div>
@endsection

@section("content")
<div class="row">
          <div class="col-md-8">
            <div class="card">
              <div class="card-header">
                <h5 class="title">Profile</h5>
              </div>
              <div class="card-body">
                <form>
                    <div class="row mb-3">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label>Username</label>
                          <input type="text" class="form-control" placeholder="Username" value="michael23">
                        </div>
                      </div>
                      <div class="col-md-8 pl-1">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Email address</label>
                          <input type="email" value="{{ auth()->user()->email }}" class="form-control" placeholder="Email">
                        </div>
                      </div>
                    </div>
                    <div class="row mb-3">
                      <div class="col-md-12 pr-1">
                        <div class="form-group">
                          <label>Name</label>
                          <input type="text" class="form-control" placeholder="Company" value="{{ auth()->user()->name }}">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label>Gender</label>
                          <select class="form-control">
                            <option value="Male">Male</option>
                            <option value="Female" @if(auth()->user()->gender == "Female") selected @endif>Female</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-4 px-1">
                        <div class="form-group">
                          <label>Contact Number</label>
                          <input type="text" class="form-control" placeholder="contact number" value="{{ auth()->user()->contact_number }}">
                        </div>
                      </div>
                    
                      <div class="col-md-4 pl-1">
                        <div class="form-group">
                          <label>Postal Code</label>
                          <input type="number" class="form-control" placeholder="ZIP Code">
                        </div>
                      </div>
                    </div>
                </form>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card card-user">
              <div class="image">
                <img src="/student/img/profile-bg.jpg" alt="...">
              </div>
              <div class="card-body">
                <div class="author">
                  <a href="#">
                    <img class="avatar border-gray" src="{{ auth()->user()->getPicturePath() }}" alt="...">
                    <h5 class="title">{{ auth()->user()->name }}</h5>
                  </a>
                  <p class="description">
                    {{ auth()->user()->username }}
                  </p>
                </div>
                <p class="description text-center">
                  "Lamborghini Mercy
                  <br> Your chick she so thirsty
                  <br> I'm in that two seat Lambo"
                </p>
              </div>
              <hr>
              <div class="button-container">
                <button href="#" class="btn btn-neutral btn-icon btn-round btn-lg">
                  <i class="fab fa-facebook-f"></i>
                </button>
                <button href="#" class="btn btn-neutral btn-icon btn-round btn-lg">
                  <i class="fab fa-twitter"></i>
                </button>
                <button href="#" class="btn btn-neutral btn-icon btn-round btn-lg">
                  <i class="fab fa-google-plus-g"></i>
                </button>
              </div>
            </div>
          </div>
        </div>
    {{-- <h4 class="title-header">Profile</h4>
    <form action="">
        <div class="row">
            <div class="col-sm-2">
                <img src="{{ auth()->user()->getPicturePath() }}" alt="" class="img img-responsive" >
                <input type="file" id="profile" style="display: none" name="profile">
                <label for="prifile" class="btn btn-default btn-xs mt-3">Change</label>
            </div>
            <div class="col-sm-10">
                <p class="mb-5">
                    <label for="">Name</label>
                    <input type="text" name="name" value="{{ auth()->user()->name }}" class="form-control">
                </p>
                <p class="mb-5">
                    <label for="">Contact Number</label>
                    <input type="text" name="name" value="{{ auth()->user()->contact_number }}" class="form-control">
                </p>
                <p class="mb-5">
                    <label for="">Gender</label>
                    <select name="gender" id="" class="form-control">
                        <option value="Male">Male</option>
                        <option value="Female" @if(auth()->user()->gender == "Female") selected @endif )>Female</option>
                    </select>
                </p>
                <p>
                    <button class="btn btn-primary" type="submit">Save Changes</button>
                </p>
            </div>
        </div>
    </form> --}}
@endsection