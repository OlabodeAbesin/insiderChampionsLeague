<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teams', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->integer('points')->default(0);
            $table->integer('played')->default(0);
            $table->integer('score')->default(75);
            $table->integer('winCount')->default(0);
            $table->integer('drawCount')->default(0);
            $table->integer('lossCount')->default(0);
            $table->string('GF')->default(0);
            $table->string('GA')->default(0);
            $table->text('description')->nullable();
            $table->string('flag_url')->nullable();
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
        Schema::dropIfExists('teams');
    }
}
