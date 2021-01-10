<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
       return view('backend.setting.index');
    }

    public function store(Request $request)
    {
       $this->validate($request,[
           'name'=>'required|max:50|min:3',
           'description'=>'required|min:3|max:100',
           'logo'=>'required|image',
           'facebook'=>'nullable|url',
           'youtube'=>'nullable|url',
           'twitter'=>'nullable|url',
           'instagram'=>'nullable|url',
        ]);
       Setting::first()->update($request->all());
       return back();
    }
}
