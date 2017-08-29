<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchoolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schools', function (Blueprint $table) {
            $table->increments('schoolid');
            $table->string('schoolname',100);
            $table->string('address',100);
            $table->integer('status')->nullable();
            $table->timestamps();
        });

         DB::table('schools')->insert(
            array(
                'schoolname'  => 'University Of San Jose - Recoletos',
                'address'    =>  'Basak Pardo, Cebu City',
                'status'     => '1'
            )
        );
         DB::table('schools')->insert(
            array(
                'schoolname'  => 'Holy Rosary School Of Pardo',
                'address'    =>  'Pardo, Cebu City',
                'status'     => '1'
            )
        );
         DB::table('schools')->insert(
            array(
                'schoolname'  => 'University Of The Visayas',
                'address'    =>  'Cebu City',
                'status'     => '1'
            )
        );
         DB::table('schools')->insert(
            array(
                'schoolname'  => 'St. Theresas College',
                'address'    =>  'Mango Avenue',
                'status'     => '1'
            )
        );
         DB::table('schools')->insert(
            array(
                'schoolname'  => 'St. Francis Of Assisi School',
                'address'    =>  'Lahug, Cebu',
                'status'     => '1'
            )
        );
         DB::table('schools')->insert(
            array(
                'schoolname'  => 'University Of San Carlos',
                'address'    =>  'V-rama, Cebu',
                'status'     => '1'
            )
        );
         DB::table('schools')->insert(
            array(
                'schoolname'  => 'St. Pauls College',
                'address'    =>  'Bulacao Pardo, Cebu City',
                'status'     => '1'
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
        Schema::drop('schools');
    }
}
