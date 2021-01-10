<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\WorkDate;
use Illuminate\Http\Request;

class WorkdateController extends Controller
{
   public function index()
   {
      return view('backend.workdate.index');
   }

   public function store(Request $request)
   {
      $this->validate($request,['day'=>'required|date','start'=>'required|time','end'=>'required|time']);
      auth()->user()->clinic->dates()->create($request->all());
      return back();
   }
}
