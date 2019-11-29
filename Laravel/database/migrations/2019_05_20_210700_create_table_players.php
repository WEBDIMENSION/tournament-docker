<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePlayers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('players', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('event_id');
            $table->string('player_id', 16);
            $table->string('player_name', 50);
            $table->string('player_city', 16);
            $table->boolean('player_seed');
            $table->string('player_data_3', 100);
            $table->string('player_data_4', 100);
            $table->string('player_data_5', 100);
            $table->string('player_tooltip_1', 100);
            $table->string('player_tooltip_2', 100);
            $table->string('player_tooltip_3', 100);
            $table->string('player_tooltip_4', 100);
            $table->string('player_tooltip_5', 100);
            $table->string('partner_id', 16);
            $table->string('partner_name', 50);
            $table->string('partner_city', 16);
            $table->boolean('partner_seed');
            $table->string('partner_data_3', 100);
            $table->string('partner_data_4', 100);
            $table->string('partner_data_5', 100);
            $table->string('partner_tooltip_1', 100);
            $table->string('partner_tooltip_2', 100);
            $table->string('partner_tooltip_3', 100);
            $table->string('partner_tooltip_4', 100);
            $table->string('partner_tooltip_5', 100);
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
        Schema::dropIfExists('players');
    }
}
