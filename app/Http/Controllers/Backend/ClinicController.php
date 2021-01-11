<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Clinic;
use Illuminate\Http\Request;

class ClinicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clinics=Clinic::all();
        return view('backend.clinic.index',compact('clinics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.clinic.create');
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
        'address'=>'required|min:8|max:50',
        'clinic_name'=>'required|min:4|max:50',
        'image'=>'required|image',
        'city'=>'required|min:2|max:50',
        'state'=>'required|min:2|max:50',
        'country'=>'required|min:2|max:50',
        'time_appointment'=>'required|in:15,30,45,60',
        'price'=>'required|numeric',
        'type_booking'=>'required|in:7,14,30',
        ]);
        auth()->user()->clinic()->create($request->all());
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Clinic  $clinic
     * @return \Illuminate\Http\Response
     */
    public function show(Clinic $clinic)
    {
        return view('backend.clinic.show',compact('clinic'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Clinic  $clinic
     * @return \Illuminate\Http\Response
     */
    public function edit(Clinic $clinic)
    {
        return view('backend.clinic.edit',compact('clinic'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Clinic  $clinic
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Clinic $clinic)
    {
        $this->validate($request,[
        'address'=>'required|min:8|max:50',
        'clinic_name'=>'required|min:4|max:50',
        'image'=>'nullable|image',
        'city'=>'required|min:2|max:50',
        'state'=>'required|min:2|max:50',
        'country'=>'required|min:2|max:50',
        'time_appointment'=>'required|in:15,30,45,60',
        'price'=>'required|numeric',
        'type_booking'=>'required|in:7,14,30'
        ]);
        $clinic->update($request->all());
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Clinic  $clinic
     * @return \Illuminate\Http\Response
     */
    public function destroy(Clinic $clinic)
    {
        $clinic->delete();
        return back();
    }
}
