<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterRoutesTowns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('routes', function(Blueprint $table) {
            $table->unsignedBigInteger('town_from');
            $table->unsignedBigInteger('town_to');

            $table->foreign('town_from')->references('id')->on('towns')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('town_to')->references('id')->on('towns')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('routes', function(Blueprint $table) {
            $table->dropForeign(['town_from']);
            $table->dropForeign(['town_to']);
        });
    }
}
