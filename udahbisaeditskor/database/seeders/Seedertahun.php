<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class Seedertahun extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      DB::table('tahun')->insert([
        'tahun' => "2023"
      ]);
      DB::table('tahun')->insert([
        'tahun' => "2024"
      ]);
      DB::table('tahun')->insert([
        'tahun' => "2025"
      ]);
      DB::table('tahun')->insert([
        'tahun' => "2026"
      ]);
      DB::table('tahun')->insert([
        'tahun' => "2027"
      ]);
      DB::table('tahun')->insert([
        'tahun' => "2028"
      ]);
      DB::table('tahun')->insert([
        'tahun' => "2029"
      ]);
      DB::table('tahun')->insert([
        'tahun' => "2030"
      ]);

    }
}
