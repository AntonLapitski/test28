<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/marks', 'CarsController@getMarks');
Route::get('/models', 'CarsController@getModels');
Route::get('/cars', 'CarsController@getCars');
Route::post('/createCar', 'CarsController@createCar');
Route::post('/updateCar', 'CarsController@updateCar');
Route::get('/showCar', 'CarsController@showCar');
Route::delete('/deleteCar', 'CarsController@deleteCar');
