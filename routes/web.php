<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group(['namespace'=>'Web','middleware'=>'lang'],function(){
    Route::get('lang/{lang}','Admins@lang');

    Route::group(['middleware'=>'guest_remember'],function(){
    

        Route::get('login','Users@login');
        Route::get('register','Users@register');
        Route::post('doRegister','Users@doRegister');

        // user login with email and auth
        Route::post('doLogin','Users@doLogin');
        Route::get('forgetPass','Users@forgetPass');
        Route::post('sendMail','Users@sendMail');
        Route::get('verify_code_page','Users@verify_code_page');
        Route::post('check_verify_code','Users@check_verify_code');
        Route::get('changePass/{email}','Users@changePass');
        Route::post('doResetPass','Users@doResetPass');
        Route::post('postForgetPass','Users@postForgetPass');

        Route::get('profile','Users@profile');
        Route::post('updateProfile','Users@updateProfile');
        Route::get('logout','Users@logout');




        // user with remember_token

        Route::get('/','Home_pages@homePage');
        Route::get('categoryItems/{s_category_id}','Home_pages@categoryItems');
        Route::get('makeOrder/{item_id}','Home_pages@makeOrder');
        Route::get('user_cart','Home_pages@user_cart');
        Route::get('confirm_order/{order_id}','Home_pages@confirm_order');
        Route::get('changeQuantityPlusMinus/{order_item_id}/{operation}','Home_pages@changeQuantityPlusMinus');
        Route::get('deleteItem/{order_item_id}','Home_pages@deleteItem');
        Route::get('bestSeller','Home_pages@bestSeller');
        Route::get('offers','Home_pages@offers');
        Route::get('recently','Home_pages@recently');
        Route::get('add_to_fav/{item_id}','Home_pages@add_to_fav');
        Route::get('favItems','Home_pages@favItems');
        Route::get('search','Home_pages@search');
        Route::get('searchByPrice','Home_pages@searchByPrice');


    });




 });

Route::get('test','Test@test');

