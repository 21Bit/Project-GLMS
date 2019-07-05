<?php

Route::group(['as' => 'back-end.', 'prefix' => 'back-end', 'middleware' => ["auth", "admin"]], function(){

    Route::get("/dashboard", "BackEnd\DashboardController@index")->name("dashboard.index");

    // Transaction
    Route::post('transaction/deletemultiple', 'BackEnd\TransactionController@deletemultiple')->name("transaction.multidelete");
    Route::get("transaction/today", 'BackEnd\TransactionController@today')->name("transaction.today");
    Route::post("transaction/{id}/validated", 'BackEnd\TransactionController@validated')->name("transaction.validated");
    Route::resource("transaction", 'BackEnd\TransactionController');

    //Credit Package
    Route::post('credit-package/deletemultiple', 'BackEnd\CreditPackageController@deletemultiple')->name("credit-package.multidelete");
    Route::resource("credit-package", "BackEnd\CreditPackageController");

    Route::delete('/comment/{id}', 'BackEnd\CommentController@destroy')->name('comment.destroy');

    Route::post('creteria/deletemultiple', 'BackEnd\CreteriaController@deletemultiple')->name("creteria.multidelete");
    Route::resource("creteria", "BackEnd\CreteriaController");

    //Contents
    Route::resource('notice', 'BackEnd\NoticeController');
    Route::post('book/deletemultiple', 'BackEnd\BookController@deletemultiple')->name("book.multidelete");

    //Book
    Route::post('book/deletemultiple', 'BackEnd\BookController@deletemultiple')->name("book.multidelete");
    Route::resource('book', 'BackEnd\BookController');

    //Blog
    Route::post('blog/deletemultiple', 'BackEnd\BlogController@multidelete')->name("blog.multidelete");
    Route::resource('blog', 'BackEnd\BlogController');

    //Notice
    Route::post('notice/deletemultiple', 'BackEnd\NoticeController@multidelete')->name("notice.multidelete");
    Route::resource('notice', 'BackEnd\NoticeController');

    //Student
    Route::get('student/{id}/transaction', 'BackEnd\StudentController@transaction')->name('student.transaction');
    Route::get('student/{id}/transaction/list', 'BackEnd\StudentController@transactionList')->name('student.transaction.list');
    Route::post('student/{id}/transaction', 'BackEnd\StudentController@addTransaction')->name('student.transaction.store');
    Route::post('student/deletemultiple', 'BackEnd\StudentController@deletemultiple')->name("student.multidelete");
    Route::resource('student', 'BackEnd\StudentController');

    //teachers
    Route::post('teacher/slots/{id}', 'BackEnd\TeacherController@getSlots')->name('teacher.slot.getslot');
    Route::post('teacher/slot/{id}', 'BackEnd\TeacherController@slotStore')->name('teacher.slot.store');
    Route::post('teacher/deleteslot/{id}', 'BackEnd\TeacherController@deleteSlot')->name('teacher.slot.deleteSlot');
    Route::get('teacher/{id}/class', 'BackEnd\TeacherController@classTable')->name('teacher.show.class');
    Route::get('teacher/{id}/activity', 'BackEnd\TeacherController@activity')->name('teacher.show.activity');
    Route::post('teacher/deletemultiple', 'BackEnd\TeacherController@deletemultiple')->name("teacher.multidelete");
    Route::get('teacher/{id}/profile', 'BackEnd\TeacherController@profile')->name("teacher.profile");
    Route::resource('teacher', 'BackEnd\TeacherController');

    //Messages 
    Route::resource('message', 'BackEnd\MessageController')->except(['create', 'store']);
    Route::post('message/{id}', 'BackEnd\MessageController@sendComment')->name('message.sendComment');



    Route::post('holiday/multidelete', 'BackEnd\HolidayController@multidelete')->name("holiday.multidelete");
    Route::resource('holiday', 'BackEnd\HolidayController');

    Route::resource('setting', 'BackEnd\SettingController');
    Route::resource('class', 'BackEnd\ClassController');



    //API
    Route::group(['as' => 'back-end.api.', 'prefix' => '/api',], function(){
        // Route::resource('transaction', 'Api\TransactionApiController');
        Route::get('select2teacher', 'Api\TeacherApiController@select2Teacher');
        Route::get('select2student', 'Api\TeacherApiController@select2Student');
        Route::post('getclassteacher/{id}', 'Api\TeacherApiController@getTeacherInClass');
        Route::post('changeteacher/{id}', 'Api\TeacherApiController@changeTeacher');

    });

});