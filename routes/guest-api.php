<?php


    Route::post('/login', 'UserAuth\LoginController@index');
    Route::post('/loginBySocialMedia', 'UserAuth\LoginController@loginBySocialMedia');
    Route::post('/register', 'UserAuth\RegistrationController@index');



    Route::post('/countries','Country\indexController@index');



// reset password
    Route::post('/forget-password', 'ResetPassword\indexController@index');
    Route::post('/confirm-password-code', 'ResetPassword\indexController@confirm_code');
    Route::post('/resend-password-code', 'ResetPassword\indexController@resend_password_code');


//terms
    Route::post('/social-media', 'SocialMedia\indexController@index');
    Route::post('/terms', 'Terms\IndexController@index');
    Route::post('/about-us', 'About\IndexController@index');
    Route::post('/contact-us', 'ContactUs\IndexController@index');

// TapBar
    Route::post('/engine', 'TabBar\IndexController@engine');
    Route::post('/mazad', 'TabBar\IndexController@mazad');
    Route::post('/cycles', 'TabBar\IndexController@cycles');


//categories
    Route::post('/mainCategories', 'MainCategory\IndexController@index');
    Route::post('/categories', 'Category\IndexController@index');
    Route::post('/sub-category', 'SubCategory\IndexController@index');
    Route::post('/sub-sub-category', 'SubSubCategory\IndexController@index');
// items
    Route::post('/main-category-items', 'Item\IndexController@main_categories_item');
    Route::post('/category-items', 'Item\IndexController@categories_item');
    Route::post('/sub-category-items', 'Item\IndexController@sub_categories_item');
    Route::post('/sub-sub-category-items', 'Item\IndexController@sub_sub_category_items');


// item
    Route::post('/item-details', 'Item\ItemDetailsController@index');
    Route::post('/status', 'Item\ItemStatusController@index');

//advertisement
    Route::post('/advertisement', 'Advertisement\IndexController@index'); // home
    Route::post('/main_cat_advertisement', 'Advertisement\IndexController@main_cat_advertisement');
    Route::post('/cat_advertisement', 'Advertisement\IndexController@cat_advertisement');
    Route::post('/sub_advertisement', 'Advertisement\IndexController@sub_advertisement');
    Route::post('/sub_sub_advertisement', 'Advertisement\IndexController@sub_sub_advertisement');


//Home Page
    Route::post('/home-page', 'HomePage\IndexController@index');


// Search
    Route::post('/home-search', 'Search\IndexController@home_search');
    Route::post('/categories-search', 'Search\IndexController@categories_search');
    Route::post('/sub-categories-search', 'Search\IndexController@sub_categories_search');
    Route::post('/sub-sub-categories-search', 'Search\IndexController@sub_sub_categories_search');
    Route::post('/items-search', 'Search\IndexController@items_search');

    // representative list
    Route::post('/representative', 'Representative\IndexController@index');
