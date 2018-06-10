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
Route::get('/', 'SetupController@action')->name('choose.action');
Route::post('/choose-platform', 'SetupController@os')->name('choose.os');
Route::post('/choose-platform/android', 'SetupController@android')->name('input.android');
Route::post('/choose-platform/ios', 'SetupController@ios')->name('input.ios');

Route::post('/new/survey', 'SurveyController@new')->name('survey.new');
Route::post('/existing/survey', 'SurveyController@existing')->name('survey.existing');
Route::post('/existing/results', 'ResultsController@existing')->name('results.existing');
Route::post('/new/results', 'ResultsController@new')->name('results.new');

