@extends('layouts.back-end')

@section('title', $book->title)

@push('css')
	<link href="/back-end/plugins/datatables/css/dataTables.bootstrap4.css" rel="stylesheet" />
	<link href="/back-end/plugins/datatables/css/fixedHeader/fixedHeader.bootstrap4.min.css" rel="stylesheet" />
	<link href="/back-end/plugins/datatables/css/responsive/responsive.bootstrap4.css" rel="stylesheet" />
@endpush

@section('content')
	<!-- begin breadcrumb -->
	<ol class="breadcrumb pull-right">
		<li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
		<li class="breadcrumb-item"><a href="javascript:;">Book</a></li>
		<li class="breadcrumb-item active">All Books</li>
	</ol>
	<!-- end breadcrumb -->

	<!-- begin page-header -->
	<h1 class="page-header">Book</h1>
	<!-- end page-header -->
	
	<!-- begin row -->
	<div class="row">
		<div class="col-lg-12">
			<!-- begin panel -->
			<div class="row">
                    <div class="col-sm-4">
                         <div class="panel panel-inverse">
                        <!-- begin panel-heading -->
                        <div class="panel-heading">
                            <div class="panel-heading-btn">
                                <a href="{{ route("back-end.book.edit", $book->id, ['book' => $book->id]) }}" class="btn btn-xs  btn-warning"><i class="fa fa-edit"></i> Edit</a>
                            </div>
                            <h5>&nbsp;</h5>
                        </div>
                        <!-- end panel-heading -->
                        <!-- begin panel-body -->
                        <div class="panel-body">
                        <h3>{{$book->title}}</h3>
                            <table class="table">
                                <tr>
                                    <td>Location</td>
                                    <td>: {{ $book->location}}</td>
                                </tr>
                                <tr>
                                    <td>Page Code</td>
                                    <td>: <code>{{ $book->page_code}}</code></td>
                                </tr>
                                <tr>
                                    <td>Pages</td>
                                    <td>: {{ $book->starting}} - {{ $book->number_of_pages }}</td>
                                </tr>
                            </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div id="image-preview">
                            @if($book->id == null && app('request')->input('page') == "")
                                    <br>
                                    <div class="text-center">
                                    <label>@lang('label.no_book_been_set')</label>
                                    </div>
                            @elseif( $book->id != null &&  app('request')->input('page') == Null)
                                    {{$book->pages()->paginate(1)->links()}}
                                    <img id="book_preview" src="{{ App\Models\BookPage::where('book_id', $book->id)->where('page_number', $book->starting)->first()->url}}" class="img img-responsive">
                            @elseif( $book->id != null &&  app('request')->input('page') != Null)
    
                                    {{$book->pages()->paginate(1)->links()}}
                                    <img id="book_preview" src="{{ App\Models\BookPage::where('book_id', $book->id)->where('page_number', app('request')->input('page'))->first()->url}}" class="img img-responsive">
                            @else
                                <br>
                                    <div class="text-center">
                                        <label>@lang('label.no_book_been_set')</label>
                                    </div>
                            @endif
                                <div class="center-block" id="loading-image" style="display: none">
                                    <img src="https://upload.wikimedia.org/wikipedia/commons/b/b1/Loading_icon.gif">
                                </div>
                        </div>
                    </div>
                </div>  
			<!-- end panel -->
		</div>
		<!-- end col-10 -->
	</div>
	<!-- end row -->
@endsection

