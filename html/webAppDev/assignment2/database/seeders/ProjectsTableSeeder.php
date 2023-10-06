<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('projects')->insert([
            'title' => 'Banking Fraud Detection',
            'description' => 'Developer an algorithm that detects banking fraud.',
            'students_required' => '20',
            'year' => '2023',
            'trimester' => '3',
            'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
        ]);

        DB::table('projects')->insert([
            'title' => 'Customer Bonus App',
            'description' => 'Developer a mobile app to collect bonus points.',
            'students_required' => '10',
            'year' => '2024',
            'trimester' => '1',
            'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
        ]);
    }
}