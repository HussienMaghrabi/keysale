<?php


    Route::post('/user-profile', 'UserAuth\ProfileController@index');
    Route::post('/update-user-profile', 'UserAuth\UpdateProfileController@index');
    Route::post('/user-update-fireBaseToken', 'UserAuth\FireBaseTokenUpdateController@index');
    Route::post('/user-logout', 'UserAuth\LogoutController@index');
    Route::post('/user-notifications', 'Notification\IndexController@index');


// miss password
    Route::post('/reset-new-password', 'ResetPassword\indexController@reset_new_password');

//verify
    Route::post('/verify-mobile-code', 'UserAuth\LoginController@verify_mobile_code');

// Favourite
    Route::post('/user-favourites', 'UserFavourite\IndexController@index');
    Route::post('/add-item-favourite', 'UserFavourite\IndexController@add_item_favourite');
    Route::post('/remove-item-favourite', 'UserFavourite\IndexController@remove_item_favourite');

// Chat
//    Route::post('/ChatRoomList', 'Chat\IndexController@ChatRoomList');
//    Route::post('/open-conversation', 'Chat\IndexController@open_conversation');
//    Route::post('/conversation-messages', 'Chat\IndexController@conversation_messages');
//    Route::post('/send-message', 'Chat\IndexController@send_messages');

    // Chat Room
    Route::post('/createNewChatRoom', 'ChatRoom\ChatRoomController@index');
    Route::post('/ChatRoomList', 'ChatRoom\ChatRoomController@ChatRoomList');
    Route::post('/ProductChatList', 'ChatRoom\ChatRoomController@ProductChatList');
    Route::post('/createAdminChatRoom', 'ChatRoom\ChatRoomController@index'); // Creat Chat With Admin
    Route::post('/sendNewMessageNotification', 'ChatRoom\ChatRoomController@sendNewMessageNotification');



// item
    Route::post('/add-item', 'Item\AddItemController@index');
    Route::post('/user-items', 'Item\UserItemController@index');
    Route::post('/delete-item', 'Item\UserItemController@delete');

// Add Mazad .
    Route::post('/add-item-request', 'Item\ItemRequestsController@index');


//Search
    Route::post('/myItems-search', 'Search\IndexController@myItems_search');

    // Follow List
    Route::post('/user-following-list', 'UserFollow\IndexController@following_list');
    Route::post('/user-followers-list', 'UserFollow\IndexController@followers_list');
    Route::post('/add-user-follow', 'UserFollow\IndexController@add_item_follow');
    Route::post('/remove-user-follow', 'UserFollow\IndexController@remove_item_follow');

    // Technical Support
    Route::post('/support', 'Support\IndexController@index');



