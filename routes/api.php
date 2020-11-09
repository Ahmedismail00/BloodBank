<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group(['prefix'=>'v1','namespace'=>'Api'],function(){
    Route::post('register','AuthController@register');                                               // register (done)
    Route::post('register-token','AuthController@register_token');                                       // register token (done)
    Route::post('login','AuthController@login');                                                        // login    (done)
    Route::post('reset-password','AuthController@reset_password');                                   // password reset (done)
    Route::post('password','AuthController@password');                                               // password reset (done)
    Route::get('blood-types','MainController@blood_types');                                         // blood-types  (done)
    Route::get('governorates','MainController@governorates');                                       // governorates (done)
    Route::get('cities','MainController@cities');                                                   // cities (done)
    Route::get('posts','MainController@posts');                                                     // posts (done)
    Route::get('categories','MainController@categories');                                           // categories (done)
    Route::get('donation-requests','MainController@donation_requests');                             // donation-requests
    Route::get('contact','MainController@contact');                                              // contact(done)

    // Route::get('post','MainController@post');                                                       // post
    // Route::get('notification','MainController@notification');                                       // notification
    // Route::get('get_notification_settings','MainController@get_notification_settings');             // get_notification_settings
    // Route::get('update_notification_settings','MainController@update_notification_settings');       // update_notification_settings
    Route::get('settings','MainController@settings');                                               // settings


    Route::group(['middleware'=> 'auth:api'],function(){
        Route::post('edit-profile','AuthController@edit_profile');                                  // edit_profile  (done)
        Route::get('post-favourite','MainController@postFavourite');                                // favourities  (done)
        Route::get('my-favourite','MainController@myFavourites');                                   // my favourities (done)
        Route::get('create_donation_request','MainController@create_donation_request');             // create-donation-request
        Route::post('remove-token','AuthController@remove_token') ;                                  // remove token (Done)

    });
});

