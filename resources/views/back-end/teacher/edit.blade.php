@extends('layouts.back-end')

@section('title', 'Edit ' . $teacher->name)

@section('content')
	<ol class="breadcrumb pull-right">
		<li class="breadcrumb-item"><a href="">Home</a></li>
		<li class="breadcrumb-item"><a href="{{ route("back-end.teacher.index") }}">Teacher</a></li>
		<li class="breadcrumb-item active">Edit {{ str_limit($teacher->name, 15) }}</li>
	</ol>

	<h1 class="page-header">Teacher</h1>

	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-inverse">
				<div class="panel-heading">
					<h4 class="panel-title">Edit Teacher</h4>
				</div>
                
                <div class="panel-body">
                   <form action="{{ route('back-end.teacher.update', $teacher->id) }}" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-sm-2">
                                <div class="card rounded-0">
                                    <div class="card-body p-2">
                                        <div class="profile-image-edit">
                                            @if($teacher->picture)
                                                <img src="{{ $teacher->getPicturePath() }}" id="image-preview" class="mw-100" alt="">
                                            @else
                                                <img src="/images/placeholders/placeholder.png" id="image-preview" class="mw-100" alt="">
                                            @endif
                                            <label class="btn btn-secondary btn-sm mt-1" for="image-input"> <i class="fa fa-upload"></i> Change Picture</label>
                                            <input type="hidden" name="cropped_image" >
                                            <input type="file"  id="image-input" name="picture" class="d-none" accept="image/*">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="card rounded-0">
                                    <div class="card-body p-2">
                                        @csrf
                                        @method("PUT")
                                        <p>
                                            <label for="">Name</label>
                                            <input type="text" required name="name" value="{{ $teacher->name }}" class="form-control rounded-0">
                                        </p>
                                        <p>
                                            <label for="">Gender</label>
                                            <select name="gender" required id="" class="form-control  rounded-0">
                                                <option value="Female">Female</option>
                                                <option value="Male" @if( $teacher->gender == "Male") selected @endif>Male</option>
                                            </select>
                                        </p>
                                        <p>
                                            <label for="">Username</label>
                                            <input type="text"  value="{{ $teacher->username }}" name="username" required class="form-control rounded-0">
                                        </p>
                                        <p>
                                            <label for="">Password <small>(consider changes password)</small></label>
                                            <input type="password" name="password" class="form-control rounded-0">
                                        </p>
                                        <p>
                                            <button type="submit" class="btn btn-primary mr-1"><i class="fa fa-save"></i> Save Changes</button>
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
	<!-- end row -->
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

