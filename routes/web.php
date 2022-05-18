<?php


Route::get('/admin', 'Admin\Auth\LoginController@index');
Route::post('/adminlogin', 'Admin\Auth\LoginController@adminlogin');
Route::post('/adminlogout', 'Admin\Auth\LoginController@adminlogout');





Route::get('/clear', function() {
    Artisan::call('cache:clear');
    session()->flash('success',trans('Cache has bees cleared successfully.'));
    return redirect('/');
});

Auth::routes();


// WebSite

    // Auth System
    Route::get('/login', 'Site\Auth\LoginController@index');
    Route::post('/loginAction', 'Site\Auth\LoginController@loginAction');
    Route::get('/registerAction', 'Site\Auth\RegisterController@index');
    Route::post('/register', 'Site\Auth\RegisterController@register');



    Route::get('/', 'Site\Home\IndexController@index');
    Route::get('/engines', 'Site\Engines\IndexController@index');
    Route::get('/sub_categories/{id}', 'Site\Category\IndexController@index');
    Route::get('/sub_sub_categories/{id}', 'Site\Category\IndexController@sub_sub_categories');
    Route::get('/items/{id}', 'Site\Item\IndexController@index');
    Route::get('/itemProduct/{id}', 'Site\Item\IndexController@details');

    Route::get('/mazadItems', 'Site\Mazad\IndexController@index');


    Route::get('/addProduct', 'Site\Home\IndexController@addProduct');
    Route::get('/ProductDetails/{id}', 'Site\Home\IndexController@ProductDetails');


    /// Will Move To site.php
    Route::get('/profile', 'Site\Profile\IndexController@index');
