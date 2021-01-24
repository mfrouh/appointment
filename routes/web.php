<?php

use App\Events\BookingSuccessEvent;
use App\Events\BookingVerifyEvent;
use App\Http\Middleware\Checkrole;
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

Route::get('/','Frontend\PageController@index');
Route::get('/clinics','Frontend\PageController@clinics');
Route::get('/profile-clinic/{id}','Frontend\PageController@profile');
Route::get('/bookappointment/{id}','Frontend\AppointmentController@booking');
Route::post('/bookappointment','Frontend\AppointmentController@store');
Route::get('/bookappointment/times/{id}','Frontend\AppointmentController@times');
Route::get('/verifybooking','Frontend\AppointmentController@verifybooking')->name('verifybooking');
Route::post('/verifybooking','Frontend\AppointmentController@verify');
Route::get('/governorate/{id}','Frontend\PageController@governorate');

Route::group(['middleware' => ['auth','Checkrole:admin']], function () {
    Route::get('/dashboard','Backend\DashboardController@index');
    Route::resource('speciality', 'Backend\SpecialityController');
    Route::resource('clinic', 'Backend\ClinicController')->only('index');
});
Route::group(['middleware' => ['auth','Hasclinic','Checkrole:doctor']], function () {
Route::get('/dashboard','Backend\DashboardController@index');
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
route::post('/clinic/prescriptioncontent','Backend\PrescriptionController@validatecontent');
route::delete('/clinic/prescriptioncontent/{id}','Backend\PrescriptionController@deleteitem');
route::post('/prescriptioncontent','Backend\PrescriptioncontentController@validatecontent');
route::delete('/prescriptioncontent/{id}','Backend\PrescriptioncontentController@deleteitem');
Route::get('/setting','Backend\SettingController@index');
Route::post('/setting','Backend\SettingController@store');
Route::post('/doctor/prescription','Backend\DoctortopatientController@prescription');
Route::post('/doctor/surgery','Backend\DoctortopatientController@surgery');
Route::post('/doctor/appointment','Backend\DoctortopatientController@appointment');
Route::post('/doctor/followup','Backend\DoctortopatientController@followup');
//
Route::resource('patient', 'Backend\PatientController')->except('create');
Route::resource('surgery', 'Backend\SurgeryController')->except('show');
Route::resource('prescription', 'Backend\PrescriptionController')->except('show');
Route::resource('booking', 'Backend\BookingController')->except('show');
Route::resource('appointment', 'Backend\AppointmentController')->except('show');
Route::resource('followup', 'Backend\FollowupController')->except('show');
});

Route::group(['middleware' => ['auth','Checkrole:doctor']], function () {
    Route::get('/myclinic','Backend\DoctorController@myclinic');
    Route::resource('clinic', 'Backend\ClinicController')->only(['store','update']);
});



Route::group(['middleware' => ['auth']], function () {
    Route::get('/change-password','Backend\SettingController@change_password');
    Route::post('/change-password','Backend\SettingController@post_change_password');
    Route::get('/profile-setting','Backend\SettingController@profile_setting');
    Route::post('/profile-setting','Backend\SettingController@post_profile_setting');
});
Auth::routes();
