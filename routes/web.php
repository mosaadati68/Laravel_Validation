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

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/validation1', 'ValidationController@index')->name('validation.create');
Route::post('/validation1', 'ValidationController@store')->name('validation.store');

Route::get('/ajax', 'AjaxController@index')->name('ajax.index');
Route::post('/ajax', 'AjaxController@store')->name('ajax.store');

Route::get('/custom-validation', 'CustomValidationController@index')->name('custom-validation.index');
Route::post('/custom-validation', 'CustomValidationController@store')->name('custom-validation.store');