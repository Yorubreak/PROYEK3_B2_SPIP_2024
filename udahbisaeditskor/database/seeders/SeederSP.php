<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
use Session;

class SeederSP extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $bulanId = Session::get('bulanId');

        DB::table('struktur_proses')->insert([
            'unsur' => 'Penegakan Integritas dan Nilai Etika',
            'bulan_id' => $bulanId
        ]);

        DB::table('struktur_proses')->insert([
            'unsur' => 'Komitmen terhadap Kompetensi',
            'bulan_id' => $bulanId
        ]);

        DB::table('struktur_proses')->insert([
            'unsur' => 'Kepemimpinan yang Kondusif',
            'bulan_id' => $bulanId
        ]);

        DB::table('struktur_proses')->insert([
            'unsur' => 'Pembentukan Struktur Organisasi yang Sesuai dengan Kebutuhan',
            'bulan_id' => $bulanId
        ]);

        DB::table('struktur_proses')->insert([
            'unsur' => 'Pendelegasian Wewenang dan Tanggung Jawab yang Tepat',
            'bulan_id' => $bulanId
        ]);

        DB::table('struktur_proses')->insert([
            'unsur' => 'Penyusunan dan Penerapan Kebijakan yang Sehat tentang Pembinaan SDM',
            'bulan_id' => $bulanId
        ]);

        DB::table('struktur_proses')->insert([
            'unsur' => 'Perwujudan Peran APIP yang Efektif',
            'bulan_id' => $bulanId
        ]);

        DB::table('struktur_proses')->insert([
            'unsur' => 'Hubungan Kerja yang Baik dengan Instansi Pemerintah Terkait',
            'bulan_id' => $bulanId
        ]);

        DB::table('struktur_proses')->insert([
            'unsur' => 'Identifikasi Risiko',
            'bulan_id' => $bulanId
        ]);

        DB::table('struktur_proses')->insert([
            'unsur' => 'Analisis Risiko',
            'bulan_id' => $bulanId
        ]);

        DB::table('struktur_proses')->insert([
            'unsur' => 'Reviu atas Kinerja Instansi Pemerintah',
            'bulan_id' => $bulanId
        ]);

        DB::table('struktur_proses')->insert([
            'unsur' => 'Pembinaan Sumber Daya Manusia',
            'bulan_id' => $bulanId
        ]);

        DB::table('struktur_proses')->insert([
            'unsur' => 'Pengendalian atas Pengelolaan Sistem Informasi',
            'bulan_id' => $bulanId
        ]);

        DB::table('struktur_proses')->insert([
            'unsur' => 'Pengendalian Fisik atas Aset',
            'bulan_id' => $bulanId
        ]);

        DB::table('struktur_proses')->insert([
            'unsur' => 'Penetapan dan Reviu atas Indikator dan Ukuran Kinerja',
            'bulan_id' => $bulanId
        ]);

        DB::table('struktur_proses')->insert([
            'unsur' => 'Pemisahan Fungsi',
            'bulan_id' => $bulanId
        ]);

        DB::table('struktur_proses')->insert([
            'unsur' => 'Otorisasi atas Transaksi dan Kejadian yang Penting',
            'bulan_id' => $bulanId
        ]);

        DB::table('struktur_proses')->insert([
            'unsur' => 'Pencatatan yang Akurat dan Tepat Waktu atas Transaksi dan Kejadian',
            'bulan_id' => $bulanId
        ]);

        DB::table('struktur_proses')->insert([
            'unsur' => 'Pembatasan Akses atas Sumber Daya dan Pencatatannya',
            'bulan_id' => $bulanId
        ]);

        DB::table('struktur_proses')->insert([
            'unsur' => 'Akuntabilitas terhadap Sumber Daya dan Pencatatannya',
            'bulan_id' => $bulanId
        ]);

        DB::table('struktur_proses')->insert([
            'unsur' => 'Dokumentasi yang Baik atas SPI serta Transaksi dan Kejadian Penting',
            'bulan_id' => $bulanId
        ]);

        DB::table('struktur_proses')->insert([
            'unsur' => 'Informasi yang Relevan',
            'bulan_id' => $bulanId
        ]);

        DB::table('struktur_proses')->insert([
            'unsur' => 'Komunikasi yang Efektif',
            'bulan_id' => $bulanId
        ]);

        DB::table('struktur_proses')->insert([
            'unsur' => 'Pemantauan Berkelanjutan',
            'bulan_id' => $bulanId
        ]);

        DB::table('struktur_proses')->insert([
            'unsur' => 'Evaluasi Terpisah',
            'bulan_id' => $bulanId
        ]);
    }
}
