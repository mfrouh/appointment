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
Route::group(['middleware' => ['auth']], function () {
Route::get('/clinic/appointmentdate','Backend\AppointmentDateController@index');
Route::post('/clinic/appointmentdate','Backend\AppointmentDateController@store');
Route::get('/clinic/appointmentdate/{id}','Backend\AppointmentDateController@times');

//
Route::get('/clinic/workdate','Backend\WorkDateController@index');
Route::post('/clinic/workdate','Backend\WorkDateController@store');
Route::delete('/clinic/workdate/{id}','Backend\WorkDateController@destroy');
//
Route::get('/clinic/education','Backend\EducationController@index');
Route::post('/clinic/education','Backend\EducationController@store');
Route::delete('/clinic/education/{id}','Backend\EducationController@destroy');
//
Route::get('/clinic/experience','Backend\ExperienceController@index');
Route::post('/clinic/experience','Backend\ExperienceController@store');
Route::delete('/clinic/experience/{id}','Backend\ExperienceController@destroy');
//
Route::get('/clinic/service','Backend\ServiceController@index');
Route::post('/clinic/service','Backend\ServiceController@store');
Route::delete('/clinic/service/{id}','Backend\ServiceController@destroy');
//
Route::get('/clinic/blacklist','Backend\BlacklistController@index');
Route::post('/clinic/blacklist','Backend\BlacklistController@store');
Route::delete('/clinic/blacklist/{id}','Backend\BlacklistController@destroy');
//
Route::get('/clinic/social','Backend\SocialController@index');
Route::post('/clinic/social','Backend\SocialController@store');
Route::get('/setting','Backend\SettingController@index');
Route::post('/setting','Backend\SettingController@store');
Route::resource('speciality', 'Backend\SpecialityController');
Route::resource('patient', 'Backend\PatientController');
Route::resource('surgery', 'Backend\SurgeryController');
Route::resource('prescription', 'Backend\PrescriptionController');
Route::resource('booking', 'Backend\BookingController');
Route::resource('appointment', 'Backend\AppointmentController');
Route::resource('clinic', 'Backend\ClinicController');
Route::resource('followup', 'Backend\FollowUpController');
});
Auth::routes();
Route::get('/verify',[App\Http\Controllers\Frontend\AppointmentController::class,'verify']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
