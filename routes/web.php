<?php

Auth::routes();


// =========  Front-end Route File ========= //

include('web/front-end.php');

// ========= end of Front-end Route File ========= //


// =========  Back-end Route File ========= //

include('web/back-end.php');

// ========= end of Back-end Route File ========= //
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
