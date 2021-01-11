<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\BlackList;
use Illuminate\Http\Request;

class BlacklistController extends Controller
{
    public function index()
    {
       $blacklists=auth()->user()->clinic->blacklists;
       return view('backend.blacklist.index',compact('blacklists'));
    }

    public function store(Request $request)
    {
       $this->validate($request,
       ['phone_number'=>'required|unique:black_lists,phone_number,Null,id,clinic_id,'.auth()->user()->clinic->id]
       );
       auth()->user()->clinic->blacklists()->create($request->all());
       return back();
    }

    public function destroy($id)
    {
      BlackList::findOrfail($id)->delete();
      return back();
    }
}
