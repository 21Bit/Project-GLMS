@extends('layouts.back-end')

@section('title', 'All Students')

@section('content')
	<!-- begin breadcrumb -->
	<ol class="breadcrumb pull-right">
		<li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
		<li class="breadcrumb-item active">All Students</li>
		{{-- <li class="breadcrumb-item"><a href="javascript:;"></a></li> --}}
	</ol>
	<!-- end breadcrumb -->
	<!-- begin page-header -->
	<h1 class="page-header">Students</h1>
	<!-- end page-header -->
	
	<!-- begin row -->
	<div class="row">
		
		<div class="col-lg-12">
			<!-- begin panel -->
			<div class="panel panel-inverse">
				<div class="panel-heading pb-0 mb-3">
					<div class="panel-heading-btn">
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
					</div>
					<a href="{{ route("back-end.student.create") }}" title='Add new book' class="btn btn-sm text-white h3"><i class="fa fa-plus"></i></a>
					<a data-toggle="modal" href="#delete-all-modal" title="delete all selected books" class="btn btn-sm text-white h3"><i class="fa fa-trash"></i></a>
				</div>

				<div class="panel-body">
					<form action="{{ route('back-end.student.multidelete') }}"  id="datatable-form">	
					{!! $html->table() !!}
					</form>
				</div>
				
			</div>
			
		</div>
		
	</div>
	<!-- end row -->
@include('back-end.includes.component.delete-all-modal')
@endsection
@include("back-end.includes.component.datatables-js")
@push('scripts')
    {!! $html->scripts() !!}
	<script>
       $(document).ready(function() {
			TableManageFixedHeader.init();
		});
	</script>
@endpush