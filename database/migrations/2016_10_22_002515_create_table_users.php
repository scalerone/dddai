<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('uid');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('mobile',11)->unique();
            $table->string('password',60);
            $table->rememberToken();
            $table->integer('regtime');
            $table->integer('lastlogin');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
