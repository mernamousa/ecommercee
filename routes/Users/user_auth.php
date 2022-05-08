<?php
use Illuminate\Support\Facades\Route;



Route::group(['namespace'=>'Users'],function(){
    //Un auth Routes

    //users
    Route::post('register','Users@register');
    Route::post('doLogin','Users@doLogin');
    Route::post('postForgetPass','Users@postForgetPass');

    //categories
    Route::get('categoriesInfo','Home_page@categoriesInfo');

    //sub
    Route::get('sub_categoriesInfo/{cat_id}','Home_page@sub_categoriesInfo');

    //items
    Route::get('itemsInfo/{sub_cat_id}','Home_page@itemsInfo');

    //item
    Route::get('item/{id}','Home_page@item');

    //Auth Routes
    Route::group(['middleware'=>'user_auth_api'],function(){

        //users
        Route::get('profile','Users@profile');
        Route::post('updateProfile','Users@updateProfile');
        Route::post('changePassword','Users@changePassword');
        Route::get('logOut','Users@logOut');

        //recovery verify code
        Route::post('sendMail','Users@sendMail');
        Route::post('doResetPass','Users@doResetPass');



        //orders
        Route::post('makeOrder','Orders@makeOrder');
        Route::get('userCart','Orders@userCart');
        Route::post('changeQuantity/{order_item_id}','Orders@changeQuantity');
        Route::post('deleteItem/{order_item_id}','Orders@deleteItem');
        Route::get('changeQuantityPlusMinus/{order_item_id}/{operation}','Orders@changeQuantityPlusMinus');
        Route::post('changeOrderStatus/{order_id}','Orders@changeOrderStatus');
        Route::get('searchItem/{keyWord}','Orders@searchItem');
        Route::post('searchPrice','Orders@searchPrice');



    });
});
