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
            ['tahun' => '2023', 'bulan' => 'Januari'],
            ['tahun' => '2023', 'bulan' => 'Februari'],
            ['tahun' => '2023', 'bulan' => 'Maret'],
            ['tahun' => '2023', 'bulan' => 'April'],
            ['tahun' => '2023', 'bulan' => 'Mei'],
            ['tahun' => '2023', 'bulan' => 'Juni'],
            ['tahun' => '2023', 'bulan' => 'Juli'],
            ['tahun' => '2023', 'bulan' => 'Agustus'],
            ['tahun' => '2023', 'bulan' => 'September'],
            ['tahun' => '2023', 'bulan' => 'Oktober'],
            ['tahun' => '2023', 'bulan' => 'November'],
            ['tahun' => '2023', 'bulan' => 'Desember'],
        ];

        foreach ($periodes as $data) {
            Periode::create($data);
        }
    }
}
