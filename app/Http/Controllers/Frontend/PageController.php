<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Clinic;
use Illuminate\Http\Request;

class PageController extends Controller
{
   public function index()
   {
       return view('frontend.pages.index');
   }
   public function clinics()
   {
       $clinics=Clinic::paginate(9);
       return view('frontend.pages.clinics',compact('clinics'));
   }
}
