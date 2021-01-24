<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\City;
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
   public function search(Request $request)
   {
       $clinics=Clinic::paginate(9);
       return view('frontend.pages.clinics',compact('clinics'));
   }
   public function profile($id)
   {
       $clinic=Clinic::findOrfail($id);
       return view('frontend.pages.profile',compact('clinic'));
   }

   public function governorate($id)
   {
      $cities=City::where('governorate_id',$id)->get();
      return response()->json($cities);
   }

}
