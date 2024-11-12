<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class SeederPT extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $bulanId = Session::get('bulanId');

        DB::table('penetapan_tujuan')->insert([
          'unsur' =>  'Kualitas Sasaran Strategis',
          'bulan_id' => $bulanId
        ]);
    }
}


