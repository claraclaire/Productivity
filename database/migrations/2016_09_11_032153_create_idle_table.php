<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIdleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('idle', function (Blueprint $table) {
            $table->increments('idleid');
            $table->integer('student_userid');
            $table->string('idlestate',20);
            $table->string('idletime',20);
            $table->string('date',40);
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
        Schema::drop('idle');
    }
}
