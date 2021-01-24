<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Speciality;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function myclinic()
    {
        $specialities=Speciality::all();
       if (auth()->user()->clinic) {
          $clinic=auth()->user()->clinic;
          return view('backend.clinic.edit',compact('clinic','specialities'));
       }
       else {
          return view('backend.clinic.create',compact('specialities'));
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
