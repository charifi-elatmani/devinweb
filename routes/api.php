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

/**
 * Create a city
 */
Route::post('cities', 'CitieController@store');

/**
 * Create delivery time
 */

Route::post('delivery-times', 'DeliveryTimeController@store');

/**
 * Attach city delivery times
 */

Route::post('cities/{city_id}/delivery-times', 'CitieController@StoreCityDeliveryTimes');

/**
 * Exclude some city delivery times span from some delivery dates
 */

Route::post('exclude/citie/{city_id}/delivery-time/{delivery_time}', 'ExcludeDeliveryTimeController@excludeCityDeliveryTime');


/**
 * Exclude a city delivery date by excluding all of the daily delivery times
 */
Route::POST('exclude/city/{city_id}/delivery-date', 'ExcludeDeliveryTimeController@StoreCityDeliveryTimes');


Route::get('cities/{city_id}/delivery-dates-times/{number_of_days}', 'ExcludeDeliveryTimeController@EndPointDeliveryTimes');












