<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoordinatorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coordinator', function (Blueprint $table) {
            $table->increments('coordinatorid');
            $table->integer('userid')->unsigned();
            $table->foreign('userid')
                   ->references('id')
                   ->on('users');
            $table->integer('coordinatornumber');
            $table->string('firstname',50);
            $table->string('middlename',50);
            $table->string('lastname',50);
            $table->string('contact',20);
            $table->string('about',200);  
            $table->integer('schoolid')->unsigned();
            $table->foreign('schoolid')
                  ->references('schoolid')
                  ->on('schools');
            $table->integer('departid')->unsigned();
            $table->foreign('departid')
                  ->references('depID')
                  ->on('department');    
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
        Schema::drop('coordinator');
    }
}
