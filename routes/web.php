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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

######################## Begin Drives Routes ########################
//Display all data
Route::get('drives', 'DriveController@index')->name('drives.index');

//go to create page
Route::get('drives/create', 'DriveController@create')->name('drives.create');

//store data in DB
Route::post('drives/create', 'DriveController@store')->name('drives.store');

//show data
Route::get('drives/show/{id}', 'DriveController@show')->name('drives.show');

//edit data
Route::get('drives/edit/{id}', 'DriveController@edit')->name('drives.edit');

//update data
Route::post('drives/edit/{id}', 'DriveController@update')->name('drives.update');

//delete data
Route::get('drives/destroy/{id}', 'DriveController@destroy')->name('drives.destroy');

//Download data
Route::get('drives/download/{id}', 'DriveController@download')->name('drives.download');

######################## End Drives Routes ########################