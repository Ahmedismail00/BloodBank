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
    Route::get('register','AuthController@register');                                               // register (done)
    Route::post('login','AuthController@login');                                                     // login    (done)
    Route::get('reset-password','AuthController@reset_password');                                   // password reset (done)
    Route::get('password','AuthController@password');                                   // password reset (done)
    Route::get('blood_types','MainController@blood_types');                                         // blood-types  (done)
    Route::get('governorates','MainController@governorates');                                       // governorates (done)
    Route::get('cities','MainController@cities');                                                   // cities (done)
    Route::get('posts','MainController@posts');                                                     // posts (done)
    Route::get('categories','MainController@categories');                                           // categories (done)
    Route::get('post','MainController@post');                                                       // post
    Route::get('donation_requests','MainController@donation_requests');                             // donation-requests
    Route::get('create_donation_request','MainController@create_donation_request');                 // create-donation-request
    Route::get('notification','MainController@notification');                                       // notification
    Route::get('get_notification_settings','MainController@get_notification_settings');             // get_notification_settings
    Route::get('update_notification_settings','MainController@update_notification_settings');       // update_notification_settings
    Route::get('settings','MainController@settings');                                               // settings
    Route::get('contact','MainController@contact');                                                 // contact(done)


    Route::group(['middleware'=> 'auth:api'],function(){
        Route::post('edit_profile','AuthController@edit_profile');                                  // edit_profile  (done)
        Route::get('post-favourities','MainController@postFavourites');                            // favourities

    });
});

