@extends('layouts.student')

@section('title', "My Page | Classes")

@section('header')
    <div class="panel-header panel-header-sm">
    </div>
@endsection

@section("content")
    <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                </div>
                <div class="card-body">
                    
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="panel panel-inverse">
                                <div class="panel-body pb-2">
                                    <div class="pb-0">
                                        <h3>{{ date('h:i A', strtotime($class->date_time)) }},  {{ date('F j, Y', strtotime($class->date_time)) }}</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-5">
                                <div class="col-sm-10">
                                    <div class="panel panel-inverse">
                                        <div class="panel-body teacher-class-panel-body">
                                            <div class="d-flex">
                                                <div class="pr-3 pl-3 pt-2">
                                                    <img src="{{ $class->teacher->getPicturePath(false) }}" class="mw-100 rounded-circle mr-2" alt="">
                                                </div>
                                                <div>
                                                    <h5 class="mb-0"><a class="text-info" href="{{ route('front-end.teacher.show', optional($class->teacher)->username) }}" target="_blank" class="mb-0 text-inverse">{{  $class->teacher->name }}</a></h5>
                                                    <small>Teacher</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        
                            <div class="panel panel-inverse">
                                
                                <div class="panel-body pb-2">
                                    
                                    @foreach($creterias as $creteria)
                                        <div class="row  mb-4">
                                            <div class="col-5">
                                                <strong for="" class="mb-0">{{ $creteria->name }}</strong> <br>
                                                <small>{{ $creteria->description }}</small>
                                            </div>
                                            <div class="col-7 text-right">
                                                <div class="rate">
                                                    <input disabled @if(getRate($class->student_id, $class->id, $creteria->id) == 10) checked @endif type="radio" id="creteria-{{ $creteria->id }}-star10" name="creteria-{{ $creteria->id }}" value="10" />
                                                    <label for="creteria-{{ $creteria->id }}-star10" title="text">10 stars</label>
                                                    
                                                    <input disabled @if(getRate($class->student_id, $class->id, $creteria->id) == 9) checked @endif  type="radio" id="creteria-{{ $creteria->id }}-star9" name="creteria-{{ $creteria->id }}" value="9" />
                                                    <label for="creteria-{{ $creteria->id }}-star9" title="text">9 stars</label>
                                                    
                                                    <input disabled @if(getRate($class->student_id, $class->id, $creteria->id) == 8) checked @endif  type="radio" id="creteria-{{ $creteria->id }}-star8" name="creteria-{{ $creteria->id }}" value="8" />
                                                    <label for="creteria-{{ $creteria->id }}-star8" title="text">8 stars</label>
                                                    
                                                    <input disabled @if(getRate($class->student_id, $class->id, $creteria->id) == 7) checked @endif  type="radio" id="creteria-{{ $creteria->id }}-star7" name="creteria-{{ $creteria->id }}" value="7" />
                                                    <label for="creteria-{{ $creteria->id }}-star7" title="text">7 stars</label>
                                                
                                                    <input disabled @if(getRate($class->student_id, $class->id, $creteria->id) == 6) checked @endif  type="radio" id="creteria-{{ $creteria->id }}-star6" name="creteria-{{ $creteria->id }}" value="6" />
                                                    <label for="creteria-{{ $creteria->id }}-star6" title="text">6 star</label>
                                                
                                                    <input disabled @if(getRate($class->student_id, $class->id, $creteria->id) == 5) checked @endif  type="radio" id="creteria-{{ $creteria->id }}-star5" name="creteria-{{ $creteria->id }}" value="5" />
                                                    <label for="creteria-{{ $creteria->id }}-star5" title="text">5 stars</label>
                                                
                                                    <input disabled @if(getRate($class->student_id, $class->id, $creteria->id) == 4) checked @endif  type="radio" id="creteria-{{ $creteria->id }}-star4" name="creteria-{{ $creteria->id }}" value="4" />
                                                    <label for="creteria-{{ $creteria->id }}-star4" title="text">4 stars</label>
                                                
                                                    <input disabled @if(getRate($class->student_id, $class->id, $creteria->id) == 3) checked @endif  type="radio" id="creteria-{{ $creteria->id }}-star3" name="creteria-{{ $creteria->id }}" value="3" />
                                                    <label for="creteria-{{ $creteria->id }}-star3" title="text">3 stars</label>
                                                    
                                                    <input disabled @if(getRate($class->student_id, $class->id, $creteria->id) == 2) checked @endif  type="radio" id="creteria-{{ $creteria->id }}-star2" name="creteria-{{ $creteria->id }}" value="2" />
                                                    <label for="creteria-{{ $creteria->id }}-star2" title="text">2 stars</label>
                                                
                                                    <input disabled @if(getRate($class->student_id, $class->id, $creteria->id) == 1) checked @endif  type="radio" id="creteria-{{ $creteria->id }}-star1" name="creteria-{{ $creteria->id }}" value="1" />
                                                    <label for="creteria-{{ $creteria->id }}-star1" title="text">1 star</label>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        
                        </div>
                        <div class="col-sm-6">
                            
                            <div class="text-right mb-2 mt-0">
                                
                                <a href="{{ route('student.class.index') }}" class="btn btn-primary btn-lg"><i class="now-ui-icons media-1_camera-compact"></i> Start Room</a>
                                @if($class->attendance_status == 'ready')
                                    <span class="dropdown class-settings">
                                        <button class="btn btn-lg" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-cog"></i></button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                            <a class="dropdown-item" href="#"><i class="fa fa-ban"></i> Cancel Class</a>
                                            <a class="dropdown-item" href="#"><i class="fa fa-trash"></i> Delete Class</a>
                                        </div>
                                    </span>
                                @endif
                               {{-- <a href="{{ route('student.class.index') }}" class="btn btn-secondary"><i class="fa fa-ban"></i> Back</a> --}}
                            </div>
                            <div class="panel panel-inverse">
                                <div class="panel-body pb-2">
                                    <p class="mb-5">
                                        <label class="d-block mb-3 text-danger" for="">Status: </label>
                                        {{ strtoupper($class->attendance_status) }}
                                    </p>
                                    <p>
                                        <label class="d-block mb-3 text-danger" for="">Comments</label>
                                        @if($class->comment)
                                        <div class="alert alert-secondary text-dark">
                                            {!! $class->comment !!}
                                        </div>
                                        @else   
                                            <div class="text-center text-muted mt-5">
                                                <label for="" >no comment yet</label>
                                            </div>
                                        @endif
                                    </p>
                                </div>
                            
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection