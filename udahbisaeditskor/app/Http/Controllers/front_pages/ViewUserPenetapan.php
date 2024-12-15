<?php

namespace App\Http\Controllers\front_pages;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use App\Models\Komponen;
use App\Models\Periode;

class ViewUserPenetapan extends Controller
{
  public function index(): Factory|View
  {
      // Mendapatkan kom_id_komponen berdasarkan nama komponen 'Penetapan Tujuan'
      $komIdKomponen = Komponen::where('kom_id_komponen', function ($query) {
          $query->select('id_komponen')
                ->from('komponens')
                ->where('nama_komponen', 'Penetapan Tujuan')
                ->limit(1);
      })->pluck('kom_id_komponen')->toArray();

      // Mendapatkan skor dan nilai_unsur untuk komponen yang sesuai
      $skor = Komponen::whereIn('kom_id_komponen', $komIdKomponen)
                      ->pluck('skor')
                      ->toArray();

      $nilaiUnsur = Komponen::whereIn('kom_id_komponen', $komIdKomponen)
                           ->pluck('nilai_unsur')
                           ->toArray();

      $bobotKomponen = Komponen::where('nama_komponen', 'Penetapan Tujuan')->pluck('bobot_komponen')->toArray();

      // Menyiapkan data untuk cards
      $cards = [
          [
              'title' => 'Kualitas Sasaran Strategis',
              'skor' => $skor[0] ?? '5', // Menampilkan skor pertama atau default '5'
              'skor_width' => '100',
              'nilai_unsur' => $nilaiUnsur[0] ?? '3.5', // Menampilkan nilai_unsur pertama atau default '3.5'
              'nilai_unsur_width' => '50'
          ]
      ];

      $cards2 = [
          [
              'title' => 'Kualitas Strategi Pencapaian Sasaran Strategis',
              'skor' => $skor[1] ?? '4',
              'skor_width' => '100',
              'nilai_unsur' => $nilaiUnsur[1] ?? '2.5',
              'nilai_unsur_width' => '50'
          ]
      ];

      // Menyiapkan konfigurasi untuk layout
      $pageConfigs = ['myLayout' => 'front'];

      $bulan = Periode::distinct()->pluck('bulan');
      $tahun = Periode::distinct()->orderby('tahun', 'asc')->pluck('tahun');

      // Mengirimkan data ke view
      return view('content.front-pages.view-user-penetapan', [
          'pageConfigs' => $pageConfigs,
          'cards' => $cards,
          'cards2' => $cards2,
          'bobotKomponen' => $bobotKomponen,
          'tahun' => $tahun,
          'bulan' => $bulan
      ]);
  }

  public function getDataPT($tahun, $bulan) {
    $komIdKomponen = Komponen::where('kom_id_komponen', function ($query) use ($tahun, $bulan) {
        $query->select('id_komponen')
              ->from('komponens')
              ->where('nama_komponen', 'Penetapan Tujuan')
              ->whereIn('tahun', [$tahun])
              ->whereIn('bulan', [$bulan])
              ->limit(1);
    })->pluck('kom_id_komponen')->toArray();

    // Mendapatkan skor dan nilai_unsur untuk komponen yang sesuai
    $skor = Komponen::whereIn('kom_id_komponen', $komIdKomponen)
                    ->whereIn('tahun', [$tahun])
                    ->whereIn('bulan', [$bulan])
                    ->pluck('skor')
                    ->toArray();

    $nilaiUnsur = Komponen::whereIn('kom_id_komponen', $komIdKomponen)
                         ->whereIn('tahun', [$tahun])
                         ->whereIn('bulan', [$bulan])
                         ->pluck('nilai_unsur')
                         ->toArray();

    $bobotKomponen = Komponen::where('nama_komponen', 'Penetapan Tujuan')
                        ->whereIn('tahun', [$tahun])
                        ->whereIn('bulan', [$bulan])
                        ->pluck('bobot_komponen');

    // Menyiapkan data untuk cards
    $cards = [
        [
            'title' => 'Kualitas Sasaran Strategis',
            'skor' => $skor[0] ?? '5', // Menampilkan skor pertama atau default '5'
            'skor_width' => '100',
            'nilai_unsur' => $nilaiUnsur[0] ?? '3.5', // Menampilkan nilai_unsur pertama atau default '3.5'
            'nilai_unsur_width' => '50'
        ]
    ];

    $cards2 = [
        [
            'title' => 'Kualitas Strategi Pencapaian Sasaran Strategis',
            'skor' => $skor[1] ?? '4',
            'skor_width' => '100',
            'nilai_unsur' => $nilaiUnsur[1] ?? '2.5',
            'nilai_unsur_width' => '50'
        ]
    ];

    $dataPT = [
        'bobotKomponen' => $bobotKomponen,
        'cards' => $cards,
        'cards2' => $cards2,
        'skor' => $skor,
        'nilaiUnsur' => $nilaiUnsur
    ];
    return response()->json($dataPT);
  }
}
