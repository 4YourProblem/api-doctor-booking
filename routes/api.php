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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/register', 'Auth\RegisterController@register');
Route::post('/login', 'Auth\LoginController@login');
Route::post('/password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
Route::post('/password/reset', 'Auth\ResetPasswordController@reset');
Route::get('/doctors/search', 'Doctor\SearchController@search');

Route::group(['prefix' => 'user', 'middleware' => ['auth:api']], function () {
    Route::post('/logout', 'Auth\LogoutController@logout');
    Route::post('/doctor/request', 'DoctorRequest\DoctorRequestController@doctorRequest');
    Route::get('/doctor', 'Booking\BookingController@showDoctor');
    Route::get('/doctor/{id}', 'Booking\BookingController@showDetailDoctor');
    Route::post('/booking/{id}', 'Booking\BookingController@booking');
});

Route::group(['prefix' => 'doctor', 'middleware' => ['auth:api']], function () {
    Route::get('/booking', 'Doctor\DoctorManagerController@checkBooking');
    Route::get('/booking/{id}', 'Doctor\DoctorManagerController@checkDetailBooking');
    Route::post('/booking/{id}/accept', 'Doctor\DoctorManagerController@acceptBooking');
    Route::post('/booking/{id}/cancel', 'Doctor\DoctorManagerController@cancelBooking');
    Route::post('/booking/{id}/complete', 'Doctor\DoctorManagerController@completeBooking');
});

Route::group(['prefix' => 'patient', 'middleware' => ['auth:api']], function () {
    Route::post('/booking/{id}/cancel', 'Booking\BookingController@cancelBooking');
});

Route::group(['prefix' => 'admin', 'middleware' => ['auth:api']], function () {
    Route::get('/doctor', 'Admin\ManagerController@doctor');
    Route::get('/patient', 'Admin\ManagerController@patient');
    Route::get('/user', 'Admin\ManagerController@user');
    Route::get('/doctor/request', 'Admin\ApproveDoctorController@showDoctorRequest');
    Route::post('/approve/{id}', 'Admin\ApproveDoctorController@approveDoctor');
    Route::post('/refuse/{id}', 'Admin\ApproveDoctorController@refuseDoctor');
});
