<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Periode;
use Illuminate\Support\Facades\Session;

class SeederPeriode extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Contoh data seeder untuk tahun $tahun dari Januari hingga Desember

        $tahun = Session::get('tahun'); // Default tahun to 2024 if not set

        $periodes = [
            ['tahun' => $tahun + 1, 'bulan' => 'Januari', 'no_bln' => 1],
            ['tahun' => $tahun + 1, 'bulan' => 'Februari', 'no_bln' =>2],
            ['tahun' => $tahun + 1, 'bulan' => 'Maret', 'no_bln' => 3],
            ['tahun' => $tahun + 1, 'bulan' => 'April', 'no_bln' => 4],
            ['tahun' => $tahun + 1, 'bulan' => 'Mei', 'no_bln' => 5],
            ['tahun' => $tahun + 1, 'bulan' => 'Juni', 'no_bln' => 6],
            ['tahun' => $tahun + 1, 'bulan' => 'Juli', 'no_bln' => 7],
            ['tahun' => $tahun + 1, 'bulan' => 'Agustus', 'no_bln' => 8],
            ['tahun' => $tahun + 1, 'bulan' => 'September', 'no_bln' => 9],
            ['tahun' => $tahun + 1, 'bulan' => 'Oktober', 'no_bln' => 10],
            ['tahun' => $tahun + 1, 'bulan' => 'November', 'no_bln' => 11],
            ['tahun' => $tahun + 1, 'bulan' => 'Desember', 'no_bln' => 12],
        ];

        foreach ($periodes as $data) {
            Periode::create($data);
        }
    }
}
