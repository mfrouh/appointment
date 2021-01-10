<?php

use App\Events\BookingSuccessEvent;
use App\Events\BookingVerifyEvent;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    //$appointment=['id'=>1,'code'=>'16547','is_verify'=>'0','name'=>'mohamed frouh','time'=>now()->diffForHumans()];
    // event(new BookingVerifyEvent($appointment));
    // event(new BookingSuccessEvent($appointment));
    return view('welcome');
});
Route::resource('speciality', 'Backend\SpecialityController');
Route::resource('patient', 'Backend\PatientController');
Route::resource('surgery', 'Backend\SurgeryController');
Route::resource('prescription', 'Backend\PrescriptionController');
Route::resource('booking', 'Backend\BookingController');
Route::resource('appointment', 'Backend\AppointmentController');
Route::resource('clinic', 'Backend\ClinicController');
Route::resource('followup', 'Backend\FollowUpController');
Route::get('/clinic/appointmentdate','Backend\AppointmentDateController@index');
Route::get('/clinic/workdate','Backend\WorkDateController@index');
Route::post('/clinic/workdate','Backend\WorkDateController@store');
Route::delete('/clinic/workdate/{id}','Backend\WorkDateController@destroy');
Route::get('/clinic/social','Backend\SocialController@index');
Route::post('/clinic/social','Backend\SocialController@store');
Route::get('/clinic/blacklist','Backend\BlacklistController@index');
Route::post('/clinic/blacklist','Backend\BlacklistController@store');
Route::delete('/clinic/blacklist/{id}','Backend\BlacklistController@destroy');
Route::get('/setting','Backend\SettingController@index');
Route::post('/setting','Backend\SettingController@store');

Auth::routes();
Route::get('/verify',[App\Http\Controllers\Frontend\AppointmentController::class,'verify']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
