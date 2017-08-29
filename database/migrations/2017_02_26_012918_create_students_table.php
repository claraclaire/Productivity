<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
           $table->increments('studentid');
           $table->integer('userid')->unsigned();
           $table->foreign('userid')
                 ->references('id')
                 ->on('users');
           $table->integer('studentnumber');
           $table->string('firstname',50);
           $table->string('middlename',50);
           $table->string('lastname',50);
           $table->string('phonenumber',12);
           $table->date('dateofbirth');
           $table->enum('gender',array('Male','Female'));
           $table->string('address',100);
           $table->enum('civilStatus',array('Married','Single','In Relationship'));
           $table->string('citizenship',50);
           $table->string('religion',50);
           $table->string('fathersName',50);
           $table->string('mothersName',50);
           $table->integer('schoolid')->unsigned();
           $table->foreign('schoolid')
                  ->references('schoolid')
                  ->on('schools');
           $table->integer('departid')->unsigned();
           $table->foreign('departid')
                  ->references('depID')
                  ->on('department');  
           $table->integer('courseid');
           $table->integer('yearLevel');
           $table->date('dateOfLastUpdate');
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
        Schema::drop('students');
    }
}
