<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subjects', function (Blueprint $table) {
             $table->increments('subjectid');
             $table->integer('offercode');
             $table->string('coursenumber',20);
             $table->string('subjectdescription',50);
             $table->string('days',20);
             $table->string('time',15);
             $table->string('room',10); 
             $table->integer('coordinator_userid')->unsigned();
             $table->foreign('coordinator_userid')
                   ->references('userid')
                   ->on('coordinator')
                   ->onDelete('cascade');
             $table->integer('dep_ID')->unsigned();
             $table->foreign('dep_ID')
                   ->references('depID')
                   ->on('department')
                   ->onDelete('cascade');
             $table->integer('status')->nullable;
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
        Schema::drop('subjects');
    }
}
