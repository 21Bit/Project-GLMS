@extends('layouts.back-end')

@section('title', 'All Notice')



@section('content')
	<!-- begin breadcrumb -->
	<ol class="breadcrumb pull-right">
		<li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
		<li class="breadcrumb-item active">Settings / Pricing</li>
	</ol>
	<!-- end breadcrumb -->

	<!-- begin page-header -->
	<h1 class="page-header">Setting</h1>
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
                                    <label for="">Pricing Type</label>
                                    <p class="desc">
                                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Repellendus placeat aperiam voluptatem illum quam sed culpa sapiente, ullam sit laborum dolore nam soluta, sint odit, harum quod doloremque commodi esse!
                                    </p>
                                    <select name="pricing_type" id="" class="form-control">
                                        <option value="per_slot">Per Slot</option>
                                        <option @if( old('name', setting('pricing_type')) == "package" ) selected  @endif   value="package">Package</option>
                                    </select>
                                </p>
                            </div>
                        </div>
                        <div class="panel panel-inverse">
                            <div class="panel-body">
                                <p>
                                    <label for="">Price</label>
                                    <p class="desc">
                                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Repellendus placeat aperiam voluptatem illum quam sed culpa sapiente, ullam sit laborum dolore nam soluta, sint odit, harum quod doloremque commodi esse!
                                    </p>
                                    <input value="{{ old('name', setting('slot_price')) }}" name="slot_price" type="text" place="price" class="form-control">
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

