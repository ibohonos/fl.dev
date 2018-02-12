<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('v1')->namespace('Api')->group(function () {

	Route::get('/projects', 'ProjectsController@getProjects');

});

Route::middleware('auth:api')->prefix('v2')->namespace('Api')->group(function () {

	Route::get('/user', function (Request $request) {
		$this->data['user'] = $request->user();
		$this->data['roles'] = $request->user()->roles;

		return $this->data;
	});

});
