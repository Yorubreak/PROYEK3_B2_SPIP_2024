<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class SeederSPIP extends Seeder
{
    public function run(): void
    {
      DB::table('pencapaian_tujuan')->insert([
        'unsur' => 'Capaian Outcome'
      ]);

      DB::table('pencapaian_tujuan')->insert([
        'unsur' => 'Capaian Output'
      ]);

      DB::table('pencapaian_tujuan')->insert([
        'unsur' => 'Opini LK'
      ]);

      DB::table('pencapaian_tujuan')->insert([
        'unsur' => 'Keamanan Administrasi'
      ]);

      DB::table('pencapaian_tujuan')->insert([
        'unsur' => 'Keamanan Fisik'
      ]);

      DB::table('pencapaian_tujuan')->insert([
        'unsur' => 'Keamanan Hukum'
      ]);

      DB::table('pencapaian_tujuan')->insert([
        'unsur' => 'Temuan Ketaatan - BPK'
      ]);
    }
}
