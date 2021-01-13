<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Surgery;
use Illuminate\Http\Request;

class SurgeryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $surgeries=Surgery::all();
        return view('backend.surgery.index',compact('surgeries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $patients=auth()->user()->clinic->patients;
        return view('backend.surgery.create',compact('patients'));
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
            'patient_id'=>'required|integer',
            'price'=>'required|numeric',
            'name'=>'required|min:4|max:40',
            'day'=>'required|date',
            'time'=>'required',
            'hospital_name'=>'required|min:2|max:50',
        ]);
        auth()->user()->clinic->surgeries()->create($request->all());
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Surgery  $surgery
     * @return \Illuminate\Http\Response
     */
    public function show(Surgery $surgery)
    {
        return view('backend.surgery.show',compact('surgery'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Surgery  $surgery
     * @return \Illuminate\Http\Response
     */
    public function edit(Surgery $surgery)
    {
        $patients=auth()->user()->clinic->patients;
        return view('backend.surgery.edit',compact('surgery','patients'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Surgery  $surgery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Surgery $surgery)
    {
        $this->validate($request,[
            'patient_id'=>'required|integer',
            'price'=>'required|numeric',
            'name'=>'required|min:4|max:40',
            'day'=>'required|date',
            'time'=>'required',
            'hospital_name'=>'required|min:2|max:50',
        ]);
        $surgery->update($request->all());
        return back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Surgery  $surgery
     * @return \Illuminate\Http\Response
     */
    public function destroy(Surgery $surgery)
    {
       $surgery->delete();
       return response(200);
    }
}
