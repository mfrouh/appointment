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
    return view('welcome');
});
Route::group(['middleware' => ['auth','Hasclinic']], function () {
Route::get('/clinic/appointmentdate','Backend\AppointmentdateController@index');
Route::post('/clinic/appointmentdate','Backend\AppointmentdateController@store');
Route::get('/clinic/appointmentdate/{id}','Backend\AppointmentdateController@times');
Route::get('/myclinic','Backend\DoctorController@myclinic');
Route::get('/settings','Backend\DoctorController@settings');
//
$models=['workdate','education','experience','service','blacklist','gallery'];
foreach ($models as $key => $model) {
   Route::get('/clinic/'.$model,"Backend\\".$model."Controller@index")->name($model.'.index');
   Route::post('/clinic/'.$model,"Backend\\".$model."Controller@store")->name($model.'.store');
   Route::delete('/clinic/'.$model.'/{id}',"Backend\\".$model."Controller@destroy")->name($model.'.destroy');
}
//
Route::get('/clinic/social','Backend\SocialController@index');
Route::post('/clinic/social','Backend\SocialController@store');
Route::get('/clinic/reviews','Backend\DoctorController@reviews');
Route::get('/setting','Backend\SettingController@index');
Route::post('/setting','Backend\SettingController@store');
//
Route::resource('speciality', 'Backend\SpecialityController');
Route::resource('patient', 'Backend\PatientController');
Route::resource('surgery', 'Backend\SurgeryController');
Route::resource('prescription', 'Backend\PrescriptionController');
Route::resource('booking', 'Backend\BookingController');
Route::resource('appointment', 'Backend\AppointmentController');
Route::resource('clinic', 'Backend\ClinicController');
Route::resource('followup', 'Backend\FollowupController');
});
Route::group(['middleware' => ['auth']], function () {
    Route::get('/myclinic','Backend\DoctorController@myclinic');
    Route::resource('clinic', 'Backend\ClinicController')->only(['store','create']);
    Route::get('/change-password','Backend\SettingController@change_password');
    Route::post('/change-password','Backend\SettingController@post_change_password');
    Route::get('/profile-setting','Backend\SettingController@profile_setting');
    Route::post('/profile-setting','Backend\SettingController@post_profile_setting');
});
Auth::routes();
Route::get('/verify',[App\Http\Controllers\Frontend\AppointmentController::class,'verify']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
