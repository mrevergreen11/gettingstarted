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


Route::prefix('admin')->group(function(){
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/approve/{id}','AdminController@approve')->name('admin.approve');
    Route::get('/awaiting-approval','AdminController@show')->name('admin.awaiting.approval');
    Route::get('/delete/{id}','AdminController@delete')->name('admin.delete');
    Route::post('/edit','AdminController@edit')->name('admin.edit');
    Route::get('/', 'AdminController@index')->name('admin.dashboard');
});
