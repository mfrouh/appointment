<?php

namespace App\Console\Commands;

use App\Models\AppointmentDate;
use Illuminate\Console\Command;

class timeappointment extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'time:work';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Block Ended Time';

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
      foreach (AppointmentDate::whereDate('day',now())->get() as $key => $date) {
         $date->times()->whereTime('time','<',now())->update(['booked'=>1]);
      }
    }
}
