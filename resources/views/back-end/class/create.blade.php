@extends('layouts.back-end')

@section('title', "Create New Class")


@section('content')
	<ol class="breadcrumb pull-right">
		<li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
		<li class="breadcrumb-item"><a href="{{ route('back-end.class.index') }}">All Classes</a></li>
		<li class="breadcrumb-item active">Create Class</li>
    </ol>
    
	<h1 class="page-header">Class Manager</h1>
  
    <form action="{{ route('back-end.class.store') }}" method="post">
        @csrf
        <div class="row">
            <div class="col-sm-6">
                 <div class="text-right mb-2">
                    <a href="{{ route('back-end.class.index') }}" class="btn btn-secondary"><i class="fa fa-ban"></i> Back</a>
                    <button class="btn btn-primary" type="submit"><i class="fa fa-save"></i> Save Class</button>
                </div>
                <div class="panel panel-inverse">
                    <div class="panel-body pb-2">
                        <p>
                            <label for="">Teacher</label>
                            <select name="teacher_id" id="select2teacher" required  class="form-control"  ></select>
                        </p>
                        <p>
                            <label for="">Student</label>
                            <select name="student_id" id="select2student" required  class="form-control"  ></select>
                        </p>
                        <p>
                            <label for="">Minutes</label>
                            <select name="minutes" class="form-control" id="" required>
                                <option value="30">30mins</option>
                                <option value="20">20mins</option>
                                <option value="10">10mins</option>
                            </select>
                        </p>
                        <p>
                            <label for="">Time</label>
                            <select name="time" class="form-control" required id="select2">
                                @foreach(timeSequence() as $time)
                                    <option value="{{ $time }}">{{ date('h:i A',strtotime($time)) }}</option>
                                @endforeach
                            </select>
                        </p>
                        <p>
                            <label for="">Day</label>
                            <input type="date" name="date" class="form-control" value="{{ date('Y-m-d') }}" required>
                        </p>
                        <p>
                            <label for="goto"><input id="goto" type="checkbox" name="gotoclass"> Redirect to this Class</label>
                        </p>
                    </div>
                </div>
            </div>
        </div>

    </form>
@endsection