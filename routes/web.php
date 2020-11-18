<?php

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
Route::group(['namespace'=>'Front'],function(){
    Route::get('/','MainController@home')->name('home_page');
    Route::get('About-us','MainController@about_us')->name('about_us');
    Route::get('contact-us','MainController@contact_us')->name('contact_us');
    Route::get('contact-us-send','MainController@contact_us_send')->name('contact_us_send');
    Route::get('article-details/{id}','MainController@article_details')->name('aricle_details');
    Route::get('sign-up','AuthController@sign_up')->name('sign_up');
    Route::Post('sign-up-save','AuthController@sign_up_save')->name('sign_up_save');
    Route::get('sign-in','AuthController@sign_in')->name('sign_in');
    Route::post('sign-in-save','AuthController@sign_in_save')->name('sign_in_save');
    Route::get('sign-out','AuthController@sign_out')->name('sign_out');
    Route::get('donations-search','MainController@donations_search')->name('donations_search');
    Route::get('donation-requests','MainController@donation_requests')->name('donation_requests');
    Route::get('inside-request/{id}','MainController@inside_request')->name('inside_request');

    Route::group(['middleware' => 'auth:client'],function(){
        Route::get('make-donation-request','MainController@make_donation_request')->name('make_donation_request');
        Route::post('send-donation-request','MainController@send_donation_request')->name('send_donation_request');
        Route::post('toogle-favourite','MainController@toggleFavourite')->name('toggle-favourite');
        Route::resource('profile','ProfileController');
    });
});




Auth::routes([

]);
Route::group(['middleware'=> ['auth:web','auto-check-permission','guest']],function(){
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('categories', 'CategoriesController');
    Route::resource('cities', 'CitiesController');
    Route::resource('clients', 'ClientsController');
    Route::resource('donationRequests', 'DonationRequestsController');
    Route::resource('governorates', 'GovernoratesController');
    Route::resource('posts', 'PostsController');
    Route::resource('contacts', 'ContactsController');
    Route::resource('settings', 'SettingsController');
    Route::get('logout','HomeController@logout');
    Route::resource('users','UsersController');
    Route::resource('roles','RoleController');
});




