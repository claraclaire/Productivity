<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanyevaluationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companyevaluation', function (Blueprint $table) {
            $table->increments('compevalid');
            $table->integer('company_userid');
            $table->integer('student_userid');
            $table->integer('immediate_superior');
            $table->string('iscomment',200);
            $table->integer('co_worker');
            $table->string('cwcomment',200);
            $table->integer('workplace');
            $table->string('wpcomment',200);
            $table->integer('opportunities');
            $table->string('ocomment',200);
            $table->integer('tasks_assigned');
            $table->string('tacomment',200);
            $table->integer('overall_experience');
            $table->string('oecomment',200);
            $table->string('greatest_benefits',500);
            $table->string('biggest_problems',500);
            $table->string('suggest_improvement',500);
            $table->string('recommend_company',500);
            $table->string('date',30);
            $table->string('status',50);
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
        Schema::drop('companyevaluation');
    }
}
