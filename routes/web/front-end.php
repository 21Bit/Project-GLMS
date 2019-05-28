<?php


Route::group(['as' => 'front-end.'], function(){
    Route::get('/', 'FrontEnd\PageController@home');
    
    //Credit
    // Route::group(['middleware' => 'auth'], function(){
        
        Route::get('credits','FrontEnd\CreditController@index')->name("credit.index");
        Route::post('credits','FrontEnd\CreditController@saveSelection')->name("credit.save");
        Route::get('credits/checkout','FrontEnd\CreditController@checkout')->name("credit.checkout");

        // Bank Payment
        Route::post('credits/checkout/bank','FrontEnd\BankPaymentController@storeTransaction')->name("credit.checkout.bank");

        Route::get('success','FrontEnd\TransactionController@success')->name("transaction.success");

    // });

    //cart
    Route::get('/cart', 'FrontEnd\CartController@index')->name("cart.index");
    Route::get('/cart/check-out', 'FrontEnd\CartController@checkout')->name("cart.checkout");
    Route::delete('/cart/{id}', 'FrontEnd\CartController@remove')->name("cart.remove");


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

