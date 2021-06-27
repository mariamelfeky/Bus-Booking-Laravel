<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStationTripsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('station_trips', function (Blueprint $table) {
            $table->id();

            $table->foreignId('trip_id')->constrained('trips')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreignId('station_id')->constrained('stations')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->integer('stop_order')->default(1);

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
        Schema::dropIfExists('station_trips');
    }
}
