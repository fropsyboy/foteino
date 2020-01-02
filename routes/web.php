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
Route::get('/dashboard', 'HomeController@index')->name('dashboard');
Route::get('/profile', 'HomeController@profile')->name('profile');
Route::get('/profiles/{id?}', 'HomeController@profiles')->name('profiles');
Route::get('/empty', 'HomeController@profile')->name('empty');
Route::get('/applicants', 'HomeController@applicants')->name('applicants');
Route::get('/companies', 'HomeController@companies')->name('companies');
Route::get('/jobs', 'HomeController@jobs')->name('jobs');




