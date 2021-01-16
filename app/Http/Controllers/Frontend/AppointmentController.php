<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\AppointmentDate;
use App\Models\AppointmentTime;
use App\Models\Booking;
use App\Models\Clinic;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function booking($id)
    {
       $clinic=Clinic::findorfail($id);
       $dates=Clinic::findorfail($id)->appointmentdates;
       return view('frontend.pages.booking',compact('dates','clinic'));
    }
    public function times($id)
    {
      $times=AppointmentDate::findorfail($id)->times;
      return response()->json($times);
    }
    public function store(Request $request)
    {
        $this->validate($request,[
            'appointment_time_id'=>'required|numeric',
            'clinic_id'=>'required|numeric',
            'verified'=>'nullable|boolean',
            'verification_code'=>'nullable',
            'phone_number'=>'required|max:11|min:11',
            'age'=>'required|integer',
            'gender'=>'required|in:female,male',
            'name'=>'required|min:5|max:50',
        ]);
        $time=AppointmentTime::find($request->appointment_time_id);
        $day=$time->AppointmentDate->day;
        $request->merge(['day'=>$day,'time'=>$time->time,'verification_code'=>rand(100000,999999)]);
        if (Booking::where('appointment_time_id',$request->appointment_time_id)->count()==0) {
          $booking=Booking::create($request->all());
          $id=$booking->id;
          $phone_number=$booking->phone_number;
          $verification_code=$booking->verification_code;
        $basic  = new \Nexmo\Client\Credentials\Basic('22ccdc4d', 'bJdeW7jxphJ1xLga');
        $client = new \Nexmo\Client($basic);

        $message = $client->message()->send([
            'to' => '201289189978',
            'from' => 'mohamed frouh',
            'text' => $verification_code,
        ]);
            // return redirect()->route('verifybooking')->with(['id'=>$id,'phone_number'=>$phone_number]);
            return view('frontend.pages.verify',compact('id','phone_number'));
        }
        return back()->with('error','this time is booked');
    }
    public function verifybooking()
    {
           return view('frontend.pages.verify');
    }
    public function verify(Request $request )
    {
        $this->validate($request,['code'=>'required|max:6|min:6','id'=>'required']);
        if (Booking::where('id',$request->id)->where('verification_code',$request->code)->count()==1) {
           Booking::find($request->id)->update(['verified'=>1]);
           return view('frontend.pages.success');
        }
        return back()->with('error','the code is wrong');
    }
}
