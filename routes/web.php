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

// Route::get('/welcome', function () {
//     return view('welcome');
// });

Auth::routes();

//Kode kita mulai dari sini
Route::get('/','PagesController@index');
Route::get('/admin', 'HomeController@index');
Route::get('/artikels/admin', 'ArtikelController@admin');
Route::get('/ambulans/admin', 'AmbulanController@admin');
Route::get('/poskos/search','PoskoKesehatanController@search');
Route::get('/poskos/admin', 'PoskoKesehatanController@admin');
Route::get('/contact','PagesController@contact');
Route::get('/relawans/search','RelawanController@search');

Route::resource('ambulans', 'AmbulanController');
Route::resource('artikels', 'ArtikelController');
Route::resource('laporans', 'LaporanController');
Route::resource('relawans', 'RelawanController');
Route::resource('poskos', 'PoskoKesehatanController');
