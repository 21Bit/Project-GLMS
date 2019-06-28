@extends('layouts.back-end')

@section('title', "Edit Class")


@section('content')
	<ol class="breadcrumb pull-right">
		<li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
		<li class="breadcrumb-item"><a href="{{ route('back-end.class.index') }}">All Classes</a></li>
		<li class="breadcrumb-item active">Edit Class</li>
    </ol>
    
	<h1 class="page-header">Class Manager</h1>
  
    <form action="{{ route('back-end.class.update', $class->id) }}" method="post">
        @csrf
        @method("PUT")
        <div class="row">
            <div class="col-sm-6">
                 <div class="text-right mb-2">
                    <a href="{{ route('back-end.class.show', $class->id) }}" class="btn btn-secondary"><i class="fa fa-ban"></i> Back</a>
                    <button class="btn btn-primary" type="submit"><i class="fa fa-save"></i> Save Changes</button>
                </div>
                <div class="panel panel-inverse">
                    <div class="panel-body pb-2">
                        <p>
                            <label for="">Teacher</label>
                            <select name="teacher_id" id="select2teacher" style="width:100%"></select>
                        </p>
                        <p>
                            <label for="">Time</label>
                        </p>
                    </div>
                </div>
            </div>
        </div>

    </form>
@endsection