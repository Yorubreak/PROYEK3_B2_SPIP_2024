<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class SeederSPIP extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      DB::table('pencapaian_tujuan')->insert([
        'unsur' => 'Capaian Outcome'
      ]);
    }
}
