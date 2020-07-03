<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Mae Ann',
            'email' => 'maeann@gmail.com',
            'username' => 'Bluish',
            'address' => 'Naga City',
            'type' => 'service',
            'phone' => '09111111111',
            'avatar'=> 'profile.png',
            'password' => bcrypt('11111111'),
        ]);
        DB::table('users')->insert([
            'name' => 'Monet',
            'email' => 'monet@gmail.com',
            'username' => 'Mamissi',
            'address' => 'Naga City',
            'type' => 'service',
            'phone' => '09222222222',
            'avatar'=> 'profile.png',
            'password' => bcrypt('11111111'),
        ]);
        DB::table('users')->insert([
            'name' => 'Marjorie',
            'email' => 'marjorie@gmail.com',
            'username' => 'Marjies',
            'address' => 'Naga City',
            'type' => 'service',
            'phone' => '09333333333',
            'avatar'=> 'profile.png',
            'password' => bcrypt('11111111'),
        ]);
        DB::table('users')->insert([
            'name' => 'Smith',
            'email' => 'smith@gmail.com',
            'username' => 'Smithies',
            'address' => 'Naga City',
            'type' => 'service',
            'phone' => '09444444444',
            'avatar'=> 'profile.png',
            'password' => bcrypt('11111111'),
        ]);
        DB::table('users')->insert([
            'name' => 'Messi',
            'email' => 'messi@gmail.com',
            'username' => 'Messhies',
            'address' => 'Naga City',
            'type' => 'service',
            'phone' => '09555555555',
            'avatar'=> 'profile.png',
            'password' => bcrypt('11111111'),
        ]);
        DB::table('users')->insert([
            'name' => 'Ronald',
            'email' => 'ron@gmail.com',
            'username' => 'Ronnies',
            'address' => 'Naga City',
            'type' => 'service',
            'phone' => '09666666666',
            'avatar'=> 'profile.png',
            'password' => bcrypt('11111111'),
        ]);
        DB::table('users')->insert([
            'name' => 'Bale',
            'email' => 'bale@gmail.com',
            'username' => 'Balies',
            'address' => 'Naga City',
            'type' => 'service',
            'phone' => '09777777777',
            'avatar'=> 'profile.png',
            'password' => bcrypt('11111111'),
        ]);
    }
}
