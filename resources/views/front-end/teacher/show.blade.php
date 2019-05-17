@extends('layouts.front-end')

@section('title', $teacher->name)

@section("content")
    
    <div id="trending-items" class="section-container bg-silver">
        <!-- BEGIN container -->
        <div class="container">
            <div class="row">
                <div class="col-sm-9">
                    <div class="box">
                        <div class="row mb-3">
                            <div class="col-sm-2 text-center">
                                <img src="{{ $teacher->getPicturePath(true) }}" style="width:90px" alt="" class="center-block img-responsive img-circle" />        
                            </div>     
                            <div class="col-sm-10">
                               <h4 class="item-title">
                                    {{ $teacher->name }}
                                </h4>
                                <p class="item-desc">3D Touch. 12MP photos. 4K video.</p>
                                <div class="item-price"><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star"></i></div>
                            </div>
                        </div>
                        <label for="">Slots</label>
                        <div id="calendar" data-url="/api1/teacherslot/{{ $teacher->id }}" data-render="calendar" data-url="{{ route("back-end.teacher.slot.getslot", $teacher->id) }}"></div>
                    </div>
                    <!-- BEGIN section-title -->
                    <h4 class="section-title clearfix mt-5">
                        You Might Also Like To Know Others
                        <small>We are giving equal quality of services.</small>
                    </h4>
                    <!-- END section-title -->

                     <!-- BEGIN row -->
                    <div class="row row-space-10">
                            <!-- BEGIN col-2 -->
                        @foreach($teachers as $other_teacher)
                            <div class="col-md-2 col-sm-4">
                                <div class="item item-thumbnail" style="margin-bottom:10px;min-height:250px">
                                    <a href="{{ route("front-end.teacher.show", $other_teacher->username) }}" class="item-image">
                                        <img src="{{ $other_teacher->getPicturePath(true) }}" class="img img-circle" alt="" />        
                                    </a>
                                    <div class="item-info">
                                        <h4 class="item-title">
                                            <a href="{{ route("front-end.teacher.show", $other_teacher->username) }}">{{ $other_teacher->name }}</a>
                                        </h4>
                                        <p class="item-desc">3D Touch. 12MP photos. 4K video.</p>
                                        <div class="item-price"><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star"></i></div>
                    
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                        <!-- END row -->
                </div>
                <div class="col-sm-3">
                    
                    @auth
                         <h4 class="mt-3 mb-5 text-center">
                            Let's have some fun and schedule now a class.
                        </h4>
                        <h4 class="mt-3 mb-5 text-center">
                            <small>You will select slots that available for both you and {{$teacher->name}}. Its easy!</small>
                        </h4> 
                        
                        <a href="#" class="btn btn-success btn-lg btn-block">Proceed</a>
                    @else
                        <div>
                            <h4 class="mt-3 mb-5 text-center">
                                To have a class to {{ $teacher->name }}, sign up
                            </h4>
                            <h4 class="mt-3 mb-5 text-center">
                                <small>This will not take long. Its easy!</small>
                            </h4>
                            <input type="text" class="form-control mb-4" placeholder="Your Complete Name">
                            <input type="text" class="form-control mb-4" placeholder="Working Email Address">
                            <a href="#" class="btn btn-success"> SIGN UP</a>
                        </div>

                        <div class="or-line mt-5 mb-5"><span>OR</span></div>

                        <h4 class="mt-3 mb-5 text-center">
                            <small>You may sign in here if you have an account.</small>
                        </h4>
                        <a href="#" class="btn btn-success btn-block"> SIGN IN</a>

                        <div class="divider-line mb-5 mt-5"></div>
                    @endif
                    <div class="text-center mt-5">
                        <a href="#" class="text-muted m-3">About Us</a> <a href="#" class="text-muted m-3">About Us</a> <a href="#" class="text-muted mr-5">Help</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- END container -->
    </div>
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">
           <div class="account-container">
                <div class="account-sidebar">
                    <div class="account-sidebar-cover">
                        <img src="/images/covers/login-modal-bg.jpg" alt="" />
                    </div>
                    <div class="account-sidebar-content">
                        <login-component></login-component>
                    </div>
                </div>
                <div class="account-body">
                   <register-component></register-component>    
                </div>
            </div>
          </div>
      </div>
@endsection

@push("styles")
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.0/fullcalendar.css" />
@endpush    
@push("scripts")
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.0/fullcalendar.min.js"></script>
<script>
    loadCalendar()
</script>
@endpush    