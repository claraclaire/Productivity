<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course', function (Blueprint $table) {
            $table->increments('courseid');
            $table->string('coursecode',50);
            $table->string('description');
            $table->integer('status')->nullable;
            $table->timestamps();
       
 });

        DB::table('course')->insert(
            array(
                'coursecode'    => 'BSIT',
                'description'   => 'Bachelor of Science in Information Technology',
                'status'        =>  '1'
            )
        );

        DB::table('course')->insert(
            array(
                'coursecode'    => 'BSCS',
                'description'   => 'Bachelor of Science in Computer Science',
                'status'        =>  '1'
            )
        );

        DB::table('course')->insert(
            array(
                'coursecode'    => 'BSIS',
                'description'   => 'Bachelor of Science in Information Systems',
                'status'        =>  '1'
            )
        );

        DB::table('course')->insert(
            array(
                'coursecode'    => 'ACT',
                'description'   => 'Associate in Computer Technology',
                'status'        =>  '1'
            )
        );


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('course');
    }
}
