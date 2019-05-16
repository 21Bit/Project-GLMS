@extends('layouts.back-end', ['contentFullWidth' => true])

@section('title', $teacher->name)

@section('content')
    <div class="profile">
        <div class="profile-header">
            <div class="profile-header-cover" style="background-image:url('/back-end/img/profile-cover.jpg')"></div>
            <div class="profile-header-content">
                <div class="profile-header-img">
                    <img src="{{ $teacher->getPicturePath() }}" alt="">
                </div>
                <div class="profile-header-info">
                    <h4 class="m-t-10 m-b-5">{{ $teacher->name }}</h4>
                    <p class="m-b-10">Teacher</p>
                    <a href="{{ route("back-end.teacher.edit", $teacher->id) }}" class="btn btn-xs btn-yellow">Edit Profile</a>
                </div>
            </div>
            <ul class="profile-header-tab nav nav-tabs">
                <li class="nav-item"><a href="{{ route('back-end.teacher.show', $teacher->id) }}" class="nav-link active"><i class="fa fa-list"></i> Slots</a></li>
                <li class="nav-item"><a href="{{ route('back-end.teacher.show.class', $teacher->id) }}" class="nav-link"><i class="fa fa-calendar"></i> Class</a></li>
                <li class="nav-item"><a href="{{ route('back-end.teacher.show.activity', $teacher->id) }}" class="nav-link"><i class="fa fa-clock"></i> Activity</a></li>
            </ul>
            <!-- END profile-header-tab -->
        </div>
    </div>
    <div class="profile-content">
		<div class="tab-content p-0">
            <div class="row mb-4">
                <div class="col-sm-3">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('back-end.teacher.slot.store',  $teacher->id) }}" id="slotForm" method="post">
                                {{ csrf_field() }}
                                <p>
                                    <label for="">Date *</label>
                                    <input type="date" name="date" value="{{ date('Y-m-d') }}" class="form-control">
                                </p>
                                <p> 
                                    <label for="">Time *</label>
                                    <select name="time"  required id="" class="form-control">
                                        <option value="">- select time -</option>
                                        @foreach(time_select() as $time)
                                            <option value="{{ dateFormat('H:i',$time) }}">{{ dateFormat('h:i A',$time) }}</option>
                                        @endforeach
                                    </select>
                                </p>
                                <p>
                                    <label for="">Minutes *</label>
                                    <select name="minutes" required id="" class="form-control">
                                        <option value="">- select minutes - </option>
                                        {{-- <option value="20">20 mins.</option> --}}
                                        <option selected value="30">30 mins.</option>
                                    </select>
                                </p>
                                <p>
                                    <div class="pretty p-switch p-fill p-default d-block mb-2">
                                        <input type="checkbox" name="multiple" id="otherFunctionsBtn" >
                                        <div class="state p-primary">
                                            <label>Multiple</label>
                                        </div>
                                    </div>
                                    {{-- <p>
                                        <span class="text-muted m-l-5 m-r-20">Multiple</span>
                                        <input type="checkbox" data-render="switchery" data-theme="primary" />
                                    </p> --}}
                                </p>
                                <div style="display:none" id="otherFunctions">
                                    <hr>
                                    <p>
                                        <label>Day</label>
                                        <div class="pretty p-default d-block mb-2">
                                            <input type="checkbox" name="days[]" value="1">
                                            <div class="state p-primary">
                                                <label>Mon</label>
                                            </div>
                                        </div>
                                        <div class="pretty p-default d-block mb-2">
                                            <input type="checkbox" name="days[]" value="2">
                                            <div class="state p-primary">
                                                <label>Tue</label>
                                            </div>
                                        </div>
                                        <div class="pretty p-default d-block mb-2">
                                            <input type="checkbox" name="days[]" value="3">
                                            <div class="state p-primary">
                                                <label>Wed</label>
                                            </div>
                                        </div>
                                        <div class="pretty p-default d-block mb-2">
                                            <input type="checkbox" name="days[]" value="4">
                                            <div class="state p-primary">
                                                <label>Thur</label>
                                            </div>
                                        </div>
                                        <div class="pretty p-default d-block mb-2">
                                            <input type="checkbox" name="days[]" value="5">
                                            <div class="state p-primary">
                                                <label>Fri</label>
                                            </div>
                                        </div>
                                    </p>
                                    <br>
                                    <p>
                                        <label for="">Date to</label>
                                        <input type="date" value="{{ date('Y-m-d') }}" name="date_to" class="form-control">
                                    </p>
                                </div>
                                <p>
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Add Slots</button>
                                </p>
                            </form>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body"> 
                            <label>Other Functions</label>
                            <!-- <a href="#" class="d-block"><i class="fa fa-trash"></i> Delete All Slots</a>
                            <a href="#" class="d-block"><i class="fa fa-trash"></i> Delete Slots Except</a> -->
                        </div>
                    </div>
                </div>
                <div class="col-sm-9">
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-3">
                                <a href="#"  class="mb-3 mr-3" id="reloadCalendar"><i class="fa fa-refresh"></i> Refresh</a>
                                <div class="pretty p-switch p-fill p-default d-block mb-2 pull-right">
                                    <input type="checkbox" name="multiple"  id="deleteMode" >
                                    <div class="state p-danger">
                                        <label>Delete Mode</label>
                                    </div>
                                </div>
                            </div>

                            <div id="calendar" data-render="calendar" data-url="{{ route("back-end.teacher.slot.getslot", $teacher->id) }}"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
