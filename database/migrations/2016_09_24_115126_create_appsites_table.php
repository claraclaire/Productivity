<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppsitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appsites', function (Blueprint $table) {
            $table->increments('appsiteid');
            $table->integer('student_userid');
            $table->integer('appid');
            $table->string('appsitename',100);
            $table->string('date',30);
            $table->string('startingtime',20);
            $table->string('endtime',20);
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
        Schema::drop('appsites');
    }
}
