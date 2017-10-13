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

Auth::routes();

Route::get('/', 'HomeController@index');
Route::get('/login', 'HomeController@index')->name('login');
Route::get('/register', 'HomeController@register');
Route::get('/dashboard', 'DashboardController@index')->name('home');
Route::get('/logout', 'HomeController@logout');

Route::get('/twitter', 'DashboardController@twitter');
Route::post('/twitter', 'DashboardController@addTwitterAccount');