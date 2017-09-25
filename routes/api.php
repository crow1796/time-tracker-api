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
Route::group(['prefix' => 'v1', 'namespace' => 'Api\V1'], function(){

	Route::group(['namespace' => 'Auth'], function(){
		Route::get('/user', 'LoginController@getUser');
		Route::post('login', 'LoginController@login');
		Route::post('register', 'RegisterController@register');
	});

	Route::group(['prefix' => 'teams'], function(){
		Route::get('/all', 'TeamsController@index');
		Route::post('/create', 'TeamsController@store');
		Route::get('/{id}/projects', 'TeamsController@teamProjects');
		Route::post('/{id}/projects/create', 'ProjectsController@create');
		Route::post('/{teamId}/{projectId}/{iterationId}/tasks/store', 'TasksController@store');
	});
});
