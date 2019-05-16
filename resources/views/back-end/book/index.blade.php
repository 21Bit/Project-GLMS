@extends('layouts.back-end')
@section('title', 'All Books')
@section('content')
	<ol class="breadcrumb pull-right">
		<li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
		<li class="breadcrumb-item active">All Books</li>
	</ol>
	<h1 class="page-header">Books</h1>
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-inverse">
				<div class="panel-heading pb-0 mb-3">
					<div class="panel-heading-btn">
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
					</div>
					<a href="{{ route("back-end.book.create") }}" data-toggle="tooltip" title='Add new book' class="btn btn-sm h3 text-white"><i class="fa fa-plus"></i></a>
					<a data-toggle="modal" href="#delete-all-modal" data-toggle="tooltip" title="delete all selected books" class="btn btn-sm text-white h3"><i class="fa fa-trash"></i></a>
				</div>
				<form action="{{ route('back-end.book.multidelete') }}" id="datatable-form" method="post">
					{{ csrf_field() }}
					{!! $html->table() !!}
				</form>
			</div>
		</div>
	</div>
@include('back-end.includes.component.delete-all-modal')
@endsection
@include("back-end.includes.component.datatables-js")
@push('scripts')
    {!! $html->scripts() !!}
@endpush