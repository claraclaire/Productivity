<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserslogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('userslog', function (Blueprint $table) {
            $table->increments('logid');
            $table->integer('users_userid');
            $table->string('logindate',30);
            $table->string('logintime',20);
            $table->string('logouttime',20);
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
        Schema::drop('userslog');
    }
}
