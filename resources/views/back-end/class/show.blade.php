@extends('layouts.back-end')

@section('title', $student->name ." Class")


@section('content')
	<ol class="breadcrumb pull-right">
		<li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
		<li class="breadcrumb-item"><a href="{{ route('back-end.class.index') }}">All Classes</a></li>
		<li class="breadcrumb-item active">All Classes</li>
    </ol>
    
	<h1 class="page-header">Class Manager</h1>

    <form action="{{ route('back-end.class.update', $class->id) }}" method="post">
        @csrf
        @method("PUT")
        <div class="row">
            <div class="col-sm-6">
                <div class="panel panel-inverse">
                    <div class="panel-body pb-2">
                        <div class="d-flex flex-row pb-0">
                            <div class="w-50">
                                <h3>{{ date('h:i A', strtotime($class->date_time)) }}</h3>
                            </div>
                            <div class="text-center w-50">
                                    <h3>{{ date('F j, Y', strtotime($class->date_time)) }}</h3>
                            </div>
                            <div class="text-right w-50">
                                <div class="dropdown show">
                                    <button class="btn btn-secondary" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-cog"></i></button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                        <a class="dropdown-item" href="#"><i class="fa fa-ban"></i> Cancel Class</a>
                                        <a class="dropdown-item" href="#"><i class="fa fa-trash"></i> Delete Class</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="panel panel-inverse">
                            <div class="panel-body">
                                <div class="d-flex">
                                    <div>
                                        <img src="{{ $student->getPicturePath(false) }}" class="mw-100 rounded-circle mr-2" alt="">
                                    </div>
                                    <div>
                                        <div><a href="{{ route('back-end.student.show', $student->id) }}" target="_blank" class="mb-0 text-inverse" for="">{{  $student->name }}</a></div>
                                        <small>Student</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="panel panel-inverse">
                            <div class="panel-body teacher-class-panel-body">
                                <div class="d-flex">
                                    <div>
                                        <img src="{{ $class->teacher->getPicturePath(false) }}" class="mw-100 rounded-circle mr-2" alt="">
                                    </div>
                                    <div>
                                        <div><a href="{{ route('back-end.teacher.show', $class->teacher->id) }}" target="_blank" class="mb-0 text-inverse">{{  $class->teacher->name }}</a></div>
                                        <small>Teacher  &nbsp;&nbsp;&nbsp;<a href="#"  data-toggle="modal" data-target="#teacherModal" class="teacher-change-link">Change</a></small>
                                    </div>
                                </div>
                                <div class="mt-3">

                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    
                                    <form action="">
                                        <h5>Change Teacher</h5>
                                        <p>
                                            <label for="">Teacher</label>
                                            <select name="teacher_id" id="select2teacher" style="width:100%"></select>
                                        </p>
                                        <p>
                                            <button class="btn btn-success" type="submit">Submit</button>
                                        </p>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            
                <div class="panel panel-inverse">
                    <div class="panel-body pb-2">
                        @foreach($creterias as $creteria)
                            <div class="d-flex flex-row mb-4">
                                <div class="w-50">
                                    <h5 for="" class="mb-0">{{ $creteria->name }}</h5>
                                    <small>{{ $creteria->description }}</small>
                                </div>
                                <div class="w-50 text-right">
                                    <input type="number" value="{{ getRate($class->student_id, $class->id, $creteria->id) }}" name="creteria-{{ $creteria->id }}" min="0" max="10" class="form-control">
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            
            </div>
            <div class="col-sm-6">
                <div class="text-right mb-2">
                    <a href="{{ route('back-end.class.index') }}" class="btn btn-secondary"><i class="fa fa-ban"></i> Back</a>
                    <button class="btn btn-primary" type="submit"><i class="fa fa-save"></i> Save Changes</button>
                </div>
                <div class="panel panel-inverse">
                    <div class="panel-body pb-2">
                        <p>
                            <label for="">Status</label>
                            <select name="status" class="form-control">
                                <option value="ready">READY</option>
                                <option value="present" @if($class->attendance_status == 'present') selected @endif >PRESENT</option>
                                <option value="absent"  @if($class->attendance_status == 'absent') selected @endif >ABSENT</option>
                            </select>
                        </p>
                        <p>
                            <label for="">Comments</label>    
                            <textarea name="comment" class="editor" id="" cols="30" rows="10">{!! $class->comment !!}</textarea>    
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </form>

    
@endsection

@push('scripts')
@include('back-end.includes.component.tinymce')
@endpush