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


Route::get('/', function () {
    return view('welcome');
});

Auth::routes([

]);
Route::group(['middleware'=> ['auth','auto-check-permission']],function(){
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

