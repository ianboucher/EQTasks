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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(["prefix" => "v1.0.0"], function()
{
    Route::post('signup',           'AuthController@signup');
    Route::post('login',            'AuthController@login');
    Route::get('auth',              'AuthController@getAuthenticatedUser');

    Route::resource('users',        'UsersController');
    Route::resource('users.tasks',  'TasksController');
});
