@extends('layouts.back-end')

@section('title', 'Edit Notice')

@push('css')
	<link href="/back-end/plugins/summernote/dist/summernote-lite.css" rel="stylesheet" />     
@endpush

@section('content')
	<!-- begin breadcrumb -->
	<ol class="breadcrumb pull-right">
		<li class="breadcrumb-item"><a href="">Home</a></li>
		<li class="breadcrumb-item"><a href="{{ route("back-end.blog.index") }}">Notice</a></li>
		<li class="breadcrumb-item active">Create Notice</li>
		{{-- <li class="breadcrumb-item"><a href="javascript:;"></a></li> --}}
	</ol>
	<!-- end breadcrumb -->
	<!-- begin page-header -->
	<h1 class="page-header">Notice</h1>
	<!-- end page-header -->
	
    <!-- begin row -->
    <form action="{{ route("back-end.notice.update" , $notice->id) }}" method="post">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
        <div class="row">
            <div class="col-lg-8">
                <!-- begin panel -->
                <div class="panel panel-default ">
                    <!-- begin panel-body -->
                    <div class="panel-body">
                        {{csrf_field()}}
                        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                            <label for="">Title</label>
                            <input type="text" name="title" value="{{ $notice->title }}" class="form-control rounded-0" required>
                            @if ($errors->has('title'))
                                <span class="help-block">
                                    {{ $errors->first('title') }}
                                </span>
                            @endif
                        </div>
                        <textarea class="summernote" name="content">{!! $notice->content !!}</textarea>             
                    </div>
                    <!-- end panel-body -->
                </div>
                <!-- end panel -->
            </div>

            <div class="col-lg-4">
                
                <!-- begin panel -->
                <div class="panel panel-inverse ">
                    <!-- begin panel-body -->
                    <div class="panel-body">
                    <p class="mb-3">
                        <label for="">Status</label>
                        <select name="is_published" class="form-control rounded-0">
                            <option value="1">Publish</option>
                            <option value="0" @if($notice->is_published) == 0 ) selected @endif>Draft</option>
                        </select>
                    </p>
                    <p>
                        <label class="d-block" for="">Featured Image <small>(Optional)</small></label>
                        <input type="file" name='featured_image' id="featured_image" class="d-none">
                        <label class="btn btn-xs btn-default" for="featured_image" for=""><i class="fa fa-file"></i> Choose File</label>
                    </p>
                    </div>
                    <!-- end panel-body -->
                </div>

                <button class="btn btn-primary mr-1" type="submit"><i class="fa fa-save"></i> Save Changes</button>
                <a class="btn btn-secondary" href="{{ route("back-end.notice.index") }}"><i class="fa fa-ban"></i> Discard</a>
                <!-- end panel -->
            </div>
            <!-- end col-10 -->
        </div>
    </form>
	<!-- end row -->
@endsection

@push('scripts')
    <script src="/back-end/plugins/summernote/dist/summernote-lite.js"></script>
    <script src="/back-end/js/summernote-init.js"></script>
@endpush