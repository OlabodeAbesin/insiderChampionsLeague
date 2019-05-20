<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFixturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fixtures', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('week');
            $table->string('teamA');
            $table->integer('teamAGoals')->nullable();
            $table->string('teamB');
            $table->integer('teamBGoals')->nullable();
            $table->boolean('isGamePlayed')->nullable();
            $table->boolean('isGameEdited')->nullable();
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
        Schema::dropIfExists('fixtures');
    }
}
