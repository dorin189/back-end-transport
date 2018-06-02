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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::post(
    '/authenticate',
    '\App\Http\Controllers\Users\LoginController@issueToken'
);

Route::post(
    '/users',
    '\App\Http\Controllers\Users\RegisterController@store'
);

Route::group(
    ['prefix' => 'transportatori'],
    function() {
        Route::get(
            '/',
            '\App\Http\Controllers\Transportatori\TransportatoriController@getAll'
        );
        Route::post(
            '/',
            '\App\Http\Controllers\Transportatori\TransportatoriController@store'
        );
    }
);

Route::group(
    ['prefix' => 'parc-auto'],
    function() {
        Route::get(
            '/',
            '\App\Http\Controllers\ParcAuto\ParcAutoController@getAll'
        );
        Route::post(
            '/',
            '\App\Http\Controllers\ParcAuto\ParcAutoController@store'
        );
    }
);

Route::group(
    ['prefix' => 'soferi'],
    function() {
        Route::get(
            '/',
            '\App\Http\Controllers\Soferi\SoferiController@getAll'
        );
        Route::post(
            '/',
            '\App\Http\Controllers\ParcAuto\ParcAutoController@store'
        );
    }
);

Route::group(
    ['prefix' => 'comenzi'],
    function() {
        Route::get(
            '/',
            '\App\Http\Controllers\Comenzi\ComenziController@getAll'
        );
        Route::post(
            '/',
            '\App\Http\Controllers\Comenzi\ComenziController@store'
        );
    }
);


