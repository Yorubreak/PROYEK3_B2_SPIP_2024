<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class SeederSP extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      DB::table('struktur_proses')->insert([
        'unsur' => 'Komitmen terhadap Kompetensi'
      ]);
    }
}
