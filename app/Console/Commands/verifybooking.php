<?php

namespace App\Console\Commands;

use App\Models\AppointmentTime;
use App\Models\Booking;
use Illuminate\Console\Command;

class verifybooking extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'verify:booking';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete Booking UnVerified';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $bookings=Booking::where('verified',0)->where('verification_code','!=',null)->where('created_at','<',now()->subMinutes(10));
        AppointmentTime::whereIn('id',$bookings->pluck('appointment_time_id'))->update(['booked'=>0]);
        $bookings->delete();
    }
}
