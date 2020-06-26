<?php

use Illuminate\Database\Seeder;
use App\User;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create(array(
            'first_name' => 'Admin',
            'email' => 'root@gmail.com',
            'password' => Hash::make("12345678"),
            'active' => 1
        ));
    }
}
