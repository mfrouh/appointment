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
      $this->validate($request,['day'=>'required|unique:work_dates,day,Null,id,clinic_id,'.auth()->user()->clinic->id,'start'=>'required|before_or_equal:end','end'=>'required|after_or_equal:start']);
      $date=auth()->user()->clinic->workdates()->create(['day'=>$request->day]);
      $date->time()->create(['start'=>$request->start,'end'=>$request->end]);
      return response(200);
   }
   public function destroy($id)
    {
      WorkDate::findOrfail($id)->delete();
      return response(200);
    }
}
