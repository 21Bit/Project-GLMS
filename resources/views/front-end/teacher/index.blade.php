@extends('layouts.front-end')

@section('title', config("app.name"))

@section("content")
     <div id="page-header" class="section-container page-header-container bg-black">
            <!-- BEGIN page-header-cover -->
            <div class="page-header-cover">
                <img src="/img/cover/cover-11.jpg" alt="" />
            </div>
            <!-- END page-header-cover -->
            <!-- BEGIN container -->
            <div class="container">
                <h1 class="page-header"><b>English</b> Teachers</h1>
            </div>
            <!-- END container -->
    </div>
     <div id="trending-items" class="section-container bg-silver">
        <!-- BEGIN container -->
        <div class="container">
            <!-- BEGIN section-title -->
            <h4 class="section-title clearfix">
                Our Teachers
                <small>All been loved and favorite of our students over a decade.</small>
            </h4>
            <!-- END section-title -->
        
            <!-- BEGIN row -->
            <div class="row row-space-10">
                <!-- BEGIN col-2 -->
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
            <!-- END row -->
        </div>
        <!-- END container -->
    </div>
@endsection