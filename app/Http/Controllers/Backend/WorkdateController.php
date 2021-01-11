<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\WorkDate;
use Illuminate\Http\Request;

class WorkdateController extends Controller
{
   public function index()
   {
      $workdates=auth()->user()->clinic->workdates;
      return view('backend.workdate.index',compact('workdates'));
   }

   public function store(Request $request)
   {
      $this->validate($request,['day'=>'required|date','start'=>'required|time','end'=>'required|time']);
      $date=auth()->user()->clinic->dates()->create($request->day);
      $date->time()->sync(['start'=>$request->start,'end'=>$request->end]);
      return back();
   }
}
