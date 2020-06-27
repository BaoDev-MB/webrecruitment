<?php

use App\Company;
use Illuminate\Database\Seeder;

class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Company::insert(array(
            array(
                'id' => 1,
                'name' => 'KMS'
            ),
            array(
                'id' => 2,
                'name' => 'LG'
            ),

            array(
                'id' => 3,
                'name' => ' King LLC'
            )
        ));

    }
}
