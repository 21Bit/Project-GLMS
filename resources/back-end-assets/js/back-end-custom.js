    $('[data-toggle="tooltip"]').tooltip(); 
 
    dataTableReload = function (){
        window.LaravelDataTables["dataTableBuilder"].ajax.reload()
    }
    
    readURL = function(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#image-preview')
                    .attr('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
    
    $(document).on('click','#checkAll', function(){
        $('input:checkbox').not(this).prop('checked', this.checked);
    });
    
    $("#submitAllDeleteAllForm").click(function(){
        var formData = $("#datatable-form").serialize();
        console.log(formData)
        var action = $("#datatable-form").attr("action")
    
        axios.post(action, formData)
            .then(response => {
                $("#delete-all-modal").modal("hide")
                //$('input:checkbox').not(this).prop('checked', this.checked);
                dataTableReload()
            })
            .catch( error => {
                console.log(error)
            })
    })
    
    // /* Holiday */
        $('#addHolidayForm').submit(function(e){
            e.preventDefault()
            var mode =  $('input[name=mode]').val()
            var url = $(this).attr('action')
            if(mode == "ADD"){
                axios.post(url, $(this).serialize())
                    .then( response => {
                        dataTableReload()
                        $('#holidayModal').modal('hide');
                        $(this).trigger('reset')
                    })
                    .catch( error => {
                        console.log(error)
                    })
            }else{
                axios.put(url, $(this).serialize())
                    .then( response => {
                        $('#holidayModal').modal('hide');
                        $(this).trigger('reset')
                        dataTableReload()
                    })
                    .catch( error => {
                        console.log(error)
                    })
            }
        })
                    
        $(document).on('click', '.editHoliday', function(){
            var url = $(this).attr('href')
            var id = $(this).data('id')
            axios.get(url)
                .then( response => {
                    $('input[name=mode]').val("EDIT")
                    $('input[name=name]').val(response.data.name)
                    $('input[name=date]').val(response.data.date)
                    $('textarea[name=details]').val(response.data.details)
                    $('#holidayModal').modal('show');
                    $('#addHolidayForm').attr('action', '/back-end/holiday/' + id)
                })
                .catch( error => {
                    console.log(error)
                })
    
            return false;
        })
    
        
        $('#reload').click(function(){
            dataTableReload()
        })
    
    
        $('#openHolidaForm').click(function(e){
            e.preventDefault()
            $('input[name=mode]').val("ADD")
            $('#holidayModal').modal('show')
            $('#addHolidayForm').trigger('reset')
        })
    
    
        $('#holidayModal').on('shown.bs.modal', function () {
            $('input[name=name]').trigger('focus')
        })
    
    
    
        function loadCalendar(url){
            $('#calendar').fullCalendar({
                themeSystem: 'bootstrap4',
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay,listMonth'
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
                                    title: e.title,
                                    start: e.start, // will be parsed
                                    end: e.end // will be parsed
                                });
                            })
    
                            callback(events);
                        })
                        .catch( error => {
                            console.log(error)
                        })
                },
                eventClick: function(event){
                    var deleteMode = $('#deleteMode').prop("checked")
                    if(deleteMode){
                        swal.fire({
                            title: 'Are you sure?',
                            text: event.start._i + " will be deleted",
                            type: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Yes, delete it!'
                        }).then((result) => {
                            if (result.value) {
                                axios.post('/back-end/teacher/deleteslot/' + event.id)
                                    .then( response => {
                                        $('#calendar').fullCalendar('removeEvents', event._id)
                                    })
                                    .catch( error => {
                                        console.log(error)
                                    })
                            }
                        })
                    }else{
                        
                    }
                }
            });
        }  
    
    
        $('#slotForm').submit( function(e){
            e.preventDefault()
            var data = $(this).serialize();
            var action = $(this).attr('action')
            axios.post(action, data)
                .then( response => {
                   // console.log(response.data)
                    $('#calendar').fullCalendar( 'refetchEvents' );
                    $(this).trigger("reset")
                })     
                .catch( error => {
                    console.log(error)
                })           
        })
    
    
        $('#reloadCalendar').click(function(){
            return false
            loadCalendar()
        })

        $('#otherFunctionsBtn').on("change", function(){
            if (this.checked) {
                $('#otherFunctions').show()
            } else {
                $('#otherFunctions').hide()
            }
        })

        if($('[data-render=calendar]').length !== 0){
            $('[data-render=calendar]').each(function() {
                var url = $(this).data("url")
                loadCalendar(url)
            });
        }


        var resize = $('#crop-image-container').croppie({
            enableExif: true,
            enableOrientation: true,    
            viewport: { // Default { width: 100, height: 100, type: 'square' } 
                width: 200,
                height: 200,
                type: 'square'
            },
            boundary: {
                width: 300,
                height: 300
            }
        });

        $('#image-input').on('change', function () { 
            var reader = new FileReader();
            $("#cropper-modal").modal("show")
            reader.onload = function (e) {
                resize.croppie('bind',{
                    url: e.target.result
                }).then(function(){
                    console.log('jQuery bind complete');
                });
            }
            reader.readAsDataURL(this.files[0]);
        });

        $("#crop-done-btn").on('click', function (ev) {
            resize.croppie('result', {
                type: 'canvas',
                size: 'viewport'
            }).then(function (img) {
                $("#image-preview").attr("src", img)
                $("input[name=cropped_image").val(img)
                $("#cropper-modal").modal("hide")
            });
        });
    
        
        
        
        