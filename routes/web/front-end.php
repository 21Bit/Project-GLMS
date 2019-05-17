<?php


Route::group(['as' => 'front-end.'], function(){
    Route::get('/', 'FrontEnd\PageController@home');
    
    //Enrollment
    Route::get('/start', 'FrontEnd\EnrollmentController@selectTeacher')->name("enrollment.start");
    Route::get('/slot', 'FrontEnd\EnrollmentController@selectSlot')->name("enrollment.slot");
    Route::get('/finish', 'FrontEnd\EnrollmentController@finish')->name("enrollment.finish");

    //Teacher
    Route::get("teacher", "FrontEnd\TeacherController@index")->name("teacher.index");
    Route::get("teacher/{username}", "FrontEnd\TeacherController@show")->name("teacher.show");

    // Route::get("test", function(){
    //    return Auth::user()->carts()->where("slot_id", 53)->first() ? 1 : 2;
    // });

    //Progressive API
    Route::post("api1/teacherslot/{id}" , "Api\TeacherApiController@getSlots");

    Route::group(['prefix' => 'api1', 'middleware' => "auth"], function(){
        //Route::get('cart', 'Api\CartController@index');
        //Route::get('cartsave', 'Api\CartController@store');
        Route::resource('cart', 'Api\CartController');
    });
});

