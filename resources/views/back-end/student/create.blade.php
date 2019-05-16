@extends('layouts.back-end')

@section('title', 'Creating Book')

@section('content')
	<!-- begin breadcrumb -->
	<ol class="breadcrumb pull-right">
		<li class="breadcrumb-item"><a href="">Home</a></li>
		<li class="breadcrumb-item"><a href="{{ route("back-end.student.index") }}">Student</a></li>
		<li class="breadcrumb-item active">Create New Student</li>
		{{-- <li class="breadcrumb-item"><a href="javascript:;"></a></li> --}}
	</ol>
	<!-- end breadcrumb -->
	<!-- begin page-header -->
	<h1 class="page-header">Student</h1>
	<!-- end page-header -->
	
	<!-- begin row -->
	<div class="row">
		
		<div class="col-lg-12">
			<!-- begin panel -->
			<div class="panel panel-inverse">
				<!-- begin panel-heading -->
				<div class="panel-heading">
					<div class="panel-heading-btn">
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
					</div>
					<h4 class="panel-title">Create Student</h4>
				</div>
				<!-- end panel-heading -->
			
				<!-- begin panel-body -->
				<div class="panel-body">
                    <form action="{{ route('back-end.student.store') }}" method="post">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-2">
                                <img src="/images/placeholders/placeholder.png" alt="" class="mw-100">
                                <label for="profile-picture" class="btn btn-xs  btn-secondary mt-2"><i class="fa fa-upload"></i> Upload</label>
                                <input type="file" id="profile-picture" accept="image/*" class="d-none">
                            </div>
                            <div class="col-sm-5">
                                <p>
                                    <label for="">Username *</label>
                                    <input type="text" required value="{{ old('username') }}" name="username" class="form-control rounded-0">
                                </p>
                                <p>
                                    <label for="">Password *</label>
                                    <input type="password" required name="password" class="form-control rounded-0">
                                </p>
                                <p>
                                    <label for="">Repeat Password *</label>
                                    <input type="password" required name="password_confirmation" class="form-control rounded-0">
                                </p>
                            </div>
                            <div class="col-sm-5">
                                <p>
                                    <label for="">Name *</label>
                                    <input type="text" required  value="{{ old('name') }}" name="name" class="form-control rounded-0">
                                </p>
                                <p>
                                    <label for="">Gender *</label>
                                    <select name="gender" id="" class="form-control rounded-0">
                                        <option value="Male">Male</option>
                                        <option value="Female" @if(old('gender') == "Female") selected @endif>Female</option>
                                    </select>
                                </p>
                                <p>
                                    <label for="">Contact Number *</label>
                                    <input type="text" value="{{ old('contact_number') }}"  required name="contact_number" class="form-control rounded-0">
                                </p>
                                <p>
                                    <label for="">Date Of Birth *</label>
                                    <input type="date"  value="{{ old('dob') }}"  required name="dob" class="form-control rounded-0">
                                </p>
                                <p>
                                    <label for="">Email Address</label>
                                    <input type="email" value="{{ old('email') }}"  required name="email" class="form-control rounded-0">
                                </p>
                                <p>
                                    <button class="btn btn-primary" type="submit"><i class="fa fa-save"></i> Save</button>
                                </p>
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
@endsection

@push('scripts')

@endpush