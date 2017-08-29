<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHolidaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('holidays', function (Blueprint $table) {
           $table->increments('holidayid');
            $table->string('holdates',50);
            $table->string('holnames',100);
            $table->integer('status');
            $table->timestamps();
        });

        DB::table('holidays')->insert(
            array(
                'holdates' => '01-01',
                'holnames' => 'New Years Days',
                'status' => '1'
                )
            );

        DB::table('holidays')->insert(
            array(
                'holdates' => '01-28',
                'holnames' => 'Chinese New Year',
                'status' => '1'
                )
            );

        DB::table('holidays')->insert(
            array(
                'holdates' => '04-09',
                'holnames' => 'The Day of Valor',
                'status' => '1'
                )
            );

        DB::table('holidays')->insert(
            array(
                'holdates' => '04-13',
                'holnames' => 'Maundy Thursday',
                'status' => '1'
                )
            );

        DB::table('holidays')->insert(
            array(
                'holdates' => '04-14',
                'holnames' => 'Good Friday',
                'status' => '1'
                )
            );

        DB::table('holidays')->insert(
            array(
                'holdates' => '04-15',
                'holnames' => 'Black Saturday',
                'status' => '1'
                )
            );

        DB::table('holidays')->insert(
            array(
                'holdates' => '05-01',
                'holnames' => 'Labor Day',
                'status' => '1'
                )
            );

        DB::table('holidays')->insert(
            array(
                'holdates' => '06-12',
                'holnames' => 'Independence Day',
                'status' => '1'
                )
            );

        DB::table('holidays')->insert(
            array(
                'holdates' => '08-21',
                'holnames' => 'Ninoy Aquino Day',
                'status' => '1'
                )
            );

        DB::table('holidays')->insert(
            array(
                'holdates' => '08-28',
                'holnames' => 'National Heroes Day',
                'status' => '1'
                )
            );

        DB::table('holidays')->insert(
            array(
                'holdates' => '10-31',
                'holnames' => 'Public Holiday',
                'status' => '1'
                )
            );

        DB::table('holidays')->insert(
            array(
                'holdates' => '11-01',
                'holnames' => 'All Saints Day',
                'status' => '1'
                )
            );

        DB::table('holidays')->insert(
            array(
                'holdates' => '11-02',
                'holnames' => 'All Souls Day',
                'status' => '1'
                )
            );

        DB::table('holidays')->insert(
            array(
                'holdates' => '11-30',
                'holnames' => 'Bonifacio Day',
                'status' => '1'
                )
            );

        DB::table('holidays')->insert(
            array(
                'holdates' => '12-25',
                'holnames' => 'Christmas Day',
                'status' => '1'
                )
            );

        DB::table('holidays')->insert(
            array(
                'holdates' => '12-30',
                'holnames' => 'Rizal Day',
                'status' => '1'
                )
            );

        DB::table('holidays')->insert(
            array(
                'holdates' => '12-31',
                'holnames' => 'New Years Eve',
                'status' => '1'
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
        Schema::drop('holidays');
    }
}
