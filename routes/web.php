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

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/monitor', function () {
    return view('monitor');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Resource
Route::prefix('manage')->middleware('auth')->group(function () {
    // Notification
    Route::get('/notifications', 'NotificationController@index')->name('notifications.index');
    Route::post('/notifications/post', 'NotificationController@notifications')->name('notifications.post');
    Route::get('/notifications/create', 'NotificationController@create')->name('notifications.create');
    Route::post('/notifications/store', 'NotificationController@store')->name('notifications.store');
    Route::get('/notifications/edit/{id}', 'NotificationController@edit')->name('notifications.edit');
    Route::post('/notifications/update/{id}', 'NotificationController@update')->name('notifications.update');
    Route::get('/notifications/destroy/{id}', 'NotificationController@destroy')->name('notifications.destroy');
    Route::get('/notifications/quick_post/{id}', 'NotificationController@quick_notifications')->name('notifications.quick_post');
});

