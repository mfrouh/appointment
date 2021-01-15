<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DoctortopatientController extends Controller
{
   public function prescription(Request $request)
   {
    $this->validate($request,['patient_id'=>'required|integer']);
    $request->merge(['name'=>$request->patient_id.'-'.now()->format('d-m-Y')]);
    $contents=Session::get('contents');
    if ($contents) {
        $prescription=auth()->user()->clinic->prescriptions()->create($request->all());
        foreach ($contents as $key => $content) {
            $prescription->contents()->create(['name'=>$content['name'],'quantity'=>$content['quantity'],'message'=>$content['message']]);
        }
        Session::forget('contents');
        return response(200);
    }
    return response('لا يوجد محتوي للروشتة', 422);
   }
   public function surgery(Request $request)
    {
        $this->validate($request,[
            'patient_id'=>'required|integer',
            'price'=>'required|numeric',
            'name'=>'required|min:4|max:40',
            'day'=>'required|date',
            'time'=>'required',
            'hospital_name'=>'required|min:2|max:50',
        ]);
        auth()->user()->clinic->surgeries()->create($request->all());
        return response(200);
    }
    public function followup(Request $request)
    {
        $this->validate($request,[
            'patient_id'=>'required|integer',
            'day'=>'required|date',
            'time'=>'required',
            'price'=>'nullable|numeric',
            'diagnose'=>'nullable|min:5|max:80',
        ]);
        auth()->user()->clinic->followups()->create($request->all());
        return response(200);
    }
    public function appointment(Request $request)
    {
        $this->validate($request,[
            'patient_id'=>'required|integer',
            'appointment_time_id'=>'nullable|integer',
            'price'=>'required|numeric',
            'diagnose'=>'nullable|min:2|max:50',
            'day'=>'required|date',
            'time'=>'required',
        ]);
        $request->merge(['booking'=>now()]);
        auth()->user()->clinic->appointments()->create($request->all());
        return response(200);
    }
}
