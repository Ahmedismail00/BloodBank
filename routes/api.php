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
    Route::post('register','AuthController@register');
    Route::post('register-token','AuthController@register_token');
    Route::post('remove-token','AuthController@remove_token');
    Route::post('login','AuthController@login');
    Route::post('reset-password','AuthController@reset_password');
    Route::post('password','AuthController@password');
    Route::get('blood-types','MainController@blood_types');
    Route::get('governorates','MainController@governorates');
    Route::get('cities','MainController@cities');
    Route::get('posts','MainController@posts');
    Route::get('categories','MainController@categories');
    Route::get('donation-requests','MainController@donation_requests');
    Route::get('contact','MainController@contact');
    // Route::get('notification','MainController@notification');
    // Route::get('get_notification_settings','MainController@get_notification_settings');
    // Route::get('update_notification_settings','MainController@update_notification_settings');
    Route::get('settings','MainController@settings');


    Route::group(['middleware'=> 'auth:api'],function(){
        Route::post('edit-profile','AuthController@edit_profile');
        Route::get('post-favourite','MainController@post_favourite');
        Route::get('favourite-posts','MainController@favourites_posts');
        Route::get('create-donation-request','MainController@create_donation_request');

    });
});

