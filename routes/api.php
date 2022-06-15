<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Customer\AuthController;
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


Route::group([
    'middleware' => 'api',
    'prefix' => 'customer'
], function ($router) {
    Route::post('/login', ['uses' =>'APi\Customer\AuthController@login']);
    Route::post('/register', ['uses' =>'APi\Customer\AuthController@register']);
    Route::post('/logout', ['uses' =>'APi\Customer\AuthController@logout']);
    Route::post('/refresh',['uses' =>'APi\Customer\AuthController@refresh'] );
    Route::get('/customer-profile', ['uses' =>'APi\Customer\AuthController@userProfile']);

    //parks
    Route::get('/parks', 'APi\Park\ParkController@index');
    Route::post('/parks', 'APi\Park\ParkController@store');
    Route::post('/parks/{id}', 'APi\Park\ParkController@update');
    Route::get('reservations', 'APi\Customer\ReservationController@index');





});


Route::group(['middleware' => ['jwt.verify'],'prefix' => 'customer'], function() {

    Route::get('intervals', 'APi\Interval\IntervalController@index');
    Route::get('reservations_history/{id}', 'APi\Customer\ReservationController@show');
    Route::get('current_busy_reservation/{id}', 'APi\Customer\ReservationController@show_current_busy_reservation');

    Route::post('reservations/{id}', 'APi\Customer\ReservationController@update');
    Route::post('reservation_status/{id}', 'APi\Customer\ReservationController@update_status');
    Route::post('reservations', 'APi\Customer\ReservationController@store');
    Route::get('customer/{id}', 'APi\Customer\ReservationController@show');
    Route::post('update-profile/{id}', 'APi\Customer\AuthController@update_profile');



});
