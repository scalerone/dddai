<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableAtts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('atts', function (Blueprint $table) {
            $table->increments('aid');
            $table->unsignedInteger('uid');
            $table->unsignedInteger('pid');
            $table->string('title');
            $table->string('realname');
            $table->tinyinteger('age');
            $table->enum('gender',['男','女']);
            $table->tinyinteger('salary');
            $table->string('jobcity');
            $table->string('udesc');

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
        Schema::drop('atts');
    }
}
