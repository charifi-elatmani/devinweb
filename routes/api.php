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


Route::post('cities', 'CitieController@store');

Route::post('delivery-times', 'DeliveryTimeController@store');


Route::post('cities/{city_id}/delivery-times', 'CitieController@StoreCityDeliveryTimes');


Route::get('cities/{city_id}/delivery-dates-times/{number_of_days}', 'ExcludeDeliveryTimeController@EndPointDeliveryTimes');












