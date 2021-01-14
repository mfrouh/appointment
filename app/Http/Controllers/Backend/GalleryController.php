<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Image;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index()
    {
       $images=auth()->user()->clinic->gallery;
       return view('backend.gallery.index',compact('images'));
    }

    public function store(Request $request)
    {
       $this->validate($request,['images'=>'required|array','images.*'=>'required|image']);
       foreach ($request->images as $key => $image) {
        auth()->user()->clinic->gallery()->create(['url'=>$image]);
       }
       return back();
    }
    public function destroy($id)
    {
      Image::findOrfail($id)->delete();
      return response(200);
    }
}
