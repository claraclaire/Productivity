<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
             $table->increments('companyid');
           $table->integer('userid')->unsigned();
           $table->foreign('userid')
                 ->references('id')
                 ->on('users');
           $table->string('companyname',100);
           $table->string('address',100);
           $table->string('contact',20);
           $table->text('description');
           $table->string('repfirstname',100);
           $table->string('repmiddlename',100);
           $table->string('replastname',100);
           $table->string('position',100);
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
        Schema::drop('companies');
    }
}
