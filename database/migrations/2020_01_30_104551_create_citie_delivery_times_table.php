<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitieDeliveryTimesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('citie_delivery_times', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('citie_id');
            $table->integer('delivery_time_id');
            $table->timestamps();

            $table->foreign('citie_id')->references('id')->on('cities');
            $table->foreign('delivery_time_id')->references('id')->on('delivery_times');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('citie_delivery_times');
    }
}
