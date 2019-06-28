@extends('layouts.back-end')

@section('title', 'All Credit Packages')

@push('css')
	<link href="/back-end/plugins/datatables/css/dataTables.bootstrap4.css" rel="stylesheet" />
	<link href="/back-end/plugins/datatables/css/fixedHeader/fixedHeader.bootstrap4.min.css" rel="stylesheet" />
	<link href="/back-end/plugins/datatables/css/responsive/responsive.bootstrap4.css" rel="stylesheet" />
@endpush

@section('content')
	<!-- begin breadcrumb -->
	<ol class="breadcrumb pull-right">
		<li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
		<li class="breadcrumb-item active">All Credit Packages</li>
	</ol>
	<!-- end breadcrumb -->

	<!-- begin page-header -->
	<h1 class="page-header">Credit Package</h1>
	<!-- end page-header -->
	
	<!-- begin row -->
	<div class="row">
		<div class="col-lg-4">
            <div class="panel panel-inverse">
                <div class="panel-body">
                    <form action="{{ route('back-end.creteria.store') }}" method="post">
                        @csrf
                        <p>
                            <label for="">Name of Creteria</label>
                            <input type="text" name="name" min="1" class="form-control">
                        </p>
                        <p>
                            <label for="">Description</label>
                            <textarea name="description" id="" class="form-control" rows="4"></textarea>
                        </p>
                        <p>
                            <label for="featured"><input type="checkbox" id="featured" name="active"> Active</label>
                        </p>
                        <p>
                            <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Save</button>
                        </p>
                    </form>
                </div>
			</div>
		</div>
		<div class="col-lg-8">
			<!-- begin panel -->
			<div class="panel panel-inverse">
				<!-- begin panel-heading -->
				<div class="panel-heading pb-0 mb-3">
					<a data-toggle="modal" href="#delete-all-modal" title="delete all selected blogs"   class="btn btn-sm text-white  h3"><i class="fa fa-trash"></i></a>
				</div>
				<!-- end panel-heading -->
				<form action="{{ route('back-end.creteria.multidelete') }}" id="datatable-form" method="post">
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