<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



//        // Authentication Routes...
//        Route::get('/login',                            ['as' => 'frontend.show_login_form',        'uses' => 'Frontend\Auth\LoginController@showLoginForm']);
//        Route::post('login',                            ['as' => 'frontend.login',                  'uses' => 'Frontend\Auth\LoginController@login']);
//        Route::post('logout',                           ['as' => 'frontend.logout',                 'uses' => 'Frontend\Auth\LoginController@logout']);
//        Route::get('register',                          ['as' => 'frontend.show_register_form',     'uses' => 'Frontend\Auth\RegisterController@showRegistrationForm']);
//        Route::post('register',                         ['as' => 'frontend.register',               'uses' => 'Frontend\Auth\RegisterController@register']);
//        Route::get('password/reset',                    ['as' => 'password.request',                'uses' => 'Frontend\Auth\ForgotPasswordController@showLinkRequestForm']);
//        Route::post('password/email',                   ['as' => 'password.email',                  'uses' => 'Frontend\Auth\ForgotPasswordController@sendResetLinkEmail']);
//        Route::get('password/reset/{token}',            ['as' => 'password.reset',                  'uses' => 'Frontend\Auth\ResetPasswordController@showResetForm']);
//        Route::post('password/reset',                   ['as' => 'password.update',                 'uses' => 'Frontend\Auth\ResetPasswordController@reset']);
//        Route::get('email/verify',                      ['as' => 'verification.notice',             'uses' => 'Frontend\Auth\VerificationController@show']);
//        Route::get('/email/verify/{id}/{hash}',         ['as' => 'verification.verify',             'uses' => 'Frontend\Auth\VerificationController@verify']);
//        Route::post('email/resend',                     ['as' => 'verification.resend',             'uses' => 'Frontend\Auth\VerificationController@resend']);

Route::get('/admin',                            ['as' => 'admin.index_route',           'uses' => 'BackendAdmin\AdminController@index']);

Route::group(['prefix'=>'admin'],function (){

//    Route::get('email/verify',                      ['as' => 'verification.notice',             'uses' => 'BackendAdmin\Auth\VerificationController@show']);
    Route::get('/',                            ['as' => 'admin.index_route',           'uses' => 'BackendAdmin\AdminController@index']);
    Route::get('/index',                            ['as' => 'admin.index_route',           'uses' => 'BackendAdmin\AdminController@index']);

    Route::get('/login',                            ['as' => 'admin.show_login_form',       'uses' => 'BackendAdmin\Auth\LoginController@showLoginForm']);
    Route::post('/login',                            ['as' => 'admin.login',                 'uses' => 'BackendAdmin\Auth\LoginController@login']);
    Route::post('logout',                           ['as' => 'admin.logout',                'uses' => 'BackendAdmin\Auth\LoginController@logout']);
    Route::get('password/reset',                    ['as' => 'admin.password.request',      'uses' => 'BackendAdmin\Auth\ForgotPasswordController@showLinkRequestForm']);
    Route::post('password/email',                   ['as' => 'admin.password.email',        'uses' => 'BackendAdmin\Auth\ForgotPasswordController@sendResetLinkEmail']);
    Route::get('password/reset/{token}',            ['as' => 'admin.password.reset',        'uses' => 'BackendAdmin\Auth\ResetPasswordController@showResetForm']);
    Route::post('password/reset',                   ['as' => 'admin.password.update',       'uses' => 'BackendAdmin\Auth\ResetPasswordController@reset']);
    Route::get('register',                          ['as' => 'admin.show_register_form',     'uses' => 'BackendAdmin\Auth\RegisterController@showRegistrationForm']);
    Route::post('register',                         ['as' => 'admin.register',               'uses' => 'BackendAdmin\Auth\RegisterController@register']);

    Route::group(['middleware'=>'auth:web'],function () {
        Route::resource('profile', 'BackendAdmin\AdminProfile\Profile');
        Route::post('update_image', ['as' => 'admin.update_image', 'uses' => 'BackendAdmin\AdminProfile\Profile@update_image']);

        //custromer

        Route::resource('/customer_archive', 'BackendAdmin\ArchiveCustomers');
        Route::resource('/customer', 'Frontend\CustomerController');
        Route::get('/ActiveCustomer',  ['as' => 'customer.active',               'uses' => 'Frontend\CustomerController@active_customer']);
        Route::get('/DisActiveCustomer',  ['as' => 'customer.disactive',               'uses' => 'Frontend\CustomerController@disactive_customer']);
        Route::post('customerremove_image', ['as' => 'customer.remove_image', 'uses' => 'Frontend\CustomerController@remove_image']);
        Route::get('Print_customer/{id}', ['as' => 'customer.print_customer', 'uses' => 'Frontend\CustomerController@Print']);

        //parking
        Route::patch('/park/status', ['as' => 'admin.park_status', 'uses' => 'BackendAdmin\ParkController@park_status']);
        Route::resource('/park', 'BackendAdmin\ParkController');
        Route::get('/ActivePark',  ['as' => 'park.active',               'uses' => 'BackendAdmin\ParkController@active_park']);
        Route::get('/DisActivePark',  ['as' => 'park.disactive',               'uses' => 'BackendAdmin\ParkController@disactive_park']);

        //interval
        Route::patch('/interval/status', ['as' => 'admin.interval_status', 'uses' => 'BackendAdmin\IntervalController@interval_status']);

        Route::resource('/interval', 'BackendAdmin\IntervalController');

        //active interval
        Route::get('/ActiveInterval',  ['as' => 'interval.active',               'uses' => 'BackendAdmin\IntervalController@active_interval']);
        Route::get('/DisActiveInterval',  ['as' => 'interval.disactive',               'uses' => 'BackendAdmin\IntervalController@dis_active_interval']);




        //Reservation
        Route::patch('/reservation/status', ['as' => 'admin.reservation_status', 'uses' => 'BackendAdmin\ReservationController@reservation_status']);
        Route::resource('/reservation_archive', 'BackendAdmin\ArchiveReservations');

        Route::resource('/reservation', 'BackendAdmin\ReservationController');

        //cancel
        Route::get('/CancelReservation',  ['as' => 'reservation.cancel',               'uses' => 'BackendAdmin\ArchiveReservations@cancel']);
        //finish
        Route::get('/FinishReservation',  ['as' => 'reservation.finish',               'uses' => 'BackendAdmin\ArchiveReservations@finish']);
        //busy
        Route::get('/BusyReservation',  ['as' => 'reservation.busy',               'uses' => 'BackendAdmin\ReservationController@busy']);

        //chat
        Route::get('/chat',                            ['as' => 'admin.chat',           'uses' => 'Controller@index']);


    });

});
Route::get('customer/login',                            ['as' => 'customer.show_login_form',       'uses' => 'Frontend\Auth\LoginController@showLoginForm']);

Route::group(['prefix'=>'customer'],function (){

    //    Route::get('email/verify',                      ['as' => 'verification.notice',             'uses' => 'BackendAdmin\Auth\VerificationController@show']);
    Route::get('/',                                 ['as' => 'customer.index_route',           'uses' => 'Frontend\CustomerAuth@index']);
    Route::get('/index',                            ['as' => 'customer.index_route',           'uses' => 'Frontend\CustomerAuth@index']);
    Route::get('/login',                            ['as' => 'customer.show_login_form',       'uses' => 'Frontend\Auth\LoginController@showLoginForm']);
    Route::post('/login',                            ['as' => 'customer.login',                 'uses' => 'Frontend\Auth\LoginController@login']);
    Route::post('logout',                           ['as' => 'customer.logout',                'uses' => 'Frontend\Auth\LoginController@logout']);
    Route::get('password/reset',                    ['as' => 'customer.password.request',      'uses' => 'Frontend\Auth\ForgotPasswordController@showLinkRequestForm']);
    Route::post('password/email',                   ['as' => 'customer.password.email',        'uses' => 'Frontend\Auth\ForgotPasswordController@sendResetLinkEmail']);
    Route::get('password/reset/{token}',            ['as' => 'customer.password.reset',        'uses' => 'Frontend\Auth\ResetPasswordController@showResetForm']);
    Route::post('password/reset',                   ['as' => 'customer.password.update',       'uses' => 'Frontend\Auth\ResetPasswordController@reset']);
    Route::get('register',                          ['as' => 'customer.show_register_form',     'uses' => 'Frontend\Auth\RegisterController@showRegistrationForm']);
    Route::post('register',                         ['as' => 'customer.register',               'uses' => 'Frontend\Auth\RegisterController@register']);
    Route::group(['middleware'=>'auth:customer'],function () {

        Route::get('site_user', ['as' => "index", 'uses' => 'Frontend\CustomerAuth@index']);
//    Route::get('login',['as'=>  "customer.login",'uses'=> 'Frontend\CustomerAuth@login'] );
//    Route::post('check',['as'=>  "check_login",'uses'=> 'Frontend\CustomerAuth@check_login'] );


    });
});
Route::get('/',                            ['as' => 'selectlogin',           'uses' => 'HomeController@index']);
