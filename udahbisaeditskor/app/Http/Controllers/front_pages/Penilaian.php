<?php

namespace App\Http\Controllers\front_pages;

use App\Http\Controllers\Controller;
use App\Models\Komponen;
use App\Models\Periode;
use Illuminate\Http\Request;

class Penilaian extends Controller
{
    public function index()
    {
        $pageConfigs = ['myLayout' => 'front'];

        // Ambil data komponen dan bobot komponen
        $namaKomponen = Komponen::where('tipe_komponen', 'Elemen')->pluck('nama_komponen')->toArray();
        $bobotKomponen = Komponen::where('tipe_komponen', 'Elemen')->pluck('bobot_komponen')->map(function ($value) {
          return $value * 100; // Melakukan perkalian dengan 100
        })->toArray();
        $nilaiKomponen = Komponen::where('tipe_komponen', 'Elemen')->pluck('nilai_komponen')->toArray();
        $totalNilaiKomponen = array_sum($nilaiKomponen);

        $bulan = Periode::distinct()->pluck('bulan');
        $tahun = Periode::distinct()->orderby('tahun', 'asc')->pluck('tahun');
        // Kembalikan data ke view
        return view('content.front-pages.penilaian', compact('pageConfigs', 'namaKomponen', 'bobotKomponen', 'nilaiKomponen','totalNilaiKomponen', 'tahun', 'bulan'));
    }

    public function ambilData($tahun, $bulan){
      $namaKomponen = Komponen::where('tipe_komponen', 'Elemen')->whereIn('tahun', [$tahun])->whereIn('bulan', [$bulan])->pluck('nama_komponen')->toArray();
      $bobotKomponen = Komponen::where('tipe_komponen', 'Elemen')->whereIn('tahun', [$tahun])->whereIn('bulan', [$bulan])->pluck('bobot_komponen')->map(function ($value) {
        return $value * 100; // Melakukan perkalian dengan 100
      })->toArray();
      $nilaiKomponen = Komponen::where('tipe_komponen', 'Elemen')->whereIn('tahun', [$tahun])->whereIn('bulan', [$bulan])->pluck('nilai_komponen')->toArray();
      $totalNilaiKomponen = array_sum($nilaiKomponen);
      $totalNilaiKomponen = round($totalNilaiKomponen, 2);

      $data = [$namaKomponen, $bobotKomponen, $nilaiKomponen, $totalNilaiKomponen];

      return response()->json($data);
    }

}
