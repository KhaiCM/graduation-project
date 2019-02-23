<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasColumn('properties', 'district_id')) {
            Schema::table('properties', function (Blueprint $table) {
                $table->integer('district_id')->unsigned();
            });
        }
        if (!Schema::hasColumn('properties', 'form')) {
            Schema::table('properties', function (Blueprint $table) {
                $table->boolean('form');
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
        if (Schema::hasColumn('properties', 'district_id')) {
            Schema::table('properties', function (Blueprint $table) {
                $table->dropColumn('district_id');
            });
        }
        if (Schema::hasColumn('properties', 'form')) {
            Schema::table('properties', function (Blueprint $table) {
                $table->dropColumn('form');
            });
        }
    }
}
