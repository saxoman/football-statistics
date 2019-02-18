<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSheduledsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sheduleds', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('matchesId');
            $table->integer('competitionId');
            $table->text('competitionName');
            $table->text('homeTeamName');
            $table->text('awayTeamName');
            $table->integer('homeTeamId');
            $table->integer('awayTeamId');
            $table->dateTime('utcDate');

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
        Schema::dropIfExists('sheduleds');
    }
}
