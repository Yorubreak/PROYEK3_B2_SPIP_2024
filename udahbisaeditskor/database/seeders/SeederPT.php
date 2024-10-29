<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class SeederPT extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('penetapan_tujuan')->insert([
          'unsur' => 'Pace Ilham Muhil',
          'bulan_id' => 5
        ]);
    }
}

//Nalen Ganteng
//Nalen babi bangsat
