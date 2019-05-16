@extends('layouts.back-end')

@section('title', 'All Blogs')


@section('content')
	<!-- begin breadcrumb -->
	<ol class="breadcrumb pull-right">
		<li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
		<li class="breadcrumb-item active">All Blogs</li>
	</ol>
	<!-- end breadcrumb -->

	<!-- begin page-header -->
	<h1 class="page-header">Blog</h1>
	<!-- end page-header -->
	
	<!-- begin row -->
	<div class="row">
		<div class="col-lg-12">
			<!-- begin panel -->
			<div class="panel panel-inverse">
				<!-- begin panel-heading -->
				<div class="panel-heading pb-0 mb-3">
					<a href="{{ route("back-end.blog.create") }}" title='Add new book' class="btn btn-sm text-white h3"><i class="fa fa-plus"></i></a>
					<a data-toggle="modal" href="#delete-all-modal" title="delete all selected blogs"   class="btn btn-sm text-white  h3"><i class="fa fa-trash"></i></a>
				</div>
				<!-- end panel-heading -->
				<form action="{{ route('back-end.blog.multidelete') }}" id="datatable-form" method="post">
					{{ csrf_field() }}	
                  	{!! $html->table() !!}
				</form>
				<!-- end panel-body -->
			</div>
			<!-- end panel -->
		</div>
		<!-- end col-10 -->
	</div>
	<!-- end row -->
	@include('back-end.includes.component.delete-all-modal')
@endsection

@push('scripts')
	@include("back-end.includes.component.datatables-js")
    {!! $html->scripts() !!}
@endpush