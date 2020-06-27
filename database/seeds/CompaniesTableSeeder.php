<?php

use App\Company;
use Illuminate\Database\Seeder;
use Illuminate\Mail\Transport\ArrayTransport;

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
                'id'=>1,
                'name'=>'KMS'
            ),
            array(
                'id'=>2,
                'name'=>'KMS1'
            )
        ));

    }
}
