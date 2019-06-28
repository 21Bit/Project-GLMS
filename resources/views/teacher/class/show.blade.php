@extends('layouts.teacher')

@section('title', "My Page | Classes")

@section('header')
    <div class="panel-header panel-header-sm">
    </div>
@endsection

@section("content")
    <div class="content">
        <div class="card">
            <div class="card-header">
                <div class="d-flex mt-0 mb-2">
                    <div class="w-50">
                        <h4 class="mb-0 mt-0">  <img src="{{ $class->student->getPicturePath(false) }}" class="mw-100 rounded-circle mr-2" alt="">{{  $class->student->name }} </h4>
                    </div>
                    <div class="w-50 text-right">
                        <h4 class="mt-0"">{{ date('h:i A', strtotime($class->date_time)) }},  {{ date('F j, Y', strtotime($class->date_time)) }}</h4>
                    </div>
                </div>
              
                    <div class="row">
                        <div class="col-sm-3">
                            <strong for="">Book</strong>
                            <div class="form-row">
                                <div class="col-sm-8">
                                    <select class="form-control rounded-0">

                                    </select>
                                </div>
                                <div class="col-sm-4">
                                    <input type="number" class="form-control rounded-0" style="padding:7px" placeholder="page">
                                </div>
                                <div class="p-2">
                                    <img src="http://ebook.speedgabia.com/dc_xpu1/dc_xpu1_016.jpg" alt="" class="mw-100">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <form action="{{ route('teacher.class.update', $class->id) }}" method="post">
                                @csrf
                                @method("PUT")
                                <p>
                                    <strong for="">Status</strong>
                                    <select name="status" class="form-control rounded-0">
                                        <option value="ready">READY</option>
                                        <option value="present" @if($class->attendance_status == 'present') selected @endif >PRESENT</option>
                                        <option value="absent"  @if($class->attendance_status == 'absent') selected @endif >ABSENT</option>
                                    </select>
                                </p>
                                <p>
                                    <strong for="">Comments</strong>    
                                    <textarea name="comment" class="editor" id="" cols="30" rows="10">{!! $class->comment !!}</textarea>    
                                </p>
                                @foreach($creterias as $creteria)
                                    <div class="d-flex flex-row mb-4">
                                        <div class="w-50">
                                            <strong for="" class="mb-0 d-block">{{ $creteria->name }}</strong>
                                            <small>{{ $creteria->description }}</small>
                                        </div>
                                        <div class="w-50 text-right">
                                            <div class="rate">
                                                <input @if(getRate($class->student_id, $class->id, $creteria->id) == 10) checked @endif type="radio" id="creteria-{{ $creteria->id }}-star10" name="creteria-{{ $creteria->id }}" value="10" />
                                                <label for="creteria-{{ $creteria->id }}-star10" title="text">10 stars</label>
                                                
                                                <input @if(getRate($class->student_id, $class->id, $creteria->id) == 9) checked @endif  type="radio" id="creteria-{{ $creteria->id }}-star9" name="creteria-{{ $creteria->id }}" value="9" />
                                                <label for="creteria-{{ $creteria->id }}-star9" title="text">9 stars</label>
                                                
                                                <input @if(getRate($class->student_id, $class->id, $creteria->id) == 8) checked @endif  type="radio" id="creteria-{{ $creteria->id }}-star8" name="creteria-{{ $creteria->id }}" value="8" />
                                                <label for="creteria-{{ $creteria->id }}-star8" title="text">8 stars</label>
                                                
                                                <input @if(getRate($class->student_id, $class->id, $creteria->id) == 7) checked @endif  type="radio" id="creteria-{{ $creteria->id }}-star7" name="creteria-{{ $creteria->id }}" value="7" />
                                                <label for="creteria-{{ $creteria->id }}-star7" title="text">7 stars</label>
                                            
                                                <input @if(getRate($class->student_id, $class->id, $creteria->id) == 6) checked @endif  type="radio" id="creteria-{{ $creteria->id }}-star6" name="creteria-{{ $creteria->id }}" value="6" />
                                                <label for="creteria-{{ $creteria->id }}-star6" title="text">6 star</label>
                                            
                                                <input @if(getRate($class->student_id, $class->id, $creteria->id) == 5) checked @endif  type="radio" id="creteria-{{ $creteria->id }}-star5" name="creteria-{{ $creteria->id }}" value="5" />
                                                <label for="creteria-{{ $creteria->id }}-star5" title="text">5 stars</label>
                                            
                                                <input @if(getRate($class->student_id, $class->id, $creteria->id) == 4) checked @endif  type="radio" id="creteria-{{ $creteria->id }}-star4" name="creteria-{{ $creteria->id }}" value="4" />
                                                <label for="creteria-{{ $creteria->id }}-star4" title="text">4 stars</label>
                                            
                                                <input @if(getRate($class->student_id, $class->id, $creteria->id) == 3) checked @endif  type="radio" id="creteria-{{ $creteria->id }}-star3" name="creteria-{{ $creteria->id }}" value="3" />
                                                <label for="creteria-{{ $creteria->id }}-star3" title="text">3 stars</label>
                                                
                                                <input @if(getRate($class->student_id, $class->id, $creteria->id) == 2) checked @endif  type="radio" id="creteria-{{ $creteria->id }}-star2" name="creteria-{{ $creteria->id }}" value="2" />
                                                <label for="creteria-{{ $creteria->id }}-star2" title="text">2 stars</label>
                                            
                                                <input @if(getRate($class->student_id, $class->id, $creteria->id) == 1) checked @endif  type="radio" id="creteria-{{ $creteria->id }}-star1" name="creteria-{{ $creteria->id }}" value="1" />
                                                <label for="creteria-{{ $creteria->id }}-star1" title="text">1 star</label>
                                            </div>
                                            <!-- <input type="number" value="{{ getRate($class->student_id, $class->id, $creteria->id) }}" name="creteria-{{ $creteria->id }}" min="0" max="10" class="form-control rounded-0 mt-2"> -->
                                        </div>
                                    </div>
                                @endforeach
                                <p>
                                    <button type="submit" class="btn btn-primary">Save Changes</button>
                                </p>
                            </form>
                        </div>
                        <div class="col-sm-3">
                            <strong for="" class="d-block mb-2">Mistakes</strong>
                            <form action="{{ route('teacher.mistake.store') }}" method="post" id="mistake-form">
                                @csrf
                                <input type="hidden" name="slot" value="{{ $class->id }}">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-ban"></i></span>
                                    </div>
                                    <input name="mistake" type="text" class="form-control" placeholder="Mistake" required aria-label="mistake" aria-describedby="basic-addon1">
                                </div>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-check"></i></span>
                                    </div>
                                    <input type="text" name="correction" class="form-control" required placeholder="Correction" aria-label="Correction" aria-describedby="basic-addon1">
                                </div>
                                <button type="submit" class="btn btn-primary mt-0 rounded-2">Save</button>
                                
                            </form>
                            <hr>
                            <div id="mistakes-container">
                                @foreach($class->mistakes()->orderBy('created_at', 'DESC')->get() as $mistake)
                                    <div class="border p-2 mb-2" id="mistake-{{ $mistake->id }}">
                                        <button class="close remove-mistake"  id="{{ $mistake->id }}" ><span aria-hidden="true">&times;</span></button>
                                        <p class="mb-0 text-danger"><i class="fa fa-ban"></i> {{ $mistake->mistake }}</p>
                                        <p class="mb-0 text-success"><i class="fa fa-check"></i> {{ $mistake->correction }}</p>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
               
            </div>
        </div>
    </div>
