<?php

use Illuminate\Support\Facades\Route;
use App\Events\OrderMonitor;
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

Route::get('/monitor', function () {
    return view('monitor');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/notifications', 'MonitorController@notifications')->name('notifications');
