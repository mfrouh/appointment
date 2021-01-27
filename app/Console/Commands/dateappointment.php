<?php

namespace App\Console\Commands;

use App\Jobs\AddMoreDate;
use App\Models\AppointmentDate;
use App\Models\Clinic;
use Illuminate\Console\Command;

class dateappointment extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'date:work';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete First Date And  Add Last Date';

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
       AppointmentDate::whereDate('day','<',now())->delete();
       foreach (Clinic::all() as $key => $clinic) {
        app('Illuminate\Bus\Dispatcher')->dispatch(new AddMoreDate($clinic));
       }
    }
}
