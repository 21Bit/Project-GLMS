
window._ = require('lodash');
window.Popper = require('popper.js').default;

try {
    window.$ = window.jQuery = require('jquery');
    require('bootstrap');
    window.swal = require("sweetalert2")
} catch (e) {}


window.Cookies = require('js-cookie');
require('jqueryui');
require('jquery-slimscroll');


window.axios = require('axios');
window.moment = require('moment');
window.croppie = require('croppie');
window.fn = require('fullcalendar/dist/fullcalendar.js');
window.select2 = require('select2');
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

let token = document.head.querySelector('meta[name="csrf-token"]');

if (token) {
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
    console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}

 window.Vue = require('vue');


Vue.component('class-teacher', require('./components/back-end/class/ClassTeacher.vue'));

const vueApp = new Vue({
    el: '#content'
});

$('#select2').select2();

$('#select2teacher').select2({
     ajax: {
        url: '/back-end/api/select2teacher',
        dataType: 'json',
        delay: 250,
        data: function (params) {
            return {
                q: params.term, // search term
            };
        },
        processResults: function (data) {
            return {
                results: data
            };
        },
        cache: true
    },
    escapeMarkup: function (markup) { return markup; }, // let our custom formatter work
    minimumInputLength: 1,
})

$('#select2student').select2({
     ajax: {
        url: '/back-end/api/select2student',
        dataType: 'json',
        delay: 250,
        data: function (params) {
            return {
                q: params.term, // search term
            };
        },
        processResults: function (data) {
            return {
                results: data
            };
        },
        cache: true
    },
    escapeMarkup: function (markup) { return markup; }, // let our custom formatter work
    minimumInputLength: 1,
})

$('.remove-comment').click(function(){
    if(confirm("Are you sure to delete?")){
        var id = $(this).attr('id')
        axios.delete('/back-end/comment/' + id)
            .then( response => {
                $('#comment-' + id).fadeOut()
            })
            .catch( error => {
                console.log(error)
            })
    }
})

$('.teacher-change-link').click(function(){
    $('#class-teacher-form').show()
})

$('[data-modal="delete"]').click(function(e){
    e.preventDefault();
    $('#deleteModalUlr').val($(this).data('url'))
    $('#deleteModalRedirectUlr').val($(this).data('redirectUrl'))
    $('#delete-modal').modal('show')
})

$('#deleteModalBtn').click(function(){
    var url = $('#deleteModalUlr').val()
    var redirectUrl = $('#deleteModalRedirectUlr').val()
    axios.delete(url)
        .then( response =>{
            window.open(redirectUrl, 'self')
        })
        .catch( error => {
            
        })
})