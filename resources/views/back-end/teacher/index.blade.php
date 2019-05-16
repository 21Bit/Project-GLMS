@extends('layouts.back-end')

@section('title', 'All Teachers')

@section('content')
	<!-- begin breadcrumb -->
	<ol class="breadcrumb pull-right">
		<li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
		<li class="breadcrumb-item"><a href="javascript:;">All Teachers</a></li>
	</ol>
	<!-- end breadcrumb -->

	<!-- begin page-header -->
	<h1 class="page-header">Teacher</h1>
	<!-- end page-header -->
	
	<!-- begin row -->
	<div class="row">
		<div class="col-lg-12">
			<!-- begin panel -->
			<div class="panel panel-inverse">
				<!-- begin panel-heading -->
				<div class="panel-heading pb-0 mb-3">
					<div class="panel-heading-btn">
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
					</div>
					<a href="{{ route("back-end.teacher.create") }}" title='Add new book' class="btn text-white btn-sm h3"><i class="fa fa-plus"></i></a>
					<a data-toggle="modal" href="#delete-all-modal" title="delete all selected teacher"  class="btn text-white btn-sm  h3"><i class="fa fa-trash"></i></a>
				</div>
				<form action="{{ route('back-end.teacher.multidelete') }}"  id="datatable-form">		
				{!! $html->table() !!}
				</form>
			</div>
			<!-- end panel -->
		</div>
		<!-- end col-10 -->
	</div>
	<!-- end row -->
	@include('back-end.includes.component.delete-all-modal')
@endsection

@include("back-end.includes.component.datatables-js")

@push('scripts')
    {!! $html->scripts() !!}
@endpush