<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call('CollegeTableSeeder');
        $this->call('CoursesTableSeeder');
        
    }
}

class CollegeTableSeeder extends Seeder{
 
 public function run(){

    $colleges = array(

        array(

            'colid' => '1',
            'colName' => 'CICCT'

            ),

        array(
            'colid' => '2',
            'colName' => 'Nursing'


            ),
        array(
            'colid' => '3',
            'colName' => 'Law'

            ),
        array(
            'colid' => '4',
            'colName' => 'Commerce'

            ),

        array(
            'colid' => '5',
            'colName' => 'CAS'

            ),

        array(
            'colid' => '6',
            'colName' => 'ENGINEERING'

            ),

        array(
            'colid' => '7',
            'colName' => 'COE'

            ),


        );
    DB::table('colleges')->insert($colleges);
 }



}

class CourseTableSeeder extends Seeder {

public function run(){

    $courses = array(
        'colid' => '1',
        'courid' => '1',
        'courName' => 'LAW'


        ),
    array(
        'colid' => '2',
        'colName' => '2',
        'courName' => 'BS Computer Science'
        ),

    array(
        'colid' => '2',
        'courid' => '3',
        'courName' => 'BS Information Technology'

        ),
    array(
        'colid' => '3',
        'courid' => '4',
        'courName' => 'Bachelor of Arts In English'
        ),

    array(
        'colid' => '3',
        'courid' => '5',
        'courName' => 'Bachelor of Arts in Communication'
        ),
    array(
        'colid' => '4',
        'courid' => '8',
        'courName' => 'Bachelor of Arts in Biology'

        ),
    );

DB::table('courses')->insert($courses);
}


}
