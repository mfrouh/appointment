<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
       $services=auth()->user()->clinic->services;
       return view('backend.service.index',compact('services'));
    }

    public function store(Request $request)
    {
       $this->validate($request,[
           'name'=>'required:min:2|max:50',
           ]);
       auth()->user()->clinic->services()->create($request->all());
       return response(200);
    }
    public function destroy($id)
    {
      Service::findOrfail($id)->delete();
      return response(200);
    }
}
