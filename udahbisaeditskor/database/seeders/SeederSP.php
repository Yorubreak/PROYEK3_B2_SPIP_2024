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
        'unsur' => 'Penegakan Integritas dan Nilai Etika'
      ]);

      DB::table('struktur_proses')->insert([
        'unsur' => 'Komitmen terhadap Kompetensi'
      ]);

      DB::table('struktur_proses')->insert([
        'unsur' => 'Kepemimpinan yang Kondusif'
      ]);

      DB::table('struktur_proses')->insert([
        'unsur' => 'Pembentukan Struktur Organisasi yang Sesuai dengan Kebutuhan'
      ]);

      DB::table('struktur_proses')->insert([
        'unsur' => 'Pendelegasian Wewenang dan Tanggung Jawab yang Tepat'
      ]);

      DB::table('struktur_proses')->insert([
        'unsur' => 'Penyusunan dan Penerapan Kebijakan yang Sehat tentang Pembinaan SDM'
      ]);

      DB::table('struktur_proses')->insert([
        'unsur' => 'Perwujudan Peran APIP yang Efektif'
      ]);

      DB::table('struktur_proses')->insert([
        'unsur' => 'Hubungan Kerja yang Baik dengan Instansi Pemerintah Terkait'
      ]);

      DB::table('struktur_proses')->insert([
        'unsur' => 'Identifikasi Risiko'
      ]);

      DB::table('struktur_proses')->insert([
        'unsur' => 'Analisis Risiko'
      ]);

      DB::table('struktur_proses')->insert([
        'unsur' => 'Reviu atas Kinerja Instansi Pemerintah'
      ]);

      DB::table('struktur_proses')->insert([
        'unsur' => 'Pembinaan Sumber Daya Manusia'
      ]);

      DB::table('struktur_proses')->insert([
        'unsur' => 'Pengendalian atas Pengelolaan Sistem Informasi'
      ]);

      DB::table('struktur_proses')->insert([
        'unsur' => 'Pengendalian Fisik atas Aset'
      ]);

      DB::table('struktur_proses')->insert([
        'unsur' => 'Penetapan dan Reviu atas Indikator dan Ukuran Kinerja'
      ]);

      DB::table('struktur_proses')->insert([
        'unsur' => 'Pemisahan Fungsi'
      ]);

      DB::table('struktur_proses')->insert([
        'unsur' => 'Otorisasi atas Transaksi dan Kejadian yang Penting'
      ]);

      DB::table('struktur_proses')->insert([
        'unsur' => 'Pencatatan yang Akurat dan Tepat Waktu atas Transaksi dan Kejadian'
      ]);

      DB::table('struktur_proses')->insert([
        'unsur' => 'Pembatasan Akses atas Sumber Daya dan Pencatatannya'
      ]);

      DB::table('struktur_proses')->insert([
        'unsur' => 'Akuntabilitas terhadap Sumber Daya dan Pencatatannya'
      ]);

      DB::table('struktur_proses')->insert([
        'unsur' => 'Dokumentasi yang Baik atas SPI serta Transaksi dan Kejadian Penting'
      ]);

      DB::table('struktur_proses')->insert([
        'unsur' => 'Informasi yang Relevan'
      ]);

      DB::table('struktur_proses')->insert([
        'unsur' => 'Komunikasi yang Efektif'
      ]);

      DB::table('struktur_proses')->insert([
        'unsur' => 'Pemantauan Berkelanjutan'
      ]);

      DB::table('struktur_proses')->insert([
        'unsur' => 'Evaluasi Terpisah '
      ]);
  }
}
