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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::view('forgot_password', 'auth.reset_password')->name('password.reset');


Route::get('/login', 'Admin\Web\AdminController@login')->name('login');
Route::get('login', [
    'as' => 'login',
    'uses' => 'Admin\Web\AdminController@getLogin'
]);

Route::post('/login', [
    'uses' => 'Admin\Web\AdminController@postLogin',
    'as' => 'login'
]);

Route::group(['prefix' => 'admin', 'middleware' => ['web', 'auth']], function () {
    Route::get('/user', 'Admin\Web\AdminController@user')->name('user');
    Route::get('/user/{id}', 'Admin\Web\AdminController@destroyUser')->name('user.destroy');
    Route::get('/doctor', 'Admin\Web\AdminController@doctor')->name('doctor');
    Route::get('/doctor/{id}', 'Admin\Web\AdminController@destroyDoctor')->name('doctor.destroy');
    Route::get('/patient', 'Admin\Web\AdminController@patient')->name('patient');
    Route::get('/patient/{id}', 'Admin\Web\AdminController@destroyPatient')->name('patient.destroy');
    Route::get('/doctor-request', 'Admin\Web\AdminController@doctorRequest')->name('doctor.request');
    Route::get('/doctor/approve/{id}', 'Admin\Web\AdminController@approveDoctor')->name('doctor.approve');
    Route::get('/doctor/refuse/{id}', 'Admin\Web\AdminController@refuseDoctor')->name('doctor.refuse');
});

Route::get('/', 'Web\HomeController@index')->name('index');
Route::get('/menu', 'Web\HomeController@menu')->name('menu');
Route::get('/booking', 'Web\HomeController@booking')->name('booking');
Route::get('/doctor', 'Web\HomeController@doctor')->name('doctor');
Route::get('/detail-doctor', 'Web\HomeController@detailDoctor')->name('detail-doctor');
Route::get('/news', 'Web\HomeController@news')->name('news');
Route::get('/contact', 'Web\HomeController@contact')->name('contact');
