<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Jobs\AppointmentDateJob;
use App\Models\AppointmentDate;

class AppointmentdateController extends Controller
{
   public function index()
   {
     $dates=auth()->user()->clinic->appointmentdates;
     return view('backend.appointmentdate.index',compact('dates'));
   }

   public function store()
   {
    $clinic=auth()->user()->clinic;
    $this->dispatch(new AppointmentDateJob($clinic));
    return back();
   }
   public function times($id)
   {
     $times=AppointmentDate::findorfail($id)->times;
     return response()->json($times);
   }

}
