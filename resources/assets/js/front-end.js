window.Cookies = require('js-cookie');

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

let token = document.head.querySelector('meta[name="csrf-token"]');

if (token) {
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
    console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}

window.Vue = require('vue');
Vue.component('login-component', require('./components/front-end/LoginComponent'));
Vue.component('register-component', require('./components/front-end/RegisterComponent'));

//Validate
//window.validate = require("validate.js");

const app = new Vue({
    el: '#page-container'
});


$(document).on('click','.remove-cart', function(){
    var id = $(this).data('id')
    axios.post('/api1/cart', {slot_id: id})
        .then(response => {
            $(`#cart-li-${id}`).fadeOut()
        })
        .catch( error => {
            console.log(error)
        })
})

window.mobilecheck = function() {
    var check = false;
    (function(a){if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i.test(a)||/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0,4))) check = true;})(navigator.userAgent||navigator.vendor||window.opera);
    return check;
};
    
    var url = $("#calendar").data("url");
    if($("#calendar").length){
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
            defaultView: window.mobilecheck() ? "agendaWeek" : "month",
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
                                className: e.selected ? "btn rounded-0 btn-xs btn-danger p-1 fc-event m-1 border-1" : "btn rounded-0 btn-xs btn-success p-1 fc-event m-1 border-1" ,
                                selected: e.selected,
                            });
                        })
                        callback(events);
                    })
                    .catch( error => {
                        console.log(error)
                    })
            },
            eventClick: function(event){
                var slotnumber = parseInt($("#slotnumber").html());
                axios.post('/api1/cart', {slot_id: event.id})
                    .then( response => {
                        if(response.data.is_added){
                            this.className = "btn btn-sm btn-danger fc-event m-1 border-1"
                            this.selected = true
                            $("#slotnumber").html(slotnumber + 1)  
                            doAddtoCartTopMenu(response.data)  
                        }else{
                            this.className = "btn btn-sm btn-success fc-event m-1 border-1"
                            this.selected = false
                            $("#slotnumber").html(slotnumber - 1)
                            $(`#cart-li-${response.data.id}`).fadeOut()
                        }
                    })
                    .catch( error => {
                        if(error.response.status == 401){
                            $('#loginRegisterModal').modal("show");
                        }
                    })
            
            }
        });
    }

    function doAddtoCartTopMenu(cart){
        var li = `<li id="cart-li-${cart.id}">`
            li  +=      `<div class="cart-item-info">`
            li  +=          `<h4>`
            li  +=              `${cart.date_time}<br>`
            li  +=              `<small>${cart.teacher}</small>`
            li  +=          `</h4>`
            li  +=      `</div>`
            li  +=      `<div class="cart-item-close">`
            li  +=          `<a href="#" class="remove-cart" data-id="${ cart.id }" data-toggle="tooltip" data-title="Remove">&times;</a>`
            li  +=      `</div>`
            li  += `</li>`;
        $('.cart-body .cart-item').append(li)
    }


    $("input.checkbox").change(function(){
        var currentCredits = parseInt($("#total-credits").html().replace(",",""))
        var currentPrice = parseInt($("#total-price").html().replace(",",""))
        var credit = parseInt($(this).data('credits'))
        var price = parseInt($(this).data('price'))


        if((this).checked){
            $("#total-credits").html(currentCredits + credit)
            $("#total-price").html(currentPrice + price)
        }else{
            $("#total-credits").html(currentCredits - credit)
            $("#total-price").html(currentPrice - price)
        }
    });


    $('#bankPaymentForm').submit(function(e){
        e.preventDefault();
        var data = $(this).serialize();
        var action = $(this).attr("action")

        axios.post(action, data)
            .then( response => {
                window.open('/success?r=' + response.data.reference_number, "_self");
            })
            .catch(error => {
                console.log(error)
            })
    })