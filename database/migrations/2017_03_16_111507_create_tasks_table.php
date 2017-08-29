<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->increments('taskid');
            $table->integer('hiredinternsid');
            $table->string('taskdescription',200);
            $table->date('startrange');
            $table->date('endrange');
            $table->string('timestartrange',30);
            $table->string('timeendrange',30);
            $table->string('projectname',100);
            $table->integer('natureid');
            $table->string('status',30);
            $table->string('completion',30);
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
        Schema::drop('tasks');
    }
}
