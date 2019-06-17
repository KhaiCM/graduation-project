<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update2SetCalendarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('set_calendars', function(Blueprint $table) {
            $table->renameColumn('property_id', 'properties_id');
        });
    }

    public function down()
    {
        Schema::table('set_calendars', function(Blueprint $table) {
            $table->renameColumn('properties_id', 'property_id');
        });
    }

}
