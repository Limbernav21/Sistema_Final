(<?php

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

Route::Resource('admin/irrigation', 'IrrigationController');
Route::Resource('admin/crop','CropController');

Route::get('/welcome', 'HomeController@index')->name('welcome');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
