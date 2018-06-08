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
        Route::get(
            '/info',
            '\App\Http\Controllers\Soferi\SoferiController@getSoferiName'
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
        Route::get(
            '/info',
            '\App\Http\Controllers\Comenzi\ComenziController@getComandsNotFullModel'
        );
        Route::post(
            '/update',
            '\App\Http\Controllers\Comenzi\ComenziController@update'
        );
        Route::delete(
            'delete/{id}',
            '\App\Http\Controllers\Comenzi\ComenziController@remove'
        );
        Route::get(
            '/is-order',
            '\App\Http\Controllers\Comenzi\ComenziController@getRecordIsOrder'
        );
        Route::get(
            '/get-comenzi/{id}',
            '\App\Http\Controllers\Comenzi\ComenziController@getComenzi'
        );
    }
);

Route::post(
    '/test',
    '\App\Http\Controllers\SendEmailController@send'
);

Route::group(
    ['prefix' => 'dashboard'],
    function() {
        Route::get(
            '/revizie',
            '\App\Http\Controllers\Dashboard\DashboardController@getRevizie'
        );
        Route::get(
            '/soferi',
            '\App\Http\Controllers\Dashboard\DashboardController@getSoferi'
        );
    }
);



