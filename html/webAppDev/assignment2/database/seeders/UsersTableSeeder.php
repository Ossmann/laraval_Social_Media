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
            'name' => 'Atlassian',
            'gpa' => null,
            'type' => 'partner',
            'student_project_id' => null,
            'email' => 'not@atlassian.com',
            'password' => bcrypt('123456'),
            'status' => null,
            'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('users')->insert([
            'name' => 'WestPac',
            'gpa' => null,
            'type' => 'partner',
            'student_project_id' => null,
            'email' => 'office@westpacnot.com',
            'password' => bcrypt('123456'),
            'status' => 'approved',
            'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('users')->insert([
            'name' => 'Jakob Ossmann',
            'gpa' => 7,
            'type' => 'student',
            'student_project_id' => null,
            'email' => 'Jakob@email.com',
            'password' => bcrypt('123456'),
            'status' => null,
            'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('users')->insert([
            'name' => 'Gary',
            'gpa' => null,
            'type' => 'teacher',
            'student_project_id' => null,
            'email' => 'gary@email.com',
            'password' => bcrypt('123456'),
            'status' => null,
            'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
        ]);
    }
}
