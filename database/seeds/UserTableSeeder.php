<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::insert([
            'email' => 'admin@gmail.com',
            'password' => Hash::make('12345678'),
            'active' => 1,
        ]);
//        User::created(array(
//            'email' => 'admin@gmail.com',
//            'password' => Hash::make('12345678'),
//            'active' => 1,
//        ));
    }
}
