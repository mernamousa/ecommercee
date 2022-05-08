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

Route::group(['namespace'=>'Admin','middleware'=>'lang'],function(){

    Route::get('lang/{lang}','Admins@lang');

    Route::get('login','Admins@login');
    Route::post('doLogin','Admins@doLogin');
    Route::get('forgetPass','Admins@forgetPass');
    Route::post('sendMail','Admins@sendMail');
    Route::get('verify_code_page','Admins@verify_code_page');
    Route::post('check_verify_code','Admins@check_verify_code');
    Route::get('reset_password/{email}','Admins@reset_password');
    Route::post('doResetPass','Admins@doResetPass');

    
    Route::group(['middleware'=>'admin_auth'],function(){
        //admin

        Route::get('/','Admins@dashboard');
        Route::get('adminInfo','Admins@adminInfo');
        Route::get('viewCreateAdmin/{id?}','Admins@viewCreateAdmin');
        Route::post('createAdmin','Admins@createAdmin');
        Route::get('deleteAdmin/{id}','Admins@deleteAdmin');
        //logout
        Route::get('logOut','Admins@logOut');

        //category
        Route::get('categoriesInfo','Categories@categoriesInfo');
        Route::get('viewCreateCategory/{id?}','Categories@viewCreateCategory');
        Route::post('createcategory','Categories@createcategory');
        Route::get('deleteCategory/{id}','Categories@deleteCategory');


        //sub
        Route::get('sub_categoriesInfo/{cat_id}','Categories@sub_categoriesInfo');
        Route::get('sub_viewCreateCategory/{cat_id}/{sub_cat_id?}','Categories@sub_viewCreateCategory');
        Route::post('sub_createCategory','Categories@sub_createCategory');



        //items
        Route::get('itemsInfo','Items@itemsInfo');
        Route::get('viewCreateItem/{id?}','Items@viewCreateItem');
        Route::post('createItem','Items@createItem');
        Route::get('deleteItem/{id}','Items@deleteItem');
        Route::get('sub_props/{prop_id}','Items@sub_props');
       
       //Property
        Route::get('PropertyInfo','Properties@PropertyInfo');
        Route::get('viewCreateProperty/{id?}','Properties@viewCreateProperty');
        Route::post('createProperty','Properties@createProperty');
        Route::get('deleteProperty/{id}','Properties@deleteProperty');

        //sub_property
        Route::get('sub_propertyInfo/{prop_id}','Properties@sub_propertyInfo');
        Route::get('sub_viewCreateProperty/{prop_id}/{sub_prop_id?}','Properties@sub_viewCreateProperty');
        Route::post('sub_createProperty','Properties@sub_createProperty');
        Route::get('sub_deleteProperty/{id}','Properties@sub_deleteProperty');

        //countryInfo
        Route::get('countryInfo','Countries@countryInfo');
        Route::get('viewCreateCountry/{id?}','Countries@viewCreateCountry');
        Route::post('createCountry','Countries@createCountry');
        Route::get('deleteCountry/{id}','Countries@deleteCountry');

        //cityInfo
        Route::get('cityInfo/{country_id}','Countries@cityInfo');
        Route::get('viewCreateCity/{country_id}/{city_id?}','Countries@viewCreateCity');
        Route::post('createCity','Countries@createCity');
        Route::get('deleteCity/{id}','Countries@deleteCity');



        //orders 
        Route::get('ordersInfo','Orders@ordersInfo');
        Route::get('deleteOrder/{order_id}','Orders@deleteOrder');
        Route::get('changeOrderStatus/{order_id}/{status}','Orders@changeOrderStatus');



    });


        
    

});
