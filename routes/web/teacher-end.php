<?php
Route::group(['as' => 'teacher.', 'prefix' => 'teacher', 'middleware' => ["auth", "teacher"]], function(){
    Route::get('dashboard', 'Teacher\DashboardController@index')->name('dashboard.index');
    Route::resource('class', 'Teacher\ClassController');

    //profile
    Route::get('/profile', 'Teacher\ProfileController@index')->name('profile');
    Route::get('/profile/change-password', 'Teacher\ProfileController@changepassword')->name('profile.changepassword');
    Route::post('/profile/change-password', 'Teacher\ProfileController@validatePassword')->name('profile.validatepassword');

    Route::post('classlot', 'Teacher\ClassController@slots')->name('class.slots');
    Route::resource('proofreading', 'Teacher\ProofReadingController')->except(['create','edit']);

    Route::resource('mistake', 'Teacher\MistakeController');
});