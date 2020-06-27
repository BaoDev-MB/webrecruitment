<?php

use App\JobType;
use Illuminate\Database\Seeder;

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
                'id'=>1,
                'name'=>'Part time'
            ),
            array(
                'id'=>2,
                'name'=>'Full time'
            ),
            array(
                'id'=>3,
                'name'=>'Internship'
            ),
            array(
                'id'=>4,
                'name'=>'Freelance'
            )

        ));
    }
}
