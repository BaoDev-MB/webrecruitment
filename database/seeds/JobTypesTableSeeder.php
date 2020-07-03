<?php

use Illuminate\Database\Seeder;
use App\JobType;

class JobTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        JobType::insert(array(
            array(
                'id' => 1,
                'class_css'=>"part-time",
                'name' => 'Part time'
            ),
            array(
                'id' => 2,
                'class_css'=>"full-time",
                'name' => 'Full Time'
            ),

            array(
                'id' => 3,
                'class_css'=>"internship",
                'name' => 'Internship'
            ),

            array(
                'id' => 4,
                'class_css'=>"freelance",
                'name' => 'Freelance'
            )
        ));
    }
}
