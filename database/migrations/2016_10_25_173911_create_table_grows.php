<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableGrows extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grows', function (Blueprint $table) {
            $table->increments('gid');
            $table->unsignedInteger('uid');
            $table->unsignedInteger('pid');
            $table->string('title',60);
            $table->integer('amount');
            $table->date('paytime');

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
        Schema::drop('grows');
    }
}