@endsection
@push('scripts')
@include('back-end.includes.component.tinymce')
<script>
    $(document).ready(function(){
        $('#mistake-form').submit(function(e) {
            var form = $(this)
            e.preventDefault();
            var action = $(this).attr('action')
            axios.post(action, $(this).serialize())
                .then( function(response) {
                    addToMistake(response.data)
                    form.trigger('reset')
                })
                .catch( function(error) {
                    console.log(error)
                })
        })

        function addToMistake(mistake){
            var html = "";
            html += `<div class="border p-2 mb-2" id="mistake-${mistake.id}">
                    <button class="close remove-mistake" id="${ mistake.id }"><span aria-hidden="true">&times;</span></button>
                    <p class="mb-0 text-danger"><i class="fa fa-ban"></i> ${ mistake.mistake }</p>
                    <p class="mb-0 text-success"><i class="fa fa-check"></i> ${ mistake.correction }</p>
                </div>`
            $('#mistakes-container').prepend(html)
        }

     

        $(document).on('click', '.remove-mistake', function(){
            var id = $(this).attr('id')
            if(confirm("Are you sure to delete?")){
                axios.delete('/teacher/mistake/' + id )
                    .then ( response => {
                        $('#mistake-' + id).remove();
                    })
            }   
        })
    })
</script>
@endpush