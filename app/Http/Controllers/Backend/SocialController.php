<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SocialController extends Controller
{
    public function index()
    {
       return view('backend.social.index');
    }

    public function store(Request $request)
    {
       $this->validate($request,[
        'facebook'=>'nullable|url',
        'youtube'=>'nullable|url',
        'twitter'=>'nullable|url',
        'instagram'=>'nullable|url',
        ]);
       auth()->user()->clinic->social()->create($request->all());
       return back();
    }
}
