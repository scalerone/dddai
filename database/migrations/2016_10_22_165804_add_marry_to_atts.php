<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMarryToAtts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('atts', function (Blueprint $table) {
            //给atts表添加是否已结婚marry字段
            $table->tinyinteger('marry')->after('gender'); //1:表示已婚; 0:表示未婚
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('atts', function (Blueprint $table) {
            $table->dropColumn('marry');
        });
    }
}
