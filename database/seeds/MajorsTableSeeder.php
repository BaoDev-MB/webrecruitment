<?php

use App\Major;
use Illuminate\Database\Seeder;

class MajorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Major::insert(array(
            array(
                'id'=>1,
                'name'=>'Test'
            ),
            array(
                'id'=>2,
                'name'=>'Dev'
            ),
            array(
                'id'=>3,
                'name'=>'PM'
            )
        ));
    }
}
