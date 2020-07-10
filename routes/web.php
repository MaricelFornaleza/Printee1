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

Route::get('/auth/login', 'Auth\LoginController@authenticated');

Route::get('/post/create', 'PostsController@create');
Route::get('/post/{id}/edit', 'PostsController@edit');
Route::put('/post/{id}', 'PostsController@update');
Route::delete('/post/{id}', 'PostsController@destroy');
Route::post('/post', 'PostsController@store');

Route::get('/transaction/upload/{id}', 'TransactionsController@upload')->name('transaction.upload');
Route::get('/transaction/view/{id}', 'TransactionsController@view')->name('transaction.view');
Route::put('/transaction/{id}', 'TransactionsController@update');
Route::get('/transaction/download/{file}', 'TransactionsController@download');
Route::get('/transaction/{id}', 'TransactionsController@show')->name('transaction.show');
Route::post('/transaction', 'TransactionsController@store');

Route::get('/admin/{user}', 'AdminsController@index')->name('admin.show');
Route::get('/admin/{user}/edit', 'AdminsController@edit');
Route::put('/admin/{user}', 'AdminsController@update');

Route::get('/user/{user}', 'UsersController@index')->name('user.show');
Route::get('/user/{user}/edit', 'UsersController@edit');
Route::put('/user/{user}', 'UsersController@update');

Route::get('auth/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get('auth/{provider}/callback', 'Auth\LoginController@handleProviderCallback');

Route::post('sms', 'SmsController@sendSms');

Auth::routes();


// Route::get('/home', 'HomeController@index')->name('home');