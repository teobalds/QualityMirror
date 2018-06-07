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
    return view('landing');
});

Route::get('/choose-platform', function () {
    return view('choose-os');
});

Route::get('/choose-platform/android', function () {
    return view('android-id');
});
Route::get('/choose-platform/ios', function () {
    return view('ios-id');
});
Route::get('/existing-android', 'AndroidController@prepare');
