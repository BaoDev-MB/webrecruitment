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
                'majors' => 1,
                'companies' => 1,
                'job_types' =>1,
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
                'majors' => 2,
                'companies' => 2,
                'job_types' =>2,
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
                'majors' => 3,
                'companies' => 3,
                'job_types' =>3,
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
