<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Education;
use Illuminate\Http\Request;

class EducationController extends Controller
{
    public function index()
    {
       $educations=auth()->user()->clinic->educations;
       return view('backend.education.index',compact('educations'));
    }

    public function store(Request $request)
    {
       $this->validate($request,[
           'degree'=>'required:min:2|max:50',
           'college'=>'required:min:2|max:50',
           'from'=>'required|numeric|before:to',
           'to'=>'required|numeric|after:from'
           ]);
       auth()->user()->clinic->educations()->create($request->all());
       return response(200);
    }
    public function destroy($id)
    {
      Education::findOrfail($id)->delete();
      return response(200);
    }
}
