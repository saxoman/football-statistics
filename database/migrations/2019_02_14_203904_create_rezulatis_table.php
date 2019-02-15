<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRezulatisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rezulatis', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('competitionId');
            $table->text('competitionName');
            $table->text('homeTeamName');
            $table->text('awayTeamName');
            $table->integer('homeTeamId');
            $table->integer('awayTeamId');
            $table->dateTime('utcDate');
            $table->integer('halfTimeHome');
            $table->integer('halfTimeAway');
            $table->integer('fullTimeHome');
            $table->integer('fullTimeAway');

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
        Schema::dropIfExists('rezulatis');
    }
}
