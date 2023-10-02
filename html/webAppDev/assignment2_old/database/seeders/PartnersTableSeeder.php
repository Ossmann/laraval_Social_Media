<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class PartnersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('partners')->insert([
                'inp_name' => 'WestPac',
                'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
            ]);
            DB::table('partners')->insert([
                'inp_name' => 'Atlassian',
                'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
            ]);
    }
}
