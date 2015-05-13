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
    return view('index');
});


$app->get('/{dimensions:[0-9]+x[0-9]+}', 'App\Http\Controllers\ImageController@showSizes');
$app->get('/{dimensions:[0-9]+x[0-9]+}/filter:{filters:[a-z-]+}', 'App\Http\Controllers\ImageController@showSizes');

$app->get('/{dimensions:[0-9]+x[0-9]+}/{category:[a-z-]+}', 'App\Http\Controllers\ImageController@showCategory');
$app->get('/{dimensions:[0-9]+x[0-9]+}/{category:[a-z-]+}/filter:{filters:[a-z-]+}', 'App\Http\Controllers\ImageController@showCategory');