<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMatchsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matchs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('status');
            $table->integer('matchday');
            $table->string('homeTeamName');
            $table->string('awayTeamName');
            $table->integer('result_GoalsHomeTeam');
            $table->integer('result_GoalsAwayTeam');
            $table->integer('halfTime_result_GoalsHomeTeam');
            $table->integer('halfTime_result_GoalsAwayTeam');
            $table->integer('extraTime_result_GoalsHomeTeam');
            $table->integer('extraTime_result_GoalsAwayTeam');
            $table->integer('penaltyShootout_result_GoalsHomeTeam');
            $table->integer('penaltyShootout_result_GoalsAwayTeam');
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
        Schema::dropIfExists('matchs');
    }
}
