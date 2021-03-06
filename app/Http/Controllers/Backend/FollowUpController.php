<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\FollowUp;
use Illuminate\Http\Request;

class FollowupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $followups=FollowUp::all();
        return view('backend.followup.index',compact('followups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $patients=auth()->user()->clinic->patients;
        return view('backend.followup.create',compact('patients'));
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
            'day'=>'required|date',
            'time'=>'required',
            'price'=>'nullable|numeric',
            'diagnose'=>'nullable|min:5|max:80',
        ]);
        auth()->user()->clinic->followups()->create($request->all());
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FollowUp  $followUp
     * @return \Illuminate\Http\Response
     */
    public function show(FollowUp $followup)
    {
        return view('backend.followup.show',compact('followup'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FollowUp  $followUp
     * @return \Illuminate\Http\Response
     */
    public function edit(FollowUp $followup)
    {
        $patients=auth()->user()->clinic->patients;
        return view('backend.followup.edit',compact('followup','patients'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FollowUp  $followUp
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FollowUp $followup)
    {
        $this->validate($request,[
            'patient_id'=>'required|integer',
            'day'=>'required|date',
            'time'=>'required',
            'price'=>'nullable|numeric',
            'diagnose'=>'nullable|min:5|max:80',
        ]);
        $followup->update($request->all());
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FollowUp  $followUp
     * @return \Illuminate\Http\Response
     */
    public function destroy(FollowUp $followup)
    {
       $followup->delete();
       return response(200);
    }
}
