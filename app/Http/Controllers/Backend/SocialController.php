<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SocialController extends Controller
{
    public function index()
    {
       $social=auth()->user()->clinic->social;
       return view('backend.social.index',compact('social'));
    }

    public function store(Request $request)
    {
       $this->validate($request,[
        'facebook'=>'nullable|url',
        'youtube'=>'nullable|url',
        'twitter'=>'nullable|url',
        'instagram'=>'nullable|url',
        ]);
        if ( auth()->user()->clinic->social) {
            auth()->user()->clinic->social()->update($request->except('_token'));
        }
        else {
            auth()->user()->clinic->social()->create($request->except('_token'));
        }
       return back();
    }
}
