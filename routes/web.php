<?php

Auth::routes(['verify' => true]);

Route::get("test", function(){
    return inCart(request()->id) ? 1 : 0;
});
// =========  Front-end Route File ========= //

include('web/front-end.php');

// ========= end of Front-end Route File ========= //


// =========  Back-end Route File ========= //

include('web/back-end.php');

// ========= end of Back-end Route File ========= //
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
