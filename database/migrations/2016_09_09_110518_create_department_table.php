<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDepartmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('department', function (Blueprint $table) {
           $table->increments('depID');
            $table->string('depCode',50);
            $table->string('depName',100);
            $table->integer('status')->nullable;
            $table->timestamps();
        });

        DB::table('department')->insert(
            array(
                'depCode' => "CICCT",
                'depName' => "College of Information, Computer and Communications 

Technology",
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
        Schema::drop('department');
    }
}
