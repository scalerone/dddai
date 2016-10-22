<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatBids extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bids', function (Blueprint $table) {
            $table->increments('bid');
            $table->unsignedInteger('uid');
            $table->unsignedInteger('pid');
            $table->string('title',50);
            $table->integer('money');
            $table->integer('pubtime');

            $table->foreign('uid')->references('uid')->on('users');
            $table->foreign('pid')->references('pid')->on('projects');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('bids');
    }
}
