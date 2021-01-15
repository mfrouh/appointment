<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Prescription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use function Symfony\Component\String\b;

class PrescriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prescriptions=Prescription::all();
        return view('backend.prescription.index',compact('prescriptions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $patients=auth()->user()->clinic->patients;
        return view('backend.prescription.create',compact('patients'));
    }
    public function validatecontent(Request $request)
    {
        $this->validate($request,['name'=>'required|min:2|max:50','quantity'=>'required|numeric','message'=>'nullable|min:2|max:100']);
        Session::push('contents', $request->all());
        $contents=Session::get('contents');
        return response()->json($contents);
    }
    public function deleteitem($id)
    {
        Session::forget('contents.' . $id);
        $contents=Session::get('contents');
        return response()->json($contents);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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
            return back()->with('success','تم اضافةالروشتة بنجاح');
        }
        return back()->with('error','لا يوجد محتوي للروشتة');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Prescription  $prescription
     * @return \Illuminate\Http\Response
     */
    public function show(Prescription $prescription)
    {
        return view('backend.prescription.show',compact('prescription'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Prescription  $prescription
     * @return \Illuminate\Http\Response
     */
    public function edit(Prescription $prescription)
    {
        return view('backend.prescription.edit',compact('prescription'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Prescription  $prescription
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Prescription $prescription)
    {
        $this->validate($request,[ 'patient_id'=>'required|integer','name'=>'required']);
        $prescription->update($request->all());
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Prescription  $prescription
     * @return \Illuminate\Http\Response
     */
    public function destroy(Prescription $prescription)
    {
        $prescription->delete();
        return response(200);
    }
}
