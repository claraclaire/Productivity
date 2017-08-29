<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJournalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('journal', function (Blueprint $table) {
            $table->increments('journalid');
            $table->integer('student_userid');
            $table->string('entry',300);
            $table->date('date',30);
            $table->time('start');
            $table->time('end');
            $table->integer('softwaredevelopment');
            $table->integer('softwaretesting');
            $table->integer('research');
            $table->integer('technicalsupport');
            $table->integer('clericaltasks');
            $table->integer('errands');
            $table->integer('totalHours');
            $table->date('dateSubmitted');
            $table->string('validation',300);
            $table->integer('status');
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
        Schema::drop('journal');
    }
}
