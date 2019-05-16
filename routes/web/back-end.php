<?php

Route::group(['as' => 'back-end.', 'prefix' => 'back-end', 'middleware' => "auth"], function(){

    Route::get("/dashboard", "BackEnd\DashboardController@index")->name("dashboard.index");

    //Contents
    Route::resource('notice', 'BackEnd\NoticeController');
    Route::post('book/deletemultiple', 'BackEnd\BookController@deletemultiple')->name("book.multidelete");

    Route::post('book/deletemultiple', 'BackEnd\BookController@deletemultiple')->name("book.multidelete");
    Route::resource('book', 'BackEnd\BookController');

    Route::post('blog/deletemultiple', 'BackEnd\BlogController@multidelete')->name("blog.multidelete");
    Route::resource('blog', 'BackEnd\BlogController');

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

    Route::post('holiday/multidelete', 'BackEnd\HolidayController@multidelete')->name("holiday.multidelete");
    Route::resource('holiday', 'BackEnd\HolidayController');

    Route::resource('setting', 'BackEnd\SettingController');
    Route::resource('class', 'BackEnd\ClassController');



    //API
    Route::resource('api/transaction', 'Api\TransactionController');

});