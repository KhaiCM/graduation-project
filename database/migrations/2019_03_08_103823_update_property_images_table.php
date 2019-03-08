<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdatePropertyImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasColumn('property_images', 'name')) {
            Schema::table('property_images', function (Blueprint $table) {
                $table->dropColumn('name');
            });
        }
        if (Schema::hasColumn('property_images', 'status')) {
            Schema::table('property_images', function (Blueprint $table) {
                $table->dropColumn('status');
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
        if (!Schema::hasColumn('property_images', 'name')) {
            Schema::table('property_images', function (Blueprint $table) {
                $table->string('name', 255);
            });
        }
        if (!Schema::hasColumn('property_images', 'status')) {
            Schema::table('property_images', function (Blueprint $table) {
                $table->string('status', 255);
            });
        }
    }
}
