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

Route::get('/', 'HomeController@index')->name('home');

Route::get('/dashboard', 'UserController@dashboard')->name('dashboard');
Route::post('/dashboard/save_basic', 'UserController@saveBasic')->name('account.save.basic');
Route::post('/dashboard/save_image', 'UserController@saveImage')->name('account.save.image');
Route::post('/dashboard/save_contacts', 'UserController@saveContacts')->name('account.save.contacts');
Route::post('/dashboard/save_pay', 'UserController@savePay')->name('account.save.pay');

Route::get('/projects', 'ProjectsController@index')->name('projects');
Route::get('/project/create', 'ProjectsController@create')->name('project.add');
Route::get('/project/{id}', 'ProjectsController@show')->name('project.show');
Route::post('/project/create', 'ProjectsController@submit')->name('project.submit');

