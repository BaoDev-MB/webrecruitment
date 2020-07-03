<?php

use App\Job;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class JobsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Job::insert(array(
            array(
                'id' => 1,
                'job_title' => 'Service',
                'majors_id' => 1,
                'company_id' => 1,
                'date_posted' => Carbon::now(),
                'date_expire' => Carbon::now()->addDay(5),
                'job_tag' => "TEST, QA",
                'salary' => 50,
                'location' => '20180 Outer Dr Dearborn, MI 48124',
                'active' => 1
            ),
            array(
                'id' => 2,
                'job_title' => 'Service Food  Specialist',
                'majors_id' => 2,
                'company_id' => 2,
                'date_posted' => Carbon::now(),
                'date_expire' => Carbon::now()->addDay(5),
                'job_tag' => "TEST, QA",
                'salary' => 50,
                'location' => '20180 Outer Dr Dearborn, MI 48124',
                'active' => 1
            ),
            array(
                'id' => 3,
                'job_title' => 'Food Service Specialist',
                'majors_id' => 3,
                'company_id' => 3,
                'date_posted' => Carbon::now(),
                'date_expire' => Carbon::now()->addDay(5),
                'job_tag' => "TEST, QA",
                'salary' => 50,
                'location' => '20180 Outer Dr Dearborn, MI 48124',
                'active' => 1
            )
        ));
    }
}
