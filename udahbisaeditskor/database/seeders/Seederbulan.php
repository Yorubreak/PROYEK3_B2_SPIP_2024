<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class Seederbulan extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      DB::table('bulan')->insert([
        'bulan' => "Januari",
        'tahun_id' => 1
      ]);
      DB::table('bulan')->insert([
        'bulan' => "Februari",
        'tahun_id' => 1
      ]);
      DB::table('bulan')->insert([
        'bulan' => "Maret",
        'tahun_id' => 1
      ]);
      DB::table('bulan')->insert([
        'bulan' => "April",
        'tahun_id' => 1
      ]);
      DB::table('bulan')->insert([
        'bulan' => "Mei",
        'tahun_id' => 1
      ]);
      DB::table('bulan')->insert([
        'bulan' => "Juni",
        'tahun_id' => 1
      ]);
      DB::table('bulan')->insert([
        'bulan' => "Juli",
        'tahun_id' => 1
      ]);
      DB::table('bulan')->insert([
        'bulan' => "Agustus",
        'tahun_id' => 1
      ]);
      DB::table('bulan')->insert([
        'bulan' => "September",
        'tahun_id' => 1
      ]);
      DB::table('bulan')->insert([
        'bulan' => "Oktober",
        'tahun_id' => 1
      ]);
      DB::table('bulan')->insert([
        'bulan' => "November",
        'tahun_id' => 1
      ]);
      DB::table('bulan')->insert([
        'bulan' => "Desember",
        'tahun_id' => 1
      ]);


    }
}
