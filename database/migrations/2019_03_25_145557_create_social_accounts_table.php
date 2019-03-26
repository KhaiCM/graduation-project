<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSocialAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('social_accounts', function (Blueprint $table) {
            $table->unsignedInteger('user_id');
            $table->string('provider_user_id');
            $table->string('provider');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('social_accounts', function (Blueprint $table) {
            $table->dropForeign('social_accounts_user_id_foreign');
        });
        Schema::dropIfExists('social_accounts');
    }
}
