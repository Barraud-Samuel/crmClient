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

Route::get('/', 'PagesController@index');
Route::get('/about', 'PagesController@about');

Route::get('/profil', 'PagesController@profil');

Route::get('/dashboard', 'PagesController@dashboard');

Route::get('/operations/{id}/create','OperationsController@CLcreate');

Route::resource('clients','ClientsController');

Route::resource('operations','OperationsController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
