<?php

namespace App\Jobs;

use App\Models\Clinic;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class AddMoreDate implements ShouldQueue
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
        $i=0;
        do {
            foreach ($this->clinic->workdates as $key => $workdate) {
              if($workdate->day==Carbon::now()->addDays($this->clinic->type_booking)->format('D'))
              {
                $i=1;
                $date=$this->clinic->appointmentdates()->create(['day'=>Carbon::now()->addDays($this->clinic->type_booking)]);
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
        }while ($i==1);
    }
}
