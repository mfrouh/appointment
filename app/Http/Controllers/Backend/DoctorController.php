<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function myclinic()
    {
       if (auth()->user()->clinic) {
          $clinic=auth()->user()->clinic;
          return view('backend.clinic.edit',compact('clinic'));
       }
       else {
          return view('backend.clinic.create');
       }
    }

    public function settings()
    {
       return view('backend.setting.settings');
    }

    public function reviews()
    {
       $reviews=auth()->user()->clinic->reviews;
       return view('backend.review.index',compact('reviews'));
    }
}
