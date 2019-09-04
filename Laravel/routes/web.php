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

Auth::routes();

Route::get('/', 'IndexController@index');

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/home', 'HomeController@postScore')->name('scorePost');

Route::get('/cup/{cup_number}', 'CupController@events')->name('cup');
Route::get('/event/{event_number}', 'EventController@index')->name('cup');

Route::get('/sample', 'SampleController@index')->name('sample');
Route::get('/chat', 'ChatController@index')->name('chat');

//Route::group(['prefix' => 'score'], function() {
//}

//Route::get('/event/{event_number}', 'eventController@index')->name('event');
