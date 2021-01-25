<?php

namespace App\Jobs;

use App\Models\AppointmentTime;
use App\Models\Clinic;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class AppointmentDateJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public $clinic;
    public function __construct(Clinic $clinic)
    {
       $this->clinic=$clinic;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->clinic->appointmentdates()->delete();
        for ($i=0; $i < $this->clinic->type_booking; $i++) {
            $this->clinic->workdates;
            foreach ($this->clinic->workdates as $key => $workdate) {
              if($workdate->day==Carbon::now()->addDays($i)->format('D'))
              {
                $date=$this->clinic->appointmentdates()->create(['day'=>Carbon::now()->addDays($i)]);
                $start=$workdate->time->start;
                $end=$workdate->time->end;
                 $j=0;
                    do {
                        $start2=Carbon::parse($start)->addMinutes($j * $this->clinic->time_appointment);
                        $end2=Carbon::parse($end);
                        $date->times()->create(['time'=>$start2]);
                        $j++;
                    } while ($end2 > $start2);
                }
            }
        }
    }
}
