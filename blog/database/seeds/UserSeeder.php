<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'name 1',
                'membership' => 1,
                'first_name' => 'first name 1',
                'last_name' => 'last name 1',
                'email' => 'email1@gmail.com',
                'password' => Hash::make('12345678'),
                'birth_day' => now(),
                'address' => 'address 1',
                'active' => 1,
                'phone_number' => '0987654321',
                'gender' => 0,
                'url_avatar' => 'images/faces/face1.jpg',
            ],
            [
                'name' => 'name 2',
                'membership' => 1,
                'first_name' => 'first name 2',
                'last_name' => 'last name 2',
                'email' => 'email2@gmail.com',
                'password' => Hash::make('12345678'),
                'birth_day' => now(),
                'address' => 'address 2',
                'active' => 1,
                'phone_number' => '0987654321',
                'gender' => 0,
                'url_avatar' => 'images/faces/face2.jpg',
            ],
            [
                'name' => 'name 3',
                'membership' => 1,
                'first_name' => 'first name 3',
                'last_name' => 'last name 3',
                'email' => 'email3@gmail.com',
                'password' => Hash::make('12345678'),
                'birth_day' => now(),
                'address' => 'address 3',
                'active' => 1,
                'phone_number' => '0987654321',
                'gender' => 0,
                'url_avatar' => 'images/faces/face3.jpg',
            ]
        ]);
    }
}
