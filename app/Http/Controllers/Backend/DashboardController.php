<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Booking;
use App\Models\Clinic;
use App\Models\FollowUp;
use App\Models\Patient;
use App\Models\Prescription;
use App\Models\Speciality;
use App\Models\Surgery;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
       if (auth()->user()->role=='admin') {
        return  $this->admin();
       }
       if (auth()->user()->role=='doctor') {
        return  $this->doctor();
       }
    }
    public static function admin()
    {
       $specialities=Speciality::count();
       $actspecialities=Speciality::active()->count();
       $inactspecialities=Speciality::inactive()->count();
       $clinics=Clinic::count();
       $bookings=Booking::count();
       $actbookings=Booking::active()->count();
       $inactbookings=Booking::inactive()->count();
       $appointments=Appointment::count();
       $followups=FollowUp::count();
       $surgeries=Surgery::count();
       $prescriptions=Prescription::count();
       $patients=Patient::count();
       return view('backend.dashboard.admin',compact(
           'specialities','actspecialities','inactspecialities',
           'clinics','surgeries','prescriptions',
           'bookings','actbookings','inactbookings',
           'appointments','followups','patients'
       ));
    }
    public static function doctor()
    {

        $bookings=Booking::where('clinic_id',auth()->user()->clinic->id)->count();
        $actbookings=Booking::active()->where('clinic_id',auth()->user()->clinic->id)->count();
        $inactbookings=Booking::inactive()->where('clinic_id',auth()->user()->clinic->id)->count();
        $appointments=Appointment::where('clinic_id',auth()->user()->clinic->id)->count();
        $followups=FollowUp::where('clinic_id',auth()->user()->clinic->id)->count();
        $surgeries=Surgery::where('clinic_id',auth()->user()->clinic->id)->count();
        $prescriptions=Prescription::where('clinic_id',auth()->user()->clinic->id)->count();
        $patients=Patient::where('clinic_id',auth()->user()->clinic->id)->count();
        return view('backend.dashboard.doctor',compact(
            'surgeries','prescriptions',
            'bookings','actbookings','inactbookings',
            'appointments','followups','patients'
        ));
    }
}
