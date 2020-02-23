<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExcludingDeliveryTimesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('excluding_delivery_times', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('citie_delivery_time_id')->unsigned();
            $table->foreign('citie_delivery_time_id')->references('id')->on('citie_delivery_time');
            $table->date('date');
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
        Schema::dropIfExists('excluding_delivery_times');
    }
}
