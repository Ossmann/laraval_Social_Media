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
            'partner_id' => '1',
            'email' => 'contact@WestPac.com',
            'description' => 'Developer an algorithm that detects banking fraud.',
            'students_required' => '20',
            'year' => '2023',
            'trimester' => '3',
            'image' => 'project_images/default.jpg',
            // 'pdf' => 'project_pdfs/default.pdf',
            'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
        ]);

        DB::table('projects')->insert([
            'title' => 'Customer Bonus App',
            'partner_id' => '1',
            'email' => 'contact@WestPac.com',
            'description' => 'Developer a mobile app to collect bonus points.',
            'students_required' => '10',
            'year' => '2024',
            'trimester' => '1',
            'image' => 'project_images/default.jpg',
            // 'pdf' => 'project_pdfs/default.pdf',
            'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
        ]);
    }
}