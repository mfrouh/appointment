<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('clinic_id');
            $table->foreign('clinic_id')->references('id')->on('clinics')->onDelete('cascade')->onUpdate('cascade');
            $table->string('name');
            $table->string('verify_id')->nullable()->unique();
            $table->boolean('verified')->default(0);
            $table->string('verification_code')->nullable();
            $table->string('phone_number');
            $table->integer('age');
            $table->foreignId('appointment_time_id')->nullable();
            $table->foreign('appointment_time_id')->references('id')->on('appointment_times')->onDelete('set null');
            $table->date('day');
            $table->time('time');
            $table->enum('gender',['male','female']);
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
        Schema::dropIfExists('bookings');
    }
}
