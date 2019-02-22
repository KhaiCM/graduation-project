<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateSetCalendarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::rename('set_calendar', 'set_calendars');
        if (Schema::hasColumn('set_calendars', 'phone')) {
            Schema::table('set_calendars', function (Blueprint $table) {
                $table->string('phone', 50)->change();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::rename('set_calendars', 'set_calendar');
        if (Schema::hasColumn('set_calendars', 'phone')) {
            Schema::table('set_calendars', function (Blueprint $table) {
                $table->string('phone', 10)->change();
            });
        }
    }
}
