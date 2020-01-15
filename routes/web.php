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

Route::post('/adminLogin', 'Auth\LoginController@adminLogin')->name('adminLogin');


Route::get('/', 'HomeController@index');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/dashboard', 'HomeController@index')->name('dashboard');

Route::get('/profile', 'HomeController@profile')->name('profile');

Route::get('/profiles/{id?}', 'HomeController@profiles')->name('profiles');

Route::get('/empty', 'HomeController@profile')->name('empty');

Route::get('/applicants', 'HomeController@applicants')->name('applicants');

Route::get('/companies', 'HomeController@companies')->name('companies');

Route::get('/jobs', 'HomeController@jobs')->name('jobs');

Route::get('/jobsC', 'HomeController@jobsC')->name('jobsC');

Route::post('/jobs', 'HomeController@addJob')->name('addJob');

Route::get('/jobs/{id}/{status}', 'HomeController@job_status')->name('job_status');

Route::get('/jobProfile/{id}/{company}', 'HomeController@job_profile')->name('job_profile');

Route::get('/application/{id}', 'HomeController@application')->name('application');

Route::get('/applications', 'HomeController@applications')->name('applications');

Route::get('/admins', 'HomeController@admins')->name('admins');

Route::post('/admins', 'HomeController@addAdmin')->name('addAdmin');

// Route::post('/updateProfile', 'HomeController@updateProfile')->name('updateProfile');
