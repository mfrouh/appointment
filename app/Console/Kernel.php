<?php

namespace App\Console;

use App\Console\Commands\dateappointment;
use App\Console\Commands\timeappointment;
use App\Console\Commands\verifybooking;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
       verifybooking::class,
       dateappointment::class,
       timeappointment::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
         $schedule->command('verify:booking')->everyMinute();
         $schedule->command('date:work')->daily();
         $schedule->command('time:work')->everyTenMinutes();
         $schedule->command('inspire')->hourly();
         $schedule->command('queue:work')->everyMinute();
         $schedule->command('queue:restart')->everyFiveMinutes();

    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
