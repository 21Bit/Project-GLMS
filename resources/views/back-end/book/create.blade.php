@extends('layouts.back-end')

@section('title', 'Creating Book')

@section('content')
	<!-- begin breadcrumb -->
	<ol class="breadcrumb pull-right">
		<li class="breadcrumb-item"><a href="">Home</a></li>
		<li class="breadcrumb-item"><a href="{{ route("back-end.book.index") }}">Book</a></li>
		<li class="breadcrumb-item active">Create New Book</li>
		{{-- <li class="breadcrumb-item"><a href="javascript:;"></a></li> --}}
	</ol>
	<!-- end breadcrumb -->
	<!-- begin page-header -->
	<h1 class="page-header">Book</h1>
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
					<h4 class="panel-title">Create Book</h4>
				</div>
				<!-- end panel-heading -->
			
				<!-- begin panel-body -->
				<div class="panel-body">
                    <form action="{{route('back-end.book.store')}}" method="post">
                        {{csrf_field()}}
                        <div class="row">
                            <div class="col-12 mb-3">
                                <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                                    <label for="">Title</label>
                                    <input type="text" name="title" value="{{old('title')}}" class="form-control rounded-0" required>
                                    @if ($errors->has('title'))
                                        <span class="help-block">
                                            {{ $errors->first('title') }}
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-12 mb-3">
                                <div class="form-group{{ $errors->has('location') ? ' has-error' : '' }}">
                                    <label for="">Location</label> <small><i>(include the folder of actual book)</i></small>
                                    <input type="text" name="location"  value="{{old('location')}}" class="form-control rounded-0 " required>
                                      @if ($errors->has('location'))
                                        <span class="help-block">
                                            {{ $errors->first('location') }}
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-6 mb-3">
                                <div class="form-group{{ $errors->has('page_code') ? ' has-error' : '' }}">
                                    <label for="">Page Code</label>
                                    <input type="text" name="page_code"  value="{{old('page_code')}}" class="form-control rounded-0" required>
                                    @if ($errors->has('page_code'))
                                        <span class="help-block">
                                            {{ $errors->first('page_code') }}
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-6 mb-3">
                                <div class="form-group{{ $errors->has('starting') ? ' has-error' : '' }}">
                                    <label for="">Start Page</label>
                                    <input type="number" name="starting"  value="{{old('starting')}}" class="form-control rounded-0" required>
                                    @if ($errors->has('starting'))
                                        <span class="help-block">
                                            {{ $errors->first('starting') }}
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-6 mb-3">
                                <div class="form-group{{ $errors->has('number_of_pages') ? ' has-error' : '' }}">
                                    <label for="">Total Pages</label>
                                    <input type="number" name="number_of_pages"  value="{{old('number_of_pages')}}" class="form-control rounded-0" required>
                                    @if ($errors->has('number_of_pages'))
                                        <span class="help-block">
                                            {{ $errors->first('number_of_pages') }}
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-6 mb-3">
                                <div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">
                                    <label>Type</label> <small><i>(select appropriate type)</i></small>
                                    <select class="form-control rounded-0" name="type">
                                        <optgroup label="JPG Files"></optgroup>
                                        <option value="JPEG" @if(old('JPEG')) selected="" @endif > JPEG</option>
                                        <option value="jpg" @if(old('jpg')) selected="" @endif > jpg</option>
                                        <option value="jpeg" @if(old('jpeg')) selected="" @endif > jpeg</option>
                                        <optgroup label="PNG Files"></optgroup>
                                        <option value="PNG" @if(old('PNG')) selected="" @endif > PNG</option>
                                        <option value="png" @if(old('png')) selected="" @endif > png</option>
                                    </select>
                                    @if ($errors->has('type'))
                                        <span class="help-block">
                                            {{ $errors->first('type') }}
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-12 mb-3">
                                <label><input type="checkbox" value="1" name="available"> Available</label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary rounded-0"><i class="fa fa-save"></i> Save</button>               
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