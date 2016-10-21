<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableProjects extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('pid');
            $table->unsignedInteger('uid');
            $table->string('name');
            $table->integer('money');
            $table->string('mobile', 11);
            $table->string('title',50);
            $table->tinyinteger('rate');
            $table->tinyinteger('hrange');
            $table->tinyinteger('status');
            $table->integer('recive');
            $table->integer('pubtime');

            $table->foreign('uid')->references('uid')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('projects');
    }
}
