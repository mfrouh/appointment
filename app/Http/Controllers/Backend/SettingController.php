<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
       $setting=Setting::first();
       return view('backend.setting.index',compact('setting'));
    }

    public function store(Request $request)
    {
       $this->validate($request,[
           'name'=>'required|max:50|min:3',
           'description'=>'required|min:3|max:100',
           'logo'=>'nullable|image',
           'facebook'=>'nullable|url',
           'youtube'=>'nullable|url',
           'twitter'=>'nullable|url',
           'instagram'=>'nullable|url',
        ]);
       Setting::first()->update($request->all());
       return back();
    }
}
