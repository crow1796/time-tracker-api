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

	Route::group(['prefix' => 'teams', 'middleware' => ['jwt.auth']], function(){
		Route::get('/all', 'TeamsController@index');
		Route::post('/create', 'TeamsController@store');
		Route::get('/{teamId}/projects', 'TeamsController@teamProjects');
		Route::post('/{teamId}/projects/create', 'ProjectsController@create');
		Route::get('/{teamId}/projects/{projectId}/iterations/all', 'IterationsController@index');
		Route::post('/{teamId}/projects/{projectId}/iterations/create', 'IterationsController@store');
		Route::post('/{teamId}/projects/{projectId}/iterations/{iterationId}/tasks/store', 'TasksController@store');
	});
});
