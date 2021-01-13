<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Experience;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    public function index()
    {
       $experiences=auth()->user()->clinic->experiences;
       return view('backend.experience.index',compact('experiences'));
    }

    public function store(Request $request)
    {
       $this->validate($request,[
           'hospital_name'=>'required:min:2|max:50',
           'from'=>'required|numeric|before:to',
           'to'=>'required|numeric|after:from'
           ]);
       auth()->user()->clinic->experiences()->create($request->all());
       return response(200);
    }
    public function destroy($id)
    {
      Experience::findOrfail($id)->delete();
      return response(200);
    }
}
