<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
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
           'colloge'=>'required:min:2|max:50',
           'from'=>'required|year',
           'to'=>'required|year'
           ]);
       auth()->user()->clinic->educations()->create($request->all());
       return back();
    }
}
