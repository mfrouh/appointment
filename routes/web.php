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

Auth::routes();
Route::get('/verify',[App\Http\Controllers\Frontend\AppointmentController::class,'verify']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
