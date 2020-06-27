<?php

use App\Job;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class JobPostsTableSeeder extends Seeder
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
                'name' => 'KMS',
                'majors' => 1,
                'companies' => 1,
                'date_posted' => Carbon::now(),
                'date_expire' => Carbon::now()->addDay(5),
                'key_words' => "TEST, QA",
                'salary' => 50,
                'location' => '20180 Outer Dr Dearborn, MI 48124',
                'active' => 1
            )
        ));
    }
}
