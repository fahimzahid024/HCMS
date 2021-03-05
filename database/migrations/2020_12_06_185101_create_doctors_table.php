<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->id('doctor_id');
            $table->unsignedInteger('view_patient');
            $table->string('name');
            $table->string('doctor_email')->unique();
            $table->text('doctor_specilization');
            $table->string('doctor_phone');
            $table->string('consultency_fee');
            $table->string('image');
            $table->tinyInteger('doctor_status')->default('0');
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
        Schema::dropIfExists('doctors');
    }
}
