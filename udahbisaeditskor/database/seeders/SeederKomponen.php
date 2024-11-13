<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Komponen;

class SeederKomponen extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Contoh data seeder untuk tabel komponen
        $komponens = [
          //Elemen
            [
                'nama_komponen' => 'Penetapan Tujuan',
                'tahun' => '2023',
                'bulan' => 'Januari',
                'kom_id_komponen' => null,
                'tipe_komponen' => 'Elemen',
                'id_org' => 1,
            ],
            [
                'nama_komponen' => 'Struktur dan Proses',
                'tahun' => '2023',
                'bulan' => 'Januari',
                'kom_id_komponen' => null,
                'tipe_komponen' => 'Elemen',
                'id_org' => 1,
            ],
            [
                'nama_komponen' => 'Pencpaian Tujuan SPIP',
                'tahun' => '2023',
                'bulan' => 'Januari',
                'kom_id_komponen' => null,
                'tipe_komponen' => 'Elemen',
                'id_org' => 1,
            ],

            //Unsur Penetapan Tujuan
            [
                'nama_komponen' => 'Kualitas Sasaran Strategis',
                'tahun' => '2023',
                'bulan' => 'Januari',
                'kom_id_komponen' => 1, // Merujuk ke ID Penetapan Tujuan
                'tipe_komponen' => 'Unsur',
                'id_org' => 1,
            ],
            [
                'nama_komponen' => 'Kualitas Strategi Pencapaian Sasaran Strategis',
                'tahun' => '2023',
                'bulan' => 'Januari',
                'kom_id_komponen' => 1, // Merujuk ke ID Kualitas Sasaran Strategis
                'tipe_komponen' => 'Unsur',
                'id_org' => 1,
            ],

            //Unsur Struktur dan Proses
            [
                'nama_komponen' => 'Lingkungan Pengendalian',
                'tahun' => '2023',
                'bulan' => 'Januari',
                'kom_id_komponen' => 2, // Merujuk ke ID Penetapan Tujuan
                'tipe_komponen' => 'Unsur',
                'id_org' => 1,
            ],
            [
                'nama_komponen' => 'Penliaian Resiko',
                'tahun' => '2023',
                'bulan' => 'Januari',
                'kom_id_komponen' => 3, // Merujuk ke ID Kualitas Sasaran Strategis
                'tipe_komponen' => 'Unsur',
                'id_org' => 1,
            ],
            [
                'nama_komponen' => 'Kegiatan Pengendalian',
                'tahun' => '2023',
                'bulan' => 'Januari',
                'kom_id_komponen' => 2, // Merujuk ke ID Penetapan Tujuan
                'tipe_komponen' => 'Unsur',
                'id_org' => 1,
          ],
          [
                'nama_komponen' => 'Informasi dan Komunikasi',
                'tahun' => '2023',
                'bulan' => 'Januari',
                'kom_id_komponen' => 3, // Merujuk ke ID Kualitas Sasaran Strategis
                'tipe_komponen' => 'Unsur',
                'id_org' => 1,
          ],
          [
              'nama_komponen' => 'Pemantauan',
              'tahun' => '2023',
              'bulan' => 'Januari',
              'kom_id_komponen' => 2, // Merujuk ke ID Penetapan Tujuan
              'tipe_komponen' => 'Unsur',
              'id_org' => 1,
          ],

        //   //SubUnsur Struktur dan Proses
        //   [
        //     'nama_komponen' => 'Penegakan Integritas dan Nilai Etika',
        //     'tahun' => '2023',
        //     'bulan' => 'Januari',
        //     'kom_id_komponen' => , // Merujuk ke ID Penetapan Tujuan
        //     'tipe_komponen' => 'Unsur',
        //     'id_org' => 1,
        // ],
        // [
        //     'nama_komponen' => 'Penliaian Resiko',
        //     'tahun' => '2023',
        //     'bulan' => 'Januari',
        //     'kom_id_komponen' => 3, // Merujuk ke ID Kualitas Sasaran Strategis
        //     'tipe_komponen' => 'Unsur',
        //     'id_org' => 1,
        // ],
        ];

        foreach ($komponens as $data) {
            Komponen::create($data);
        }
    }
}
