<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClinicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clinics', function (Blueprint $table) {
            $table->id();
            $table->foreignId('governorate_id');
            $table->foreign('governorate_id')->references('id')->on('governorates');
            $table->foreignId('city_id');
            $table->foreign('city_id')->references('id')->on('cities');
            $table->foreignId('user_id')->unique();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('speciality_id');
            $table->foreign('speciality_id')->references('id')->on('specialities')->onDelete('cascade')->onUpdate('cascade');
            $table->string('name');
            $table->enum('status',['active','inactive'])->default('inactive');
            $table->string('image');
            $table->string('address');
            $table->string('phone1');
            $table->string('phone2')->nullable();
            $table->enum('time_appointment',['10','15','30','45','60'])->default('10');
            $table->integer('price');
            $table->enum('type_booking',['7','14','30'])->default('7');
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
        Schema::dropIfExists('clinics');
    }
}
