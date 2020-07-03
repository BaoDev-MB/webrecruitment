<?php

use Illuminate\Database\Seeder;
use App\ContactJobType;
class ContactJobTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        ContactJobType::insert(array(
            array(
                'id' => 1,
                'job_id' => 1,
                'jobtype_id'=>1
            ),
            array(
                'id' => 2,
                'job_id' => 1,
                'jobtype_id'=>2
            ),

            array(
                'id' => 3,
                'job_id' => 1,
                'jobtype_id'=>3
            ),
            array(
                'id' => 4,
                'job_id' => 2,
                'jobtype_id'=>1
            ),
            array(
                'id' => 5,
                'job_id' => 2,
                'jobtype_id'=>2
            ),
            array(
                'id' => 6,
                'job_id' => 2,
                'jobtype_id'=>3
            ),
            array(
                'id' => 7,
                'job_id' => 2,
                'jobtype_id'=>4
            ),
            array(
                'id' => 8,
                'job_id' => 3,
                'jobtype_id'=>1
            ),
            array(
                'id' => 9,
                'job_id' => 3,
                'jobtype_id'=>2
            ),
            array(
                'id' => 10,
                'job_id' => 3,
                'jobtype_id'=>4
            ),
        ));
    }
}
