@extends('layouts.back-end')

@section('title', 'Settings: Payment')

@push('css')
	<link href="/back-end/plugins/datatables/css/dataTables.bootstrap4.css" rel="stylesheet" />
	<link href="/back-end/plugins/datatables/css/fixedHeader/fixedHeader.bootstrap4.min.css" rel="stylesheet" />
	<link href="/back-end/plugins/datatables/css/responsive/responsive.bootstrap4.css" rel="stylesheet" />
@endpush

@section('content')
	<!-- begin breadcrumb -->
	<ol class="breadcrumb pull-right">
		<li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
		<li class="breadcrumb-item active">Settings / Payment</li>
	</ol>
	<!-- end breadcrumb -->

	<!-- begin page-header -->
	<h1 class="page-header">Settings</h1>
	<!-- end page-header -->
	
	<!-- begin row -->
	<div class="row">
		<div class="col-lg-12">
            <div class="mb-3">
                @include('back-end.includes.component.setting-menu')
            </div>

            <form method="post" action="{{ route('back-end.setting.store') }}">
                @csrf
                <div class="row">
                    <div class="col-sm-6">
                        <div class="panel panel-inverse">
                            <div class="panel-body">
                                <p>
                                    <label for="">Default Payment Gateway</label>
                                    <p class="desc">
                                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Repellendus placeat aperiam voluptatem illum quam sed culpa sapiente, ullam sit laborum dolore nam soluta, sint odit, harum quod doloremque commodi esse!
                                    </p>
                                    <select name="default_payment_gateway" id="" class="form-control">
                                        <option value="paypal">PayPal</option>
                                        <option @if( old('default_payment_gateway', setting('default_payment_gateway')) == "iamport" ) selected  @endif   value="iamport">I am Port</option>
                                    </select>
                                </p>
                            </div>
                        </div>
                        <div class="panel panel-inverse">
                            <div class="panel-body">
                                <p>
                                    <label for="">PayPal</label>
                                    <p class="desc">
                                       PayPal Holdings, Inc. is an American company operating a worldwide online payments system that supports online money transfers and serves as an electronic alternative to traditional paper methods like checks and money orders.
                                    </p>
                                    <p>
                                        <label for="">Sandbox Account</label>
                                        <input value="{{ old('paypal_sandbox_account', setting('paypal_sandbox_account')) }}" name="paypal_sandbox_account" type="text" class="form-control">
                                    </p>
                                    <p>
                                        <label for="">Client ID</label>
                                        <input value="{{ old('paypal_client_id', setting('paypal_client_id')) }}" name="paypal_client_id" type="text" class="form-control">
                                    </p>
                                    <p>
                                        <label for="">Secret Key</label>
                                        <input value="{{ old('paypal_secret_key', setting('paypal_secret_key')) }}" name="paypal_secret_key" type="text" class="form-control">
                                    </p>
                                </p>
                            </div>
                        </div>
                        <div class="panel panel-inverse">
                            <div class="panel-body">
                                <p>
                                    <label for="">I am Port</label>
                                    <p class="desc">
                                       PayPal Holdings, Inc. is an American company operating a worldwide online payments system that supports online money transfers and serves as an electronic alternative to traditional paper methods like checks and money orders.
                                    </p>
                                    <p>
                                        <label for="">Store Code</label>
                                        <input value="{{ old('iamport_store_code', setting('iamport_store_code')) }}" name="iamport_store_code" type="text" place="price" class="form-control">
                                    </p>
                                    <p>
                                        <label for="">Rest API Key</label>
                                        <input value="{{ old('iamport_rest_api_key', setting('iamport_rest_api_key')) }}" name="iamport_rest_api_key" type="text" place="price" class="form-control">
                                    </p>
                                    <p>
                                        <label for="">REST API Key</label>
                                        <input value="{{ old('iamport_rest_api_key', setting('iamport_rest_api_key')) }}" name="iamport_rest_api_key" type="text" place="price" class="form-control">
                                    </p>
                                </p>
                            </div>
                        </div>
                        <button class="btn btn-success" type="submit"><i class="fa fa-save"></i> Save</button>
                    </div>
                </div>
            </form>  
		</div>
	</div>
@endsection

