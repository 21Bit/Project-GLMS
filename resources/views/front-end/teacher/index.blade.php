@extends('layouts.front-end')

@section('title', config("app.name"))

@section("content")
    <div id="page-header" class="section-container page-header-container bg-black">
        <div class="page-header-cover">
            <img src="/img/cover/cover-11.jpg" alt="" />
        </div>
        <div class="container">
            <h1 class="page-header"><b>English</b> Teachers</h1>
        </div>
    </div>
     <div id="trending-items" class="section-container bg-silver">
        <div class="container">
            <h4 class="section-title clearfix">
                Our Teachers
                <small>All been loved and favorite of our students over a decade.</small>
            </h4>
            <div class="row row-space-10">
                @foreach($teachers as $teacher)
                    <div class="col-md-2 col-sm-4">
                        <div class="item item-thumbnail" style="margin-bottom:10px;min-height:250px">
                            <a href="{{ route("front-end.teacher.show", $teacher->username) }}" class="item-image">
                                <img src="{{ $teacher->getPicturePath(true) }}" alt="" class="img img-circle"/>        
                            </a>
                            <div class="item-info">
                                <h4 class="item-title">
                                    <a href="{{ route("front-end.teacher.show", $teacher->username) }}">{{ $teacher->name }}</a>
                                </h4>
                                <p class="item-desc">3D Touch. 12MP photos. 4K video.</p>
                                <div class="item-price"><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star"></i></div>

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            {{ $teachers->links() }}
        </div>
    </div>
@include('front-end.includes.components.login-modal')
@endsection