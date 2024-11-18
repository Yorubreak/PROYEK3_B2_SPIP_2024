<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Periode;

class SeederPeriode extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Contoh data seeder untuk tahun 2023 dari Januari hingga Desember
        $periodes = [
            ['tahun' => '2023', 'bulan' => 'Januari', 'no_bln' => 1],
            ['tahun' => '2023', 'bulan' => 'Februari', 'no_bln' =>2],
            ['tahun' => '2023', 'bulan' => 'Maret', 'no_bln' => 3],
            ['tahun' => '2023', 'bulan' => 'April', 'no_bln' => 4],
            ['tahun' => '2023', 'bulan' => 'Mei', 'no_bln' => 5],
            ['tahun' => '2023', 'bulan' => 'Juni', 'no_bln' => 6],
            ['tahun' => '2023', 'bulan' => 'Juli', 'no_bln' => 7],
            ['tahun' => '2023', 'bulan' => 'Agustus', 'no_bln' => 8],
            ['tahun' => '2023', 'bulan' => 'September', 'no_bln' => 9],
            ['tahun' => '2023', 'bulan' => 'Oktober', 'no_bln' => 10],
            ['tahun' => '2023', 'bulan' => 'November', 'no_bln' => 11],
            ['tahun' => '2023', 'bulan' => 'Desember', 'no_bln' => 12],
        ];

        foreach ($periodes as $data) {
            Periode::create($data);
        }
    }
}
