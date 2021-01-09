<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentTimesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointment_times', function (Blueprint $table) {
            $table->id();
            $table->foreignId('appointment_date_id');
            $table->foreign('appointment_date_id')->references('id')->on('appointment_dates')->onDelete('cascade')->onUpdate('cascade');
            $table->time('time');
            $table->boolean('booked')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('appointment_times');
    }
}
