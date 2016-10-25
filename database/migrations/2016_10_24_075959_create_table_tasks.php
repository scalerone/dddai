<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableTasks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->increments('tid');
            $table->unsignedInteger('uid');
            $table->unsignedInteger('pid');
            $table->string('title');
            $table->integer('amount');
            $table->date('enddate');

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
        Schema::drop('tasks');
    }
}
