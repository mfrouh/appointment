<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class NotificationController extends Controller
{
    public function changeread(Request $request)
    {
        auth()->user()->notifications()->where('id', $request->id)->update(['read_at'=>now()]);
        return response()->json('change read');
    }

    public function destroy(Request $request)
    {
        auth()->user()->notifications()->where('id', $request->id)->delete();
        return response()->json('notification delete');
    }
}
