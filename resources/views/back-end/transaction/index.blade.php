@extends('layouts.back-end')

@section('title', 'All Transaction | ' . config("app.name"))

@push('css')
	<link href="/back-end/plugins/datatables/css/dataTables.bootstrap4.css" rel="stylesheet" />
	<link href="/back-end/plugins/datatables/css/fixedHeader/fixedHeader.bootstrap4.min.css" rel="stylesheet" />
	<link href="/back-end/plugins/datatables/css/responsive/responsive.bootstrap4.css" rel="stylesheet" />
@endpush

@section('content')
	<!-- begin breadcrumb -->
	<ol class="breadcrumb pull-right">
		<li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
		<li class="breadcrumb-item active">All Transaction</li>
		{{-- <li class="breadcrumb-item"><a href="javascript:;"></a></li> --}}
	</ol>
	<!-- end breadcrumb -->
	<!-- begin page-header -->
	<h1 class="page-header">Transaction</h1>
	<!-- end page-header -->
	
	<!-- begin row -->
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-inverse">
				<div class="panel-heading pb-0 mb-3">
					<div class="panel-heading-btn">
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
					</div>
					{{-- <a href="#" id="datatable-reload-btn" title='Reload Table' class="btn btn-sm h3"><i class="fa fa-refresh" ></i></a> --}}
					<a href="{{ route("back-end.transaction.create") }}" id="openHolidaForm" title='Add new book' class="btn btn-sm text-white h3"><i class="fa fa-plus"></i></a>
					<a data-toggle="modal" href="#delete-all-modal" title="delete all selected holiday"  class="btn btn-sm text-white  h3"><i class="fa fa-trash"></i></a>
				</div>
				<div class="panel-body">
					<form action="{{ route('back-end.transaction.multidelete') }}" id="datatable-form" method="post">
						{{ csrf_field() }}
						{!! $html->table() !!}
					</form>
				</div>
			</div>
		</div>
	</div>
	
	<div class="modal fade rounded-0" id="holidayModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog " role="document">
            <div class="modal-content">
                <form action="{{ route('back-end.holiday.store') }}" method="post" id="addHolidayForm">
                    {{ csrf_field() }}
                    <input type="hidden" name="mode" value="ADD">
                    <div class="modal-header rounded-0">
                        <h5 class="modal-title" id="exampleModalLabel">Holiday Manager</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body rounded-0">
                        <p>
                            <label for="">Name</label>
                            <input type="text" required name="name" class="form-control rounded-0">
                        </p>
                        <p>
                            <label for="">Date</label>
                            <input type="date" required name="date" value="{{ date('Y-m-d') }}" class="form-control rounded-0">
                        </p>
                        <p>
                            <label for="">Details</label>
                            <textarea name="details" id="" class="form-control rounded-0"></textarea>
                        </p>
                    </div>
                    <div class="modal-footer rounded-0">
                        <button type="button" class="btn rounded-0 btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn rounded-0 btn-primary">Save</button>
                    </div>
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