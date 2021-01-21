<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\AppointmentDate;
use App\Models\AppointmentTime;
use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bookings=Booking::where('clinic_id',auth()->user()->clinic->id)->where('verified',1)->get();
        return view('backend.booking.index',compact('bookings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dates=auth()->user()->clinic->appointmentdates;
        return view('backend.booking.create',compact('dates'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'appointment_time_id'=>'nullable',
            'verified'=>'nullable|boolean',
            'verification_code'=>'nullable',
            'phone_number'=>'required|max:11|min:11',
            'age'=>'integer',
            'gender'=>'required|in:female,male',
            'name'=>'required|min:5|max:50',
            'day'=>'required|date',
            'time'=>'required',
        ]);
        $request->merge(['verified'=>1]);
        auth()->user()->clinic->bookings()->create($request->all());
        if ($request->appointment_time_id) {
            AppointmentTime::find($request->appointment_time_id)->update(['booked'=>1]);
        }
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function show(Booking $booking)
    {
        return view('backend.booking.show',compact('booking'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function edit(Booking $booking)
    {
        $dates=auth()->user()->clinic->appointmentdates;
        return view('backend.booking.edit',compact('booking','dates'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Booking $booking)
    {
        $this->validate($request,[
            'appointment_time_id'=>'nullable',
            'verified'=>'nullable|boolean',
            'verification_code'=>'nullable',
            'phone_number'=>'required|max:11|min:11',
            'age'=>'integer',
            'gender'=>'required|in:female,male',
            'name'=>'required|min:5|max:50',
            'day'=>'required|date',
            'time'=>'required'
        ]);
        if ($request->appointment_time_id && $request->appointment_time_id!=$booking->appointment_time_id) {
            AppointmentTime::find($booking->appointment_time_id)->update(['booked'=>0]);
            AppointmentTime::find($request->appointment_time_id)->update(['booked'=>1]);
        }
        $request->merge(['verified'=>1]);
        $booking->update($request->all());
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function destroy(Booking $booking)
    {
        if ($booking->appointment_time_id) {
            AppointmentTime::find($booking->appointment_time_id)->update(['booked'=>0]);
        }
       $booking->delete();
       return response(200);
    }
}
