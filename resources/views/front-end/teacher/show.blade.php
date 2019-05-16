@extends('layouts.front-end')

@section('title', $teacher->name)

@section("content")
    
    <div id="trending-items" class="section-container bg-silver">
        <!-- BEGIN container -->
        <div class="container">
            <div class="row">
                <div class="col-sm-9">
                    <div class="box">
                        <div class="row">
                            <div class="col-sm-2 text-center">
                                <img src="{{ $teacher->getPicturePath(true) }}" alt="" class="center-block img-responsive img-circle" />        
                            </div>     
                            <div class="col-sm-10">
                               <h4 class="item-title">
                                    {{ $teacher->name }}
                                </h4>
                                <p class="item-desc">3D Touch. 12MP photos. 4K video.</p>
                                <div class="item-price"><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star"></i></div>
                            </div>
                        </div>
                        <p class="mt-5">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam quae dignissimos ipsa sit, porro est laboriosam aut eligendi quidem, perferendis exercitationem consectetur optio cupiditate repudiandae minima accusantium suscipit voluptatem nemo?
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam quae dignissimos ipsa sit, porro est laboriosam aut eligendi quidem, perferendis exercitationem consectetur optio cupiditate repudiandae minima accusantium suscipit voluptatem nemo?
                        </p>
                    </div>

                    <div class="box">
                        <label for="">Slots</label>
                        <div id="calendar" data-render="calendar" data-url="{{ route("back-end.teacher.slot.getslot", $teacher->id) }}"></div>
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
                        <div class="panel box panel-success" data-fixed-top="true"  data-toggle="modal" data-target="#myModal" >
                            <div class="panel-body text-center">
                                <h1 class="text-success" id="slotnumber">0</h1>
                            </div>
                            <div class="panel-footer text-center btn btn-block" >
                                Selected Slots
                            </div>
                        </div>
                        <!-- <h4 class="mt-3 mb-5 text-center">
                            Let's have some fun and schedule now a class.
                        </h4>
                        <h4 class="mt-3 mb-5 text-center">
                            <small>You will select slots that available for both you and {{$teacher->name}}. Its easy!</small>
                        </h4> -->
                        
                        <a href="#" class="btn btn-success btn-lg btn-block">Selected <span class="badge">2</span></a>
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
        <div class="modal-dialog">
      
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Modal Header</h4>
            </div>
            <div class="modal-body">
              <p>Some text in the modal.</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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
            var url = "/api/teacherslot/{{ $teacher->id }}" 
            $('#calendar').fullCalendar({
                themeSystem: 'bootstrap4',
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    // right: 'month,agendaWeek,agendaDay '
                    right: ''
                },
                timeFormat: 'hh:mm A', // uppercase H for 24-hour clock
                weekNumbers: true,
                lazyFetching:false,
                displayEventTime: true, // Display event time
                eventLimit: true, // allow "more" link when too many events
                events: function (start, end, timezone, callback) {
                    axios.post(url,{
                            start: start,
                            end: end,
                        })
                        .then( response => {
                            var events = [];
                            response.data.data.forEach(function(e){
                                events.push({
                                    id: e.id,
                                    //title: e.start + "-" + e.end,
                                    start: e.start, // will be parsed
                                    end: e.end, // will be parsed,
                                    className: e.selected ? "btn btn-sm btn-danger p-5 fc-event m-1 border-1" : "btn btn-sm btn-success p-5 fc-event m-1 border-1" ,
                                    selected: e.selected,
                                });
                            })
                            console.log(events)
    
                            callback(events);
                        })
                        .catch( error => {
                            console.log(error)
                        })
                },
                eventClick: function(event){
                    var slotnumber = parseInt($("#slotnumber").html());
                   
                    if(this.selected){
                        this.className = "btn btn-sm btn-success fc-event m-1 border-1"
                        this.selected = false
                        $("#slotnumber").html(slotnumber - 1)
                    }else{
                        this.className = "btn btn-sm btn-danger fc-event m-1 border-1"
                        this.selected = true
                        $("#slotnumber").html(slotnumber + 1)
                    }
                    console.log(event)
                    // var deleteMode = $('#deleteMode').prop("checked")
                    // if(deleteMode){
                    //     swal.fire({
                    //         title: 'Are you sure?',
                    //         text: event.start._i + " will be deleted",
                    //         type: 'warning',
                    //         showCancelButton: true,
                    //         confirmButtonColor: '#3085d6',
                    //         cancelButtonColor: '#d33',
                    //         confirmButtonText: 'Yes, delete it!'
                    //     }).then((result) => {
                    //         if (result.value) {
                    //             axios.post('/back-end/teacher/deleteslot/' + event.id)
                    //                 .then( response => {
                    //                     $('#calendar').fullCalendar('removeEvents', event._id)
                    //                 })
                    //                 .catch( error => {
                    //                     console.log(error)
                    //                 })
                    //         }
                    //     })
                    // }else{
                        
                    // }
                }
            });
</script>
@endpush    