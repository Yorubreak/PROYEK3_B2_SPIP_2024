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
          'unsur' => 'Kualitas Strategi Pencapaian Sasaran Strategis'
        ]);
    }
}

//Nalen Ganteng
//Nalen babi bangsat
