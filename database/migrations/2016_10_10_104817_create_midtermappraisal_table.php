<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMidtermappraisalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('midtermappraisal', function (Blueprint $table) {
            $table->increments('midtermappraisalid');
            $table->integer('student_userid');
            $table->integer('company_userid');
            $table->string('term',20);
            $table->integer('qualityofwork');
            $table->integer('quantityofwork');
            $table->integer('dependability');
            $table->integer('cooperation');
            $table->integer('personality');
            $table->integer('attendance');
            $table->integer('resourcefulness');
            $table->integer('managerialpotentials');
            $table->string('comment',500);
            $table->string('date',30);
            $table->string('status',10);
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
        Schema::drop('midtermappraisal');
    }
}
