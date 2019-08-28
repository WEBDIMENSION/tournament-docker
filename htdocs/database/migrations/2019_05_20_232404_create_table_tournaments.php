<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableTournaments extends Migration
{
    /**
     * Run the migrations.h
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tournaments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('event_id');
            $table->integer('round');
            $table->integer('card_number');
            $table->integer('player_a_id')->nullable();
            $table->integer('player_b_id')->nullable();
            $table->string('score', 100)->nullable();
            $table->integer('winner')->nullable();
            $table->boolean('work_over')->nullable();
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
        Schema::dropIfExists('tournaments');
    }
}
