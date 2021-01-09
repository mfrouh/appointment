<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function booking()
    {
        # code...
    }
    public function store(Request $request)
    {
        # code...
    }
    public function verify()
    {
        // $basic  = new \Nexmo\Client\Credentials\Basic('22ccdc4d', 'bJdeW7jxphJ1xLga');
        // $client = new \Nexmo\Client($basic);

        // $message = $client->message()->send([
        //     'to' => '201289189978',
        //     'from' => 'mohamed frouh',
        //     'text' => 'كود هو 343644'
        // ]);

    }
}
