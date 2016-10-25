<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableHks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hks', function (Blueprint $table) {
            $table->increments('hid');
            $table->unsignedInteger('uid');
            $table->unsignedInteger('pid');
            $table->string('title');
            $table->integer('amount');
            $table->date('paydate');
            $table->tinyinteger('status');

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
        Schema::drop('hks');
    }
}
