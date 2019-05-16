@extends('layouts.back-end')

@section('title', 'Creating Teacher')

@section('content')
	<ol class="breadcrumb pull-right">
		<li class="breadcrumb-item"><a href="">Home</a></li>
		<li class="breadcrumb-item"><a href="{{ route("back-end.teacher.index") }}">Teacher</a></li>
		<li class="breadcrumb-item active">Create New Teacher</li>
	</ol>

	<h1 class="page-header">Teacher</h1>
    @include("back-end.includes.component.error-alert")
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-inverse">
				<div class="panel-heading">
					<h4 class="panel-title">Create Teacher</h4>
				</div>
                <div class="panel-body">
                   <form action="{{ route('back-end.teacher.store') }}" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-sm-2">
                                <div class="card rounded-0">
                                    <div class="card-body p-2">
                                        <div class="profile-image-edit">
                                            <img src="/images/placeholders/placeholder.png" id="image-preview" class="mw-100" alt="">
                                            <label class="btn btn-secondary btn-sm mt-1" for="image-input"> <i class="fa fa-upload"></i> Upload</label>
                                            <input type="hidden" name="cropped_image" >
                                            <input type="file"  id="image-input" name="picture" class="d-none" accept="image/*">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="card rounded-0">
                                    <div class="card-body p-2">
                                        {{ csrf_field() }}
                                        <p>
                                            <label for="">Name</label>
                                            <input type="text" required name="name" value="{{ old('name') }}" class="form-control rounded-0">
                                        </p>
                                        <p>
                                            <label for="">Gender</label>
                                            <select name="gender" required id="" class="form-control  rounded-0">
                                                <option value="Female">Female</option>
                                                <option value="Male" @if(old('gender') == "Male") selected @endif>Male</option>
                                            </select>
                                        </p>
                                        <p>
                                            <label for="">Username</label>
                                            <input type="text"  value="{{ old('username') }}" name="username" required class="form-control rounded-0">
                                        </p>
                                        <p>
                                            <label for="">Password</label>
                                            <input type="password" name="password" class="form-control rounded-0">
                                        </p>
                                        <p>
                                            <label for="">Repeat Password</label>
                                            <input type="password" name="password_confirmation" class="form-control rounded-0">
                                        </p>
                                        <p>
                                            <button type="submit" class="btn btn-primary mr-1"><i class="fa fa-save"></i> Save</button>
                                            <a href="{{ route("back-end.teacher.index") }}" class="btn btn-secondary"><i class="fa fa-ban"></i> Discard</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
				</div>
				<!-- end panel-body -->
			</div>
			<!-- end panel -->
		</div>
		<!-- end col-10 -->
	</div>
	<div class="modal" id="cropper-modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <label>Crop Image</label>
                    <div id="crop-image-container"></div>
                    <button id="crop-done-btn" class="btn btn-primary btn-lg">Done</button>
                </div>
            </div>
        </div>
    </div>
@endsection


