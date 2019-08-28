<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('cup_id');
            $table->string('event_name', 255);
            $table->integer('event_number');
            $table->integer('type')->nullable();
            $table->integer('players_count')->nullable();
            $table->integer('set_count')->nullable();
            $table->integer('rule')->nullable();
            $table->integer('tiebreak')->nullable();
            $table->longText('tournament')->nullable();
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
        Schema::dropIfExists('events');
    }
}
