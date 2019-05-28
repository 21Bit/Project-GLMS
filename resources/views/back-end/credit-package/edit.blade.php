@extends('layouts.back-end')

@section('title', 'Edit Credit Package')

@section('content')
	<!-- begin breadcrumb -->
	<ol class="breadcrumb pull-right">
		<li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
		<li class="breadcrumb-item"><a href="{{ route('back-end.credit-package.index') }}">All Credit Packages</a></li>
		<li class="breadcrumb-item active">Edit Credit Packages</li>
	</ol>
	<!-- end breadcrumb -->

	<!-- begin page-header -->
	<h1 class="page-header">Edit Credit Package</h1>
	<!-- end page-header -->
	
	<!-- begin row -->
	<div class="row">
		<div class="col-lg-4">
            <div class="panel panel-inverse">
                <div class="panel-body">
                    <form action="{{ route('back-end.credit-package.update', $creditPackage->id) }}" method="post">
                        @csrf
                        @method("PUT")
                        <p>
                            <label for="">Number of Credits</label>
                            <input type="number" value="{{ $creditPackage->credit }}" name="credit" min="1" class="form-control">
                        </p>
                        <p>
                            <label for="">Price</label>
                            <input type="number" value="{{ $creditPackage->price }}" min="1" name="price" class="form-control">
                        </p>
                        <p>
                            <label for="">Note</label>
                            <textarea name="note" id="" class="form-control" rows="4">{{ $creditPackage->note }}</textarea>
                        </p>
                        <p>
                            <label for="featured"><input type="checkbox" id="featured" name="featured" @if($creditPackage->featured) checked @endif> Featured</label>
                        </p>
                        <p>
                            <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Save Changes</button>
                            <a  class="btn btn-secondary" href="{{ url()->previous() }}"><i class="fa fa-ban"></i> Discard</a>
                        </p>
                    </form>
                </div>
			</div>
		</div>
	
	</div>
	<!-- end row -->
@endsection
