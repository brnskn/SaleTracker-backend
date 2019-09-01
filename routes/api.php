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

Route::group(['namespace' => 'Api', 'middleware' => 'api'], function () {
    Route::group(['prefix' => 'users'], function () {
        Route::post('login', 'UserController@login');
        Route::group(['middleware' => 'auth:api'], function () {
            Route::get('me', 'UserController@me');
            Route::post('update', 'UserController@update');
        });
    });
    Route::group(['middleware' => 'auth:api'], function () {
        Route::group(['prefix' => 'activities'], function () {
            Route::get('/', 'ActivityController@list');
            Route::get('/{id}', 'ActivityController@get');
            Route::post('/', 'ActivityController@create');
            Route::post('/{id}', 'ActivityController@update');
            Route::delete('/{id}', 'ActivityController@delete');
        });
        Route::group(['prefix' => 'attributes'], function () {
            Route::get('/', 'AttributeController@list');
            Route::get('/{id}', 'AttributeController@get');
        });
        Route::group(['prefix' => 'units'], function () {
            Route::get('/', 'UnitController@list');
            Route::get('/{id}', 'UnitController@get');
        });
        Route::group(['prefix' => 'distributors'], function () {
            Route::get('/', 'DistributorController@list');
            Route::get('/{id}', 'DistributorController@get');
        });
    });
});
