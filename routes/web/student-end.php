<?php


Route::group(['as' => 'student.', 'prefix' => 'my-page', 'middleware' => ["auth", "student"]], function(){
    Route::get('/dashboard', 'Student\DashboardController@index')->name('dashboard.index');
    Route::get('/', 'Student\DashboardController@index');
    Route::get('/profile', 'Student\ProfileController@index')->name('profile');
    Route::get('/profile/change-password', 'Student\ProfileController@changepassword')->name('profile.changepassword');
    Route::post('/profile/change-password', 'Student\ProfileController@validatePassword')->name('profile.validatepassword');

    Route::get('/new', function(){
        return view('layouts.student-new');
    });
    
    Route::resource('class', 'Student\ClassController');
    Route::resource('transaction', 'Student\TransactionController');
    Route::resource('proofreading', 'Student\ProofReadingController');
    Route::resource('message', 'Student\MessageController');
    Route::post('message/{id}', 'Student\MessageController@sendComment')->name('message.sendComment');

    // Comment
    Route::delete('/comment/{id}', 'Student\CommentController@destroy')->name('comment.destroy');

    Route::post('classlot', 'Student\ClassController@slots')->name('class.slots');
});
