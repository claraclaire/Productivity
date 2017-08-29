<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNatureofworksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('natureofworks', function (Blueprint $table) {
            $table->increments('natureid');
            $table->string('natureofwork',50);
            $table->integer('status');
            $table->timestamps();
        });

        DB::table('natureofworks')->insert(
            array(
                'natureofwork'  => 'Software Development',
                'status'    =>  '1'
            )
        );
        DB::table('natureofworks')->insert(
            array(
                'natureofwork'  => 'Software Testing',
                'status'    =>  '1'
            )
        );
        DB::table('natureofworks')->insert(
            array(
                'natureofwork'  => 'Research',
                'status'    =>  '1'
            )
        );
        DB::table('natureofworks')->insert(
            array(
                'natureofwork'  => 'Technical Support',
                'status'    =>  '1'
            )
        );
        DB::table('natureofworks')->insert(
            array(
                'natureofwork'  => 'Clerical Tasks',
                'status'    =>  '1'
            )
        );
        DB::table('natureofworks')->insert(
            array(
                'natureofwork'  => 'Errands',
                'status'    =>  '1'
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
        Schema::drop('natureofworks');
    }
}
