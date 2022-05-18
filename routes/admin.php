<?php

// admin
    Route::get('/dash', 'Dashboard\DashboardController@index');

    Route::resource('/users', 'User\IndexController');
    Route::resource('/supports', 'Support\IndexController');
    Route::resource('/mainCategories', 'MainCategory\IndexController');
    Route::resource('/categories', 'Category\IndexController');
    Route::resource('/subCategories', 'SubCategory\IndexController');
    Route::resource('/sub2Categories', 'Sub2Category\IndexController');
    Route::resource('/items', 'Item\ItemController');
    Route::resource('/items.images', 'Item\ItemImagesController');
    Route::resource('/status', 'Status\ItemController');
    Route::resource('/contacts', 'ContactUs\IndexController');
    Route::resource('/techs', 'Techs\IndexController');
    Route::resource('/advertisements', 'Advertisement\IndexController');
    Route::resource('/socialmedia', 'SocialMedia\IndexController');
    Route::resource('/countries', 'Country\IndexController');


    Route::resource('/notifications', 'Notification\IndexController');
    Route::get('/userNotifiy/{id}', 'User\UserNotificationController@index');
    Route::post('/userNotifiyStore', 'User\UserNotificationController@userNotifiyStore');


    Route::get('/about', 'About\IndexController@index')->name('about');
    Route::put('/about/{id}', 'About\IndexController@update')->name('about_update');
    Route::get('/terms', 'Terms\IndexController@index')->name('terms');
    Route::put('/terms/{id}', 'Terms\IndexController@update')->name('terms_update');

    Auth::routes();
