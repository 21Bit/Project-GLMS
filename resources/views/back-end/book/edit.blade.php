@extends('layouts.back-end')

@section('title', 'Edit ' . $book->title . " book")

@push('css')
	<link href="/back-end/plugins/datatables/css/dataTables.bootstrap4.css" rel="stylesheet" />
	<link href="/back-end/plugins/datatables/css/fixedHeader/fixedHeader.bootstrap4.min.css" rel="stylesheet" />
	<link href="/back-end/plugins/datatables/css/responsive/responsive.bootstrap4.css" rel="stylesheet" />
@endpush

@section('content')
	<!-- begin breadcrumb -->
	<ol class="breadcrumb pull-right">
		<li class="breadcrumb-item"><a href="">Home</a></li>
		<li class="breadcrumb-item"><a href="{{ route("back-end.book.index") }}">Book</a></li>
		<li class="breadcrumb-item active">Edit New Book</li>
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
					<h4 class="panel-title">Edit Book</h4>
				</div>
				<!-- end panel-heading -->
			
				<!-- begin panel-body -->
				<div class="panel-body">
                    <form action="{{route('back-end.book.update', $book->id)}}" method="post">
                        {{csrf_field()}}
                        {{method_field("PUT")}}
                        <div class="row">
                            <div class="col-12 mb-3">
                                <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                                    <label for="">Title</label>
                                    <input type="text" name="title" value="{{ $book->title}}" class="form-control rounded-0" required>
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
                                    <input type="text" name="location"  value="{{ $book->location}}" class="form-control rounded-0 " required>
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
                                    <input type="text" name="page_code"  value="{{ $book->page_code}}" class="form-control rounded-0" required>
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
                                    <input type="number" name="starting"  value="{{ $book->starting}}" class="form-control rounded-0" required>
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
                                    <input type="number" name="number_of_pages"  value="{{ $book->number_of_pages}}" class="form-control rounded-0" required>
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
                                        <option value="JPEG" @if( $book->JPEG ) selected="" @endif > JPEG</option>
                                        <option value="jpg" @if( $book->jpg ) selected="" @endif > jpg</option>
                                        <option value="jpeg" @if( $book->jpeg ) selected="" @endif > jpeg</option>
                                        <optgroup label="PNG Files"></optgroup>
                                        <option value="PNG" @if( $book->PNG ) selected="" @endif > PNG</option>
                                        <option value="png" @if( $book->png ) selected="" @endif > png</option>
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
                        <button type="submit" class="btn btn-primary rounded-0"><i class="fa fa-save"></i> Save Changes</button>               
                        <a class="btn btn-warning rounded-0" href="{{ route("back-end.book.index") }}"><i class="fa fa-ban"></i> Cancel</a>               
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