<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSetCalendarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('set_calendar', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('property_id');
            $table->string('date', 255);
            $table->string('time', 255);
            $table->string('phone', 11);
            $table->string('email', 255);
            $table->string('note', 255);
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
        Schema::dropIfExists('set_calendar');
    }
}
