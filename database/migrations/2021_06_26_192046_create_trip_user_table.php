<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTripUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trip_user', function (Blueprint $table) {
            $table->id();
            $table->integer('seat_number')->unsigned()->nullable();
            $table->foreignId('user_id')->constrained('users')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreignId('trip_id')->constrained('trips')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreignId('pickup_station_id')->constrained('stations')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreignId('arrival_station_id')->constrained('stations')->onDelete('CASCADE')->onUpdate('CASCADE');

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
        Schema::dropIfExists('trip_user');
    }
}
