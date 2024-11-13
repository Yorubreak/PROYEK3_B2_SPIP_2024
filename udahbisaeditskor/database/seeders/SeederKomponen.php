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
                'has_child' => true,
            ],
            [
                'nama_komponen' => 'Struktur dan Proses',
                'tahun' => '2023',
                'bulan' => 'Januari',
                'kom_id_komponen' => null,
                'tipe_komponen' => 'Elemen',
                'id_org' => 1,
                'has_child' => true,
            ],
            [
                'nama_komponen' => 'Pencpaian Tujuan SPIP',
                'tahun' => '2023',
                'bulan' => 'Januari',
                'kom_id_komponen' => null,
                'tipe_komponen' => 'Elemen',
                'id_org' => 1,
                'has_child' => true,
            ],

            //Unsur Penetapan Tujuan
            [
                'nama_komponen' => 'Kualitas Sasaran Strategis',
                'tahun' => '2023',
                'bulan' => 'Januari',
                'kom_id_komponen' => 1, // Merujuk ke ID Penetapan Tujuan
                'tipe_komponen' => 'Unsur',
                'id_org' => 1,
                'has_child' => false,
            ],
            [
                'nama_komponen' => 'Kualitas Strategi Pencapaian Sasaran Strategis',
                'tahun' => '2023',
                'bulan' => 'Januari',
                'kom_id_komponen' => 1, // Merujuk ke ID Kualitas Sasaran Strategis
                'tipe_komponen' => 'Unsur',
                'id_org' => 1,
                'has_child' => false,
            ],

            //Unsur Struktur dan Proses
            [
                'nama_komponen' => 'Lingkungan Pengendalian',
                'tahun' => '2023',
                'bulan' => 'Januari',
                'kom_id_komponen' => 2, // Merujuk ke ID Penetapan Tujuan
                'tipe_komponen' => 'Unsur',
                'id_org' => 1,
                'has_child' => true,
            ],
            [
                'nama_komponen' => 'Penliaian Resiko',
                'tahun' => '2023',
                'bulan' => 'Januari',
                'kom_id_komponen' => 2, // Merujuk ke ID Kualitas Sasaran Strategis
                'tipe_komponen' => 'Unsur',
                'id_org' => 1,
                'has_child' => true,
            ],
            [
                'nama_komponen' => 'Kegiatan Pengendalian',
                'tahun' => '2023',
                'bulan' => 'Januari',
                'kom_id_komponen' => 2, // Merujuk ke ID Penetapan Tujuan
                'tipe_komponen' => 'Unsur',
                'id_org' => 1,
                'has_child' => true,
          ],
          [
                'nama_komponen' => 'Informasi dan Komunikasi',
                'tahun' => '2023',
                'bulan' => 'Januari',
                'kom_id_komponen' => 2, // Merujuk ke ID Kualitas Sasaran Strategis
                'tipe_komponen' => 'Unsur',
                'id_org' => 1,
                'has_child' => true,
          ],
          [
              'nama_komponen' => 'Pemantauan',
              'tahun' => '2023',
              'bulan' => 'Januari',
              'kom_id_komponen' => 2, // Merujuk ke ID Penetapan Tujuan
              'tipe_komponen' => 'Unsur',
              'id_org' => 1,
              'has_child' => true,
          ],

          //Unsur Pencapaian Tujuan SPIP
          [
              'nama_komponen' => 'Efektivitas dan Efisiensi',
              'tahun' => '2023',
              'bulan' => 'Januari',
              'kom_id_komponen' => 3, // Merujuk ke ID Penetapan Tujuan
              'tipe_komponen' => 'Unsur',
              'id_org' => 1,
              'has_child' => true,
          ],
          [
              'nama_komponen' => 'Keandalan Laporan Keuangan',
              'tahun' => '2023',
              'bulan' => 'Januari',
              'kom_id_komponen' => 3, // Merujuk ke ID Kualitas Sasaran Strategis
              'tipe_komponen' => 'Unsur',
              'id_org' => 1,
              'has_child' => true,
          ],
          [
              'nama_komponen' => 'Pengamanan atas Aset',
              'tahun' => '2023',
              'bulan' => 'Januari',
              'kom_id_komponen' => 3, // Merujuk ke ID Penetapan Tujuan
              'tipe_komponen' => 'Unsur',
              'id_org' => 1,
              'has_child' => true,
          ],
          [
              'nama_komponen' => 'Ketaatan pada Peraturan',
              'tahun' => '2023',
              'bulan' => 'Januari',
              'kom_id_komponen' => 3, // Merujuk ke ID Kualitas Sasaran Strategis
              'tipe_komponen' => 'Unsur',
              'id_org' => 1,
              'has_child' => true,
          ],


        //   //SubUnsur Struktur dan Proses (Lingkungan Pengendalian)
          [
            'nama_komponen' => 'Penegakan Integritas dan Nilai Etika',
            'tahun' => '2023',
            'bulan' => 'Januari',
            'kom_id_komponen' => 6, // Merujuk ke ID Penetapan Tujuan
            'tipe_komponen' => 'Sub Unsur',
            'id_org' => 1,
            'has_child' => false,
         ],
         [
            'nama_komponen' => 'Komitmen terhadap Kompetensi',
            'tahun' => '2023',
            'bulan' => 'Januari',
            'kom_id_komponen' => 6, // Merujuk ke ID Kualitas Sasaran Strategis
            'tipe_komponen' => 'Sub Unsur',
            'id_org' => 1,
            'has_child' => false,
          ],
          [
            'nama_komponen' => 'Kepemimpinan yang Kondusif',
            'tahun' => '2023',
            'bulan' => 'Januari',
            'kom_id_komponen' => 6, // Merujuk ke ID Penetapan Tujuan
            'tipe_komponen' => 'Sub Unsur',
            'id_org' => 1,
            'has_child' => false,
         ],
         [
            'nama_komponen' => 'Pembentukan Struktur Organisasi yang Sesuai dengan Kebutuhan',
            'tahun' => '2023',
            'bulan' => 'Januari',
            'kom_id_komponen' => 6, // Merujuk ke ID Kualitas Sasaran Strategis
            'tipe_komponen' => 'Sub Unsur',
            'id_org' => 1,
            'has_child' => false,
          ],
          [
            'nama_komponen' => 'Pendelegasian Wewenang dan Tanggung Jawab yang Tepat',
            'tahun' => '2023',
            'bulan' => 'Januari',
            'kom_id_komponen' => 6, // Merujuk ke ID Penetapan Tujuan
            'tipe_komponen' => 'Sub Unsur',
            'id_org' => 1,
            'has_child' => false,
          ],
         [
            'nama_komponen' => 'Penyusunan dan Penerapan Kebijakan yang Sehat tentang Pembinaan SDM',
            'tahun' => '2023',
            'bulan' => 'Januari',
            'kom_id_komponen' => 6, // Merujuk ke ID Kualitas Sasaran Strategis
            'tipe_komponen' => 'Sub Unsur',
            'id_org' => 1,
          ],
          [
            'nama_komponen' => 'Perwujudan Peran APIP yang Efektif',
            'tahun' => '2023',
            'bulan' => 'Januari',
            'kom_id_komponen' => 6, // Merujuk ke ID Penetapan Tujuan
            'tipe_komponen' => 'Sub Unsur',
            'id_org' => 1,
            'has_child' => false,
          ],
         [
            'nama_komponen' => 'Hubungan Kerja yang Baik dengan Instansi Pemerintah Terkait',
            'tahun' => '2023',
            'bulan' => 'Januari',
            'kom_id_komponen' => 6, // Merujuk ke ID Kualitas Sasaran Strategis
            'tipe_komponen' => 'Sub Unsur',
            'id_org' => 1,
          ],

          //Sub Unsur Struktur dan proses (Penilaian Resiko)
          [
            'nama_komponen' => 'Identifikasi Risiko',
            'tahun' => '2023',
            'bulan' => 'Januari',
            'kom_id_komponen' => 7, // Merujuk ke ID Penetapan Tujuan
            'tipe_komponen' => 'Sub Unsur',
            'id_org' => 1,
            'has_child' => false,
          ],
         [
            'nama_komponen' => 'Analisis Risiko',
            'tahun' => '2023',
            'bulan' => 'Januari',
            'kom_id_komponen' => 7, // Merujuk ke ID Kualitas Sasaran Strategis
            'tipe_komponen' => 'Sub Unsur',
            'id_org' => 1,
          ],

          //Sub Unsur Struktur dan proses (Kegiatan Pengendalian)
          [
            'nama_komponen' => 'Reviu atas Kinerja Instansi Pemerintah',
            'tahun' => '2023',
            'bulan' => 'Januari',
            'kom_id_komponen' => 8, // Merujuk ke ID Penetapan Tujuan
            'tipe_komponen' => 'Sub Unsur',
            'id_org' => 1,
            'has_child' => false,
          ],
         [
            'nama_komponen' => 'Pembinaan Sumber Daya Manusia',
            'tahun' => '2023',
            'bulan' => 'Januari',
            'kom_id_komponen' => 8, // Merujuk ke ID Kualitas Sasaran Strategis
            'tipe_komponen' => 'Sub Unsur',
            'id_org' => 1,
          ],
          [
            'nama_komponen' => 'Pengendalian atas Pengelolaan Sistem Informasi',
            'tahun' => '2023',
            'bulan' => 'Januari',
            'kom_id_komponen' => 8, // Merujuk ke ID Penetapan Tujuan
            'tipe_komponen' => 'Sub Unsur',
            'id_org' => 1,
            'has_child' => false,
          ],
         [
            'nama_komponen' => 'Pengendalian Fisik atas Aset',
            'tahun' => '2023',
            'bulan' => 'Januari',
            'kom_id_komponen' => 8, // Merujuk ke ID Kualitas Sasaran Strategis
            'tipe_komponen' => 'Sub Unsur',
            'id_org' => 1,
          ],
          [
            'nama_komponen' => 'Penetapan dan Reviu atas Indikator dan Ukuran Kinerja',
            'tahun' => '2023',
            'bulan' => 'Januari',
            'kom_id_komponen' => 8, // Merujuk ke ID Penetapan Tujuan
            'tipe_komponen' => 'Sub Unsur',
            'id_org' => 1,
            'has_child' => false,
          ],
         [
            'nama_komponen' => 'Pemisahan Fungsi',
            'tahun' => '2023',
            'bulan' => 'Januari',
            'kom_id_komponen' => 8, // Merujuk ke ID Kualitas Sasaran Strategis
            'tipe_komponen' => 'Sub Unsur',
            'id_org' => 1,
          ],
          [
            'nama_komponen' => 'Otorisasi atas Transaksi dan Kejadian yang Penting',
            'tahun' => '2023',
            'bulan' => 'Januari',
            'kom_id_komponen' => 8, // Merujuk ke ID Penetapan Tujuan
            'tipe_komponen' => 'Sub Unsur',
            'id_org' => 1,
            'has_child' => false,
          ],
         [
            'nama_komponen' => 'Pencatatan yang Akurat dan Tepat Waktu atas Transaksi dan Kejadian',
            'tahun' => '2023',
            'bulan' => 'Januari',
            'kom_id_komponen' => 8, // Merujuk ke ID Kualitas Sasaran Strategis
            'tipe_komponen' => 'Sub Unsur',
            'id_org' => 1,
          ],
          [
            'nama_komponen' => 'Pembatasan Akses atas Sumber Daya dan Pencatatannya',
            'tahun' => '2023',
            'bulan' => 'Januari',
            'kom_id_komponen' => 8, // Merujuk ke ID Kualitas Sasaran Strategis
            'tipe_komponen' => 'Sub Unsur',
            'id_org' => 1,
          ],
          [
            'nama_komponen' => 'Akuntabilitas terhadap Sumber Daya dan Pencatatannya',
            'tahun' => '2023',
            'bulan' => 'Januari',
            'kom_id_komponen' => 8, // Merujuk ke ID Penetapan Tujuan
            'tipe_komponen' => 'Sub Unsur',
            'id_org' => 1,
            'has_child' => false,
          ],
         [
            'nama_komponen' => 'Dokumentasi yang Baik atas SPI serta Transaksi dan Kejadian Penting',
            'tahun' => '2023',
            'bulan' => 'Januari',
            'kom_id_komponen' => 8, // Merujuk ke ID Kualitas Sasaran Strategis
            'tipe_komponen' => 'Sub Unsur',
            'id_org' => 1,
          ],


          //Sub Unsur Struktur Proses (Informasi dan Komunikasi)
          [
            'nama_komponen' => 'Informasi yang Relevan',
            'tahun' => '2023',
            'bulan' => 'Januari',
            'kom_id_komponen' => 9, // Merujuk ke ID Penetapan Tujuan
            'tipe_komponen' => 'Sub Unsur',
            'id_org' => 1,
            'has_child' => false,
          ],
         [
            'nama_komponen' => 'Komunikasi yang Efektif',
            'tahun' => '2023',
            'bulan' => 'Januari',
            'kom_id_komponen' => 9, // Merujuk ke ID Kualitas Sasaran Strategis
            'tipe_komponen' => 'Sub Unsur',
            'id_org' => 1,
          ],

          //Sub Unsur Struktur Proses (Pemantauan)
          [
            'nama_komponen' => 'Pemantauan Berkelanjutan',
            'tahun' => '2023',
            'bulan' => 'Januari',
            'kom_id_komponen' => 10, // Merujuk ke ID Penetapan Tujuan
            'tipe_komponen' => 'Sub Unsur',
            'id_org' => 1,
            'has_child' => false,
          ],
         [
            'nama_komponen' => 'Evaluasi Terpisah',
            'tahun' => '2023',
            'bulan' => 'Januari',
            'kom_id_komponen' => 10, // Merujuk ke ID Kualitas Sasaran Strategis
            'tipe_komponen' => 'Sub Unsur',
            'id_org' => 1,
          ],


          //Sub Unsur Pencapaian Tujuan SPIP (Efektivitas dan Efisiiensi)
          [
            'nama_komponen' => 'Capaian Outcome',
            'tahun' => '2023',
            'bulan' => 'Januari',
            'kom_id_komponen' => 11, // Merujuk ke ID Penetapan Tujuan
            'tipe_komponen' => 'Sub Unsur',
            'id_org' => 1,
            'has_child' => false,
          ],
         [
            'nama_komponen' => 'Capaian Output',
            'tahun' => '2023',
            'bulan' => 'Januari',
            'kom_id_komponen' => 11, // Merujuk ke ID Kualitas Sasaran Strategis
            'tipe_komponen' => 'Sub Unsur',
            'id_org' => 1,
          ],

          //Sub Unsur Pencapaian Tujuan SPIP (Keandalan Laporan Keuangan)
          [
            'nama_komponen' => 'Opini LK',
            'tahun' => '2023',
            'bulan' => 'Januari',
            'kom_id_komponen' => 12, // Merujuk ke ID Penetapan Tujuan
            'tipe_komponen' => 'Sub Unsur',
            'id_org' => 1,
            'has_child' => false,
          ],


         //Sub Unsur Pencapaian Tujuan SPIP (Pengamanan atas Aset)
         [
            'nama_komponen' => 'Keamanan Administrasi',
            'tahun' => '2023',
            'bulan' => 'Januari',
            'kom_id_komponen' => 13, // Merujuk ke ID Kualitas Sasaran Strategis
            'tipe_komponen' => 'Sub Unsur',
            'id_org' => 1,
            'has_child' => false,
          ],
          [
            'nama_komponen' => 'Keamanan Fisik',
            'tahun' => '2023',
            'bulan' => 'Januari',
            'kom_id_komponen' => 13, // Merujuk ke ID Kualitas Sasaran Strategis
            'tipe_komponen' => 'Sub Unsur',
            'id_org' => 1,
            'has_child' => false,
          ],
          [
            'nama_komponen' => 'Keamanan Hukum',
            'tahun' => '2023',
            'bulan' => 'Januari',
            'kom_id_komponen' => 13, // Merujuk ke ID Kualitas Sasaran Strategis
            'tipe_komponen' => 'Sub Unsur',
            'id_org' => 1,
            'has_child' => false,
          ],

          //Sub Unsur Pencapaian Tujuan SPIP (Ketaatan pada Peraturan)
          [
            'nama_komponen' => 'Temuan Ketaatan - BPK',
            'tahun' => '2023',
            'bulan' => 'Januari',
            'kom_id_komponen' => 14, // Merujuk ke ID Kualitas Sasaran Strategis
            'tipe_komponen' => 'Sub Unsur',
            'id_org' => 1,
            'has_child' => false,
          ],

        ];

        foreach ($komponens as $data) {
            Komponen::create($data);
        }
    }
}
