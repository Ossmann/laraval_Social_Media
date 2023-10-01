<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() { 
        DB::table('users')->insert([
        'name' => "Jakob",
        'email' => 'Jakob@email.com', 'password' => bcrypt('123456'),
        ]);
        DB::table('users')->insert([
        'name' => "Fred",
        'email' => 'Fred@gmail.com', 'password' => bcrypt('123456'),
        ]); }
}
