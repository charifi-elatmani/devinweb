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
            $table->date('date');
            $table->Integer('citie_delivery_time_id');
            $table->timestamps();
            $table->foreign('citie_delivery_time_id')->references('id')->on('citie_delivery_times');
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
