<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Models\Komponen;

class SeederKomponen extends Seeder
{
    public function run(): void
    {
        $bulan = Session::get('bulan'); // Default bulan to 1 if not set
        $tahun = Session::get('tahun'); // Default tahun to 2024 if not set

        // Parent components
        $parentComponents = [
            [
                'nama_komponen' => 'Penetapan Tujuan',
                'tahun' => $tahun,
                'bulan' => $bulan,
                'kom_id_komponen' => null,
                'tipe_komponen' => 'Elemen',
                'id_org' => 1,
                'has_child' => true,
            ],
            [
                'nama_komponen' => 'Struktur dan Proses',
                'tahun' => $tahun,
                'bulan' => $bulan,
                'kom_id_komponen' => null,
                'tipe_komponen' => 'Elemen',
                'id_org' => 1,
                'has_child' => true,
            ],
            [
                'nama_komponen' => 'Pencapaian Tujuan SPIP',
                'tahun' => $tahun,
                'bulan' => $bulan,
                'kom_id_komponen' => null,
                'tipe_komponen' => 'Elemen',
                'id_org' => 1,
                'has_child' => true,
            ],
        ];

        $insertedParents = [];
        foreach ($parentComponents as $component) {
            $inserted = Komponen::create($component);
            $insertedParents[] = $inserted->id_komponen;
        }

        // Child components (adjust kom_id_komponen dynamically)
        $unsurComponents = [
            [
                'nama_komponen' => 'Kualitas Sasaran Strategis',
                'tahun' => $tahun,
                'bulan' => $bulan,
                'kom_id_komponen' => $insertedParents[0], // Referring to "Penetapan Tujuan"
                'tipe_komponen' => 'Unsur',
                'id_org' => 1,
                'has_child' => false,
            ],
            [
                'nama_komponen' => 'Kualitas Strategi Pencapaian Sasaran Strategis',
                'tahun' => $tahun,
                'bulan' => $bulan,
                'kom_id_komponen' => $insertedParents[0], // Referring to "Penetapan Tujuan"
                'tipe_komponen' => 'Unsur',
                'id_org' => 1,
                'has_child' => false,
            ],
            //Unsur Struktur dan Proses
            [
                'nama_komponen' => 'Lingkungan Pengendalian',
                'tahun' => $tahun,
                'bulan' => $bulan,
                'kom_id_komponen' => $insertedParents[1], // Merujuk ke ID Penetapan Tujuan
                'tipe_komponen' => 'Unsur',
                'id_org' => 1,
                'has_child' => true,
            ],
            [
                'nama_komponen' => 'Penliaian Resiko',
                'tahun' => $tahun,
                'bulan' => $bulan,
                'kom_id_komponen' => $insertedParents[1], // Merujuk ke ID Kualitas Sasaran Strategis
                'tipe_komponen' => 'Unsur',
                'id_org' => 1,
                'has_child' => true,
            ],
            [
                'nama_komponen' => 'Kegiatan Pengendalian',
                'tahun' => $tahun,
                'bulan' => $bulan,
                'kom_id_komponen' => $insertedParents[1], // Merujuk ke ID Penetapan Tujuan
                'tipe_komponen' => 'Unsur',
                'id_org' => 1,
                'has_child' => true,
          ],
          [
                'nama_komponen' => 'Informasi dan Komunikasi',
                'tahun' => $tahun,
                'bulan' => $bulan,
                'kom_id_komponen' => $insertedParents[1], // Merujuk ke ID Kualitas Sasaran Strategis
                'tipe_komponen' => 'Unsur',
                'id_org' => 1,
                'has_child' => true,
          ],
          [
              'nama_komponen' => 'Pemantauan',
              'tahun' => $tahun,
              'bulan' => $bulan,
              'kom_id_komponen' => $insertedParents[1], // Merujuk ke ID Penetapan Tujuan
              'tipe_komponen' => 'Unsur',
              'id_org' => 1,
              'has_child' => true,
          ],

          //Unsur Pencapaian Tujuan SPIP
          [
              'nama_komponen' => 'Efektivitas dan Efisiensi',
              'tahun' => $tahun,
              'bulan' => $bulan,
              'kom_id_komponen' => $insertedParents[2], // Merujuk ke ID Penetapan Tujuan
              'tipe_komponen' => 'Unsur',
              'id_org' => 1,
              'has_child' => true,
          ],
          [
              'nama_komponen' => 'Keandalan Laporan Keuangan',
              'tahun' => $tahun,
              'bulan' => $bulan,
              'kom_id_komponen' => $insertedParents[2], // Merujuk ke ID Kualitas Sasaran Strategis
              'tipe_komponen' => 'Unsur',
              'id_org' => 1,
              'has_child' => true,
          ],
          [
              'nama_komponen' => 'Pengamanan atas Aset',
              'tahun' => $tahun,
              'bulan' => $bulan,
              'kom_id_komponen' => $insertedParents[2], // Merujuk ke ID Penetapan Tujuan
              'tipe_komponen' => 'Unsur',
              'id_org' => 1,
              'has_child' => true,
          ],
          [
              'nama_komponen' => 'Ketaatan pada Peraturan',
              'tahun' => $tahun,
              'bulan' => $bulan,
              'kom_id_komponen' => $insertedParents[2], // Merujuk ke ID Kualitas Sasaran Strategis
              'tipe_komponen' => 'Unsur',
              'id_org' => 1,
              'has_child' => true,
          ],
        ];

        $insertedUnsur = [];
        foreach ($unsurComponents as $unscomponent) {
          $insUns = Komponen::create($unscomponent);
          $insertedUnsur[] = $insUns->id_komponen;
        }

      $subUnsurComponents = [

        //   //SubUnsur Struktur dan Proses (Lingkungan Pengendalian)
          [
            'nama_komponen' => 'Penegakan Integritas dan Nilai Etika',
            'tahun' => $tahun,
            'bulan' => $bulan,
            'kom_id_komponen' => $insertedUnsur[2], // Merujuk ke ID Penetapan Tujuan
            'tipe_komponen' => 'Sub Unsur',
            'id_org' => 1,
            'has_child' => false,
         ],
         [
            'nama_komponen' => 'Komitmen terhadap Kompetensi',
            'tahun' => $tahun,
            'bulan' => $bulan,
            'kom_id_komponen' => $insertedUnsur[2], // Merujuk ke ID Kualitas Sasaran Strategis
            'tipe_komponen' => 'Sub Unsur',
            'id_org' => 1,
            'has_child' => false,
          ],
          [
            'nama_komponen' => 'Kepemimpinan yang Kondusif',
            'tahun' => $tahun,
            'bulan' => $bulan,
            'kom_id_komponen' => $insertedUnsur[2], // Merujuk ke ID Penetapan Tujuan
            'tipe_komponen' => 'Sub Unsur',
            'id_org' => 1,
            'has_child' => false,
         ],
         [
            'nama_komponen' => 'Pembentukan Struktur Organisasi yang Sesuai dengan Kebutuhan',
            'tahun' => $tahun,
            'bulan' => $bulan,
            'kom_id_komponen' => $insertedUnsur[2], // Merujuk ke ID Kualitas Sasaran Strategis
            'tipe_komponen' => 'Sub Unsur',
            'id_org' => 1,
            'has_child' => false,
          ],
          [
            'nama_komponen' => 'Pendelegasian Wewenang dan Tanggung Jawab yang Tepat',
            'tahun' => $tahun,
            'bulan' => $bulan,
            'kom_id_komponen' => $insertedUnsur[2], // Merujuk ke ID Penetapan Tujuan
            'tipe_komponen' => 'Sub Unsur',
            'id_org' => 1,
            'has_child' => false,
          ],
         [
            'nama_komponen' => 'Penyusunan dan Penerapan Kebijakan yang Sehat tentang Pembinaan SDM',
            'tahun' => $tahun,
            'bulan' => $bulan,
            'kom_id_komponen' => $insertedUnsur[2], // Merujuk ke ID Kualitas Sasaran Strategis
            'tipe_komponen' => 'Sub Unsur',
            'id_org' => 1,
          ],
          [
            'nama_komponen' => 'Perwujudan Peran APIP yang Efektif',
            'tahun' => $tahun,
            'bulan' => $bulan,
            'kom_id_komponen' => $insertedUnsur[2], // Merujuk ke ID Penetapan Tujuan
            'tipe_komponen' => 'Sub Unsur',
            'id_org' => 1,
            'has_child' => false,
          ],
         [
            'nama_komponen' => 'Hubungan Kerja yang Baik dengan Instansi Pemerintah Terkait',
            'tahun' => $tahun,
            'bulan' => $bulan,
            'kom_id_komponen' => $insertedUnsur[2], // Merujuk ke ID Kualitas Sasaran Strategis
            'tipe_komponen' => 'Sub Unsur',
            'id_org' => 1,
          ],

          //Sub Unsur Struktur dan proses (Penilaian Resiko)
          [
            'nama_komponen' => 'Identifikasi Risiko',
            'tahun' => $tahun,
            'bulan' => $bulan,
            'kom_id_komponen' => $insertedUnsur[3], // Merujuk ke ID Penetapan Tujuan
            'tipe_komponen' => 'Sub Unsur',
            'id_org' => 1,
            'has_child' => false,
          ],
         [
            'nama_komponen' => 'Analisis Risiko',
            'tahun' => $tahun,
            'bulan' => $bulan,
            'kom_id_komponen' => $insertedUnsur[3], // Merujuk ke ID Kualitas Sasaran Strategis
            'tipe_komponen' => 'Sub Unsur',
            'id_org' => 1,
          ],

          //Sub Unsur Struktur dan proses (Kegiatan Pengendalian)
          [
            'nama_komponen' => 'Reviu atas Kinerja Instansi Pemerintah',
            'tahun' => $tahun,
            'bulan' => $bulan,
            'kom_id_komponen' => $insertedUnsur[4], // Merujuk ke ID Penetapan Tujuan
            'tipe_komponen' => 'Sub Unsur',
            'id_org' => 1,
            'has_child' => false,
          ],
         [
            'nama_komponen' => 'Pembinaan Sumber Daya Manusia',
            'tahun' => $tahun,
            'bulan' => $bulan,
            'kom_id_komponen' => $insertedUnsur[4], // Merujuk ke ID Kualitas Sasaran Strategis
            'tipe_komponen' => 'Sub Unsur',
            'id_org' => 1,
          ],
          [
            'nama_komponen' => 'Pengendalian atas Pengelolaan Sistem Informasi',
            'tahun' => $tahun,
            'bulan' => $bulan,
            'kom_id_komponen' => $insertedUnsur[4], // Merujuk ke ID Penetapan Tujuan
            'tipe_komponen' => 'Sub Unsur',
            'id_org' => 1,
            'has_child' => false,
          ],
         [
            'nama_komponen' => 'Pengendalian Fisik atas Aset',
            'tahun' => $tahun,
            'bulan' => $bulan,
            'kom_id_komponen' => $insertedUnsur[4], // Merujuk ke ID Kualitas Sasaran Strategis
            'tipe_komponen' => 'Sub Unsur',
            'id_org' => 1,
          ],
          [
            'nama_komponen' => 'Penetapan dan Reviu atas Indikator dan Ukuran Kinerja',
            'tahun' => $tahun,
            'bulan' => $bulan,
            'kom_id_komponen' => $insertedUnsur[4], // Merujuk ke ID Penetapan Tujuan
            'tipe_komponen' => 'Sub Unsur',
            'id_org' => 1,
            'has_child' => false,
          ],
         [
            'nama_komponen' => 'Pemisahan Fungsi',
            'tahun' => $tahun,
            'bulan' => $bulan,
            'kom_id_komponen' => $insertedUnsur[4], // Merujuk ke ID Kualitas Sasaran Strategis
            'tipe_komponen' => 'Sub Unsur',
            'id_org' => 1,
          ],
          [
            'nama_komponen' => 'Otorisasi atas Transaksi dan Kejadian yang Penting',
            'tahun' => $tahun,
            'bulan' => $bulan,
            'kom_id_komponen' => $insertedUnsur[4], // Merujuk ke ID Penetapan Tujuan
            'tipe_komponen' => 'Sub Unsur',
            'id_org' => 1,
            'has_child' => false,
          ],
         [
            'nama_komponen' => 'Pencatatan yang Akurat dan Tepat Waktu atas Transaksi dan Kejadian',
            'tahun' => $tahun,
            'bulan' => $bulan,
            'kom_id_komponen' => $insertedUnsur[4], // Merujuk ke ID Kualitas Sasaran Strategis
            'tipe_komponen' => 'Sub Unsur',
            'id_org' => 1,
          ],
          [
            'nama_komponen' => 'Pembatasan Akses atas Sumber Daya dan Pencatatannya',
            'tahun' => $tahun,
            'bulan' => $bulan,
            'kom_id_komponen' => $insertedUnsur[4], // Merujuk ke ID Kualitas Sasaran Strategis
            'tipe_komponen' => 'Sub Unsur',
            'id_org' => 1,
          ],
          [
            'nama_komponen' => 'Akuntabilitas terhadap Sumber Daya dan Pencatatannya',
            'tahun' => $tahun,
            'bulan' => $bulan,
            'kom_id_komponen' => $insertedUnsur[4], // Merujuk ke ID Penetapan Tujuan
            'tipe_komponen' => 'Sub Unsur',
            'id_org' => 1,
            'has_child' => false,
          ],
         [
            'nama_komponen' => 'Dokumentasi yang Baik atas SPI serta Transaksi dan Kejadian Penting',
            'tahun' => $tahun,
            'bulan' => $bulan,
            'kom_id_komponen' => $insertedUnsur[4], // Merujuk ke ID Kualitas Sasaran Strategis
            'tipe_komponen' => 'Sub Unsur',
            'id_org' => 1,
          ],


          //Sub Unsur Struktur Proses (Informasi dan Komunikasi)
          [
            'nama_komponen' => 'Informasi yang Relevan',
            'tahun' => $tahun,
            'bulan' => $bulan,
            'kom_id_komponen' => $insertedUnsur[5], // Merujuk ke ID Penetapan Tujuan
            'tipe_komponen' => 'Sub Unsur',
            'id_org' => 1,
            'has_child' => false,
          ],
         [
            'nama_komponen' => 'Komunikasi yang Efektif',
            'tahun' => $tahun,
            'bulan' => $bulan,
            'kom_id_komponen' => $insertedUnsur[5], // Merujuk ke ID Kualitas Sasaran Strategis
            'tipe_komponen' => 'Sub Unsur',
            'id_org' => 1,
          ],

          //Sub Unsur Struktur Proses (Pemantauan)
          [
            'nama_komponen' => 'Pemantauan Berkelanjutan',
            'tahun' => $tahun,
            'bulan' => $bulan,
            'kom_id_komponen' => $insertedUnsur[6], // Merujuk ke ID Penetapan Tujuan
            'tipe_komponen' => 'Sub Unsur',
            'id_org' => 1,
            'has_child' => false,
          ],
         [
            'nama_komponen' => 'Evaluasi Terpisah',
            'tahun' => $tahun,
            'bulan' => $bulan,
            'kom_id_komponen' => $insertedUnsur[6], // Merujuk ke ID Kualitas Sasaran Strategis
            'tipe_komponen' => 'Sub Unsur',
            'id_org' => 1,
          ],


          //Sub Unsur Pencapaian Tujuan SPIP (Efektivitas dan Efisiiensi)
          [
            'nama_komponen' => 'Capaian Outcome',
            'tahun' => $tahun,
            'bulan' => $bulan,
            'kom_id_komponen' => $insertedUnsur[7], // Merujuk ke ID Penetapan Tujuan
            'tipe_komponen' => 'Sub Unsur',
            'id_org' => 1,
            'has_child' => false,
          ],
         [
            'nama_komponen' => 'Capaian Output',
            'tahun' => $tahun,
            'bulan' => $bulan,
            'kom_id_komponen' => $insertedUnsur[7], // Merujuk ke ID Kualitas Sasaran Strategis
            'tipe_komponen' => 'Sub Unsur',
            'id_org' => 1,
          ],

          //Sub Unsur Pencapaian Tujuan SPIP (Keandalan Laporan Keuangan)
          [
            'nama_komponen' => 'Opini LK',
            'tahun' => $tahun,
            'bulan' => $bulan,
            'kom_id_komponen' => $insertedUnsur[8], // Merujuk ke ID Penetapan Tujuan
            'tipe_komponen' => 'Sub Unsur',
            'id_org' => 1,
            'has_child' => false,
          ],


         //Sub Unsur Pencapaian Tujuan SPIP (Pengamanan atas Aset)
         [
            'nama_komponen' => 'Keamanan Administrasi',
            'tahun' => $tahun,
            'bulan' => $bulan,
            'kom_id_komponen' => $insertedUnsur[9], // Merujuk ke ID Kualitas Sasaran Strategis
            'tipe_komponen' => 'Sub Unsur',
            'id_org' => 1,
            'has_child' => false,
          ],
          [
            'nama_komponen' => 'Keamanan Fisik',
            'tahun' => $tahun,
            'bulan' => $bulan,
            'kom_id_komponen' => $insertedUnsur[9], // Merujuk ke ID Kualitas Sasaran Strategis
            'tipe_komponen' => 'Sub Unsur',
            'id_org' => 1,
            'has_child' => false,
          ],
          [
            'nama_komponen' => 'Keamanan Hukum',
            'tahun' => $tahun,
            'bulan' => $bulan,
            'kom_id_komponen' => $insertedUnsur[9], // Merujuk ke ID Kualitas Sasaran Strategis
            'tipe_komponen' => 'Sub Unsur',
            'id_org' => 1,
            'has_child' => false,
          ],

          //Sub Unsur Pencapaian Tujuan SPIP (Ketaatan pada Peraturan)
          [
            'nama_komponen' => 'Temuan Ketaatan - BPK',
            'tahun' => $tahun,
            'bulan' => $bulan,
            'kom_id_komponen' => $insertedUnsur[10], // Merujuk ke ID Kualitas Sasaran Strategis
            'tipe_komponen' => 'Sub Unsur',
            'id_org' => 1,
            'has_child' => false,
          ],

        ];

        // DB::table('komponens')->insert($subUnsurComponents);

        $inserterSub = [];
        foreach ($subUnsurComponents as $subcomponent) {
          Komponen::create($subcomponent);
        }
    }
}
