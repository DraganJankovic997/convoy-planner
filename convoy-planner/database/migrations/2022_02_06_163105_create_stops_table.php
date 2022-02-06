<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stops', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('route_id');
            $table->unsignedBigInteger('town_id');
            $table->date('arrival_date');
            $table->date('leave_date');
            $table->boolean('is_overnight');
            $table->enum('status', ['PENDING', 'OPEN', 'CLOSED', 'CANCELLED']);
            $table->timestamps();

            $table->foreign('route_id')->references('id')->on('routes')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('town_id')->references('id')->on('towns')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stops');
    }
}
