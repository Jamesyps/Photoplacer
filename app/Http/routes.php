<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

$app->get('/', function() use ($app) {
    return $app->welcome();
});


$app->get('/{dimensions}', 'App\Http\Controllers\ImageController@showSizes');
$app->get('/{dimensions}/filter:{filters:[a-z-]+}', 'App\Http\Controllers\ImageController@showSizes');

$app->get('/{dimensions}/{category:[a-z-]+}', 'App\Http\Controllers\ImageController@showCategory');
$app->get('/{dimensions}/{category:[a-z-]+}/filter:{filters:[a-z-]+}', 'App\Http\Controllers\ImageController@showCategory');