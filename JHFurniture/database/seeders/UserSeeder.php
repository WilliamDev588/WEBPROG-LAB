<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
// use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('users')->insert([
            'fullname' => "Admin Admin",
            'email' => "admin@gmail.com",
            'password' => Hash::make("Admin"),
            'address' => "Rumah Admin",
            'gender' => "Male",
        ]);
    }
}
