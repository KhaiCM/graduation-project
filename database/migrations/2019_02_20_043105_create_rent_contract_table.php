<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRentContractTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rent_contract', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('lessee_id')->unsigned();
            $table->integer('property_id')->unsigned();
            $table->string('rent_time', 255);
            $table->string('start_date', 255);
            $table->string('end_date', 252);
            $table->text('content');
            $table->float('total_money');
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
        Schema::dropIfExists('rent_contract');
    }
}
