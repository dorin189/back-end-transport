<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!

*/



Route::get('/map', 'MapController@index');

Route::get('/', function(){
    $config = array();
    $config['center'] = 'New York, USA';

    $polygon = array("25.774,-80.190", "18.466,-66.118", "32.321,-64.757", "25.774,-80.190"); //start and end point should be same
    $latlngs = array("-12.043333,-77.028333", "-12.043333,-77.028333");

    GMaps::isMarkerInsideGeofence($polygon, $latlngs); //both parameters should be in array
    GMaps::initialize($config);
    $map = GMaps::create_map();

    echo $map['js'];
    echo $map['html'];
});
