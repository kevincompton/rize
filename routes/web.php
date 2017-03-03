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

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/rizeups', 'RizeController@index');
Route::get('/rize/show/{rize}', 'RizeController@show');

Route::post('/chime', 'RizeController@chime');
Route::post('/chime/event', 'EventController@chime');

Route::get('/events', 'EventController@index');
Route::get('/events/show/{event}', 'EventController@show');
Route::get('/event/{event}', 'EventController@edit');
Route::post('/event/update', 'EventController@update');
Route::post('/event/store', 'EventController@store');
Route::get('/events/new', 'EventController@new');

Route::get('auth/{provider}', 'SocialAuthController@redirectToProvider');
Route::get('auth/{provider}/callback', 'SocialAuthController@handleProviderCallback');