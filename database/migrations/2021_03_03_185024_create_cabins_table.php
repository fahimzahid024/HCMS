<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCabinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cabins', function (Blueprint $table) {
            $table->id();
            $table->Integer('cabin_number')->unique();
            $table->string('floor');
            $table->Integer('total_room');
            $table->Integer('total_bathroom');
            $table->Integer('total_bed');
            $table->string('image');
            $table->string('price');
            $table->string('booking_status')->default('Not Booking');
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
        Schema::dropIfExists('cabins');
    }
}
