<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHiredinternsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hiredinterns', function (Blueprint $table) {
            $table->increments('hiredinternsid');
            $table->integer('company_userid')->unsigned();
            $table->foreign('company_userid')
                  ->references('userid')
                  ->on('companies');
            $table->integer('student_userid')->unsigned();
            $table->foreign('student_userid')
                  ->references('userid')
                  ->on('students');
            $table->time('start');
            $table->time('end');
            $table->time('hoursRendered');
            $table->string('workstatus');
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
        Schema::drop('hiredinterns');
    }
}
