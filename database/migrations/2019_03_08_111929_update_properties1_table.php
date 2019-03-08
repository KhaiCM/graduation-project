<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateProperties1Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasColumn('properties', 'unit_id')) {
            Schema::table('properties', function (Blueprint $table) {
                $table->integer('unit_id');
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
        if (Schema::hasColumn('properties', 'unit_id')) {
            Schema::table('properties', function (Blueprint $table) {
                $table->dropColumn('unit_id');
            });
        }
    }
}
