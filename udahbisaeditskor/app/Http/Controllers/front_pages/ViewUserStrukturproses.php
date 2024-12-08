<?php

namespace App\Http\Controllers\front_pages;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use App\Models\Komponen;

class ViewUserStrukturproses extends Controller
{
    public function index(): Factory|View
    {
        // Mendapatkan kom_id_komponen berdasarkan nama komponen 'Lingkungan Pengendalian'
        $komIdKomponenLP = Komponen::where('kom_id_komponen', function ($query) {
            $query->select('id_komponen')
                ->from('komponens')
                ->where('nama_komponen', 'Lingkungan Pengendalian')
                ->limit(1);
        })->pluck('kom_id_komponen')->toArray();

        $skorLP = Komponen::whereIn('kom_id_komponen', $komIdKomponenLP)
                        ->pluck('skor')
                        ->toArray();

        $NULP = Komponen::whereIn('kom_id_komponen', $komIdKomponenLP)
                        ->pluck('nilai_unsur')
                        ->toArray();

        // Mendapatkan kom_id_komponen berdasarkan nama komponen 'Kegiatan Pengendalian'
        $komIdKomponenKP = Komponen::where('kom_id_komponen', function ($query) {
            $query->select('id_komponen')
                ->from('komponens')
                ->where('nama_komponen', 'Kegiatan Pengendalian')
                ->limit(1);
        })->pluck('kom_id_komponen')->toArray();

        $skorKP = Komponen::whereIn('kom_id_komponen', $komIdKomponenKP)
                        ->pluck('skor')
                        ->toArray();
  
        $NUKP = Komponen::whereIn('kom_id_komponen', $komIdKomponenKP)
                        ->pluck('nilai_unsur')
                        ->toArray();

        // Mendapatkan kom_id_komponen berdasarkan nama komponen 'Penilaian Resiko'
        $komIdKomponenPR = Komponen::where('kom_id_komponen', function ($query) {
            $query->select('id_komponen')
                  ->from('komponens')
                  ->where('nama_komponen', 'Penilaian Resiko')
                  ->limit(1);
        })->pluck('kom_id_komponen')->toArray();

        $skorPR = Komponen::whereIn('kom_id_komponen', $komIdKomponenPR)
                        ->pluck('skor')
                        ->toArray();

        $NUPR = Komponen::whereIn('kom_id_komponen', $komIdKomponenPR)
                        ->pluck('nilai_unsur')
                        ->toArray();
        $BUPR = Komponen::whereIn('kom_id_komponen', $komIdKomponenPR)
                        ->pluck('bobot_unsur')
                        ->toArray();
        $TBUPR = array_sum($BUPR) * 100;

        // Mendapatkan kom_id_komponen berdasarkan nama komponen 'Informasi dan Komunikasi'
        $komIdKomponenIK = Komponen::where('kom_id_komponen', function ($query) {
            $query->select('id_komponen')
                  ->from('komponens')
                  ->where('nama_komponen', 'Informasi dan Komunikasi')
                  ->limit(1);
        })->pluck('kom_id_komponen')->toArray();

        $skorIK = Komponen::whereIn('kom_id_komponen', $komIdKomponenIK)
                        ->pluck('skor')
                        ->toArray();

        $NUIK = Komponen::whereIn('kom_id_komponen', $komIdKomponenIK)
                        ->pluck('nilai_unsur')
                        ->toArray();
        $BUIK = Komponen::whereIn('kom_id_komponen', $komIdKomponenIK)
                        ->pluck('bobot_unsur')
                        ->toArray();
        $TBUIK = array_sum($BUIK) * 100;

        // Mendapatkan kom_id_komponen berdasarkan nama komponen 'Pemantuan'
        $komIdKomponenP = Komponen::where('kom_id_komponen', function ($query) {
            $query->select('id_komponen')
                  ->from('komponens')
                  ->where('nama_komponen', 'Pemantauan')
                  ->limit(1);
        })->pluck('kom_id_komponen')->toArray();

        $skorP = Komponen::whereIn('kom_id_komponen', $komIdKomponenP)
                        ->pluck('skor')
                        ->toArray();

        $NUP = Komponen::whereIn('kom_id_komponen', $komIdKomponenP)
                        ->pluck('nilai_unsur')
                        ->toArray();
        $BUP = Komponen::whereIn('kom_id_komponen', $komIdKomponenP)
                        ->pluck('bobot_unsur')
                        ->toArray();
        $TBUP = array_sum($BUP) * 100;

        // Data untuk Section 1
        $cards = [
            ['title' => 'Penegakan Integritas Dan Nilai Etika', 'score' => $skorLP[0], 'element_value' => $NULP[0], 'score_width' => 100, 'element_width' => 50],
            ['title' => 'Komitmen Terhadap Kompetensi', 'score' => $skorLP[1], 'element_value' => $NULP[1], 'score_width' => 100, 'element_width' => 55],
            ['title' => 'Kepemimpinan Yang Kondusif', 'score' => $skorLP[2], 'element_value' => $NULP[2], 'score_width' => 100, 'element_width' => 50],
            ['title' => 'Pembentukan Organisasi Yang Sesuai Kebutuhan', 'score' => $skorLP[3], 'element_value' => $NULP[3], 'score_width' => 100, 'element_width' => 55],
            ['title' => 'Pendelegasian Wewenang Dan Tanggung Jawab', 'score' => $skorLP[4], 'element_value' => $NULP[4], 'score_width' => 100, 'element_width' => 55],
            ['title' => 'Penyusunan dan Penerapan Kebijakan Yang Sehat', 'score' => $skorLP[5], 'element_value' => $NULP[5], 'score_width' => 100, 'element_width' => 50],
            ['title' => 'Perwujudan Peran APIP Yang Efektif', 'score' => $skorLP[6], 'element_value' => $NULP[6], 'score_width' => 100, 'element_width' => 75],
            ['title' => 'Hubungan Yang Baik Dengan Instansi Pemerintah Terkait', 'score' => $skorLP[7], 'element_value' => $NULP[7], 'score_width' => 100, 'element_width' => 65],
        ];

        // Data untuk Section 2
        $section2Cards = [
            ['title' => 'Pelayanan Prima', 'score' => $skorKP[0], 'element_value' => $NUKP[0], 'score_width' => 75, 'element_width' => 80],
            ['title' => 'Efisiensi Operasional', 'score' => $skorKP[1], 'element_value' => $NUKP[1], 'score_width' => 65, 'element_width' => 70],
            ['title' => 'Pengelolaan Risiko', 'score' => $skorKP[2], 'element_value' => $NUKP[2], 'score_width' => 85, 'element_width' => 90],
            ['title' => 'Keberlanjutan Program', 'score' => $skorKP[3], 'element_value' => $NUKP[3], 'score_width' => 70, 'element_width' => 75],
            ['title' => 'Kolaborasi Tim', 'score' => $skorKP[4], 'element_value' => $NUKP[4], 'score_width' => 90, 'element_width' => 95],
            ['title' => 'Pemantauan Kinerja', 'score' => $skorKP[5], 'element_value' => $NUKP[5], 'score_width' => 80, 'element_width' => 85],
            ['title' => 'Pelayanan Prima', 'score' => $skorKP[6], 'element_value' => $NUKP[6], 'score_width' => 75, 'element_width' => 80],
            ['title' => 'Efisiensi Operasional', 'score' => $skorKP[7], 'element_value' => $NUKP[7], 'score_width' => 65, 'element_width' => 70],
            ['title' => 'Pengelolaan Risiko', 'score' => $skorKP[8], 'element_value' => $NUKP[8], 'score_width' => 85, 'element_width' => 90],
            ['title' => 'Keberlanjutan Program', 'score' => $skorKP[9], 'element_value' => $NUKP[9], 'score_width' => 70, 'element_width' => 75],
            ['title' => 'Kolaborasi Tim', 'score' => $skorKP[10], 'element_value' => $NUKP[10], 'score_width' => 90, 'element_width' => 95],
        ];

        // Ambil 6 data pertama untuk Card 1
        $card1Data = array_slice($section2Cards, 0, 6);

        // Ambil 5 data sisanya untuk Card 2
        $card2Data = array_slice($section2Cards, 6, 5);

        $pageConfigs = ['myLayout' => 'front'];

        return view('content.front-pages.view-user-strukturproses', [
            'pageConfigs' => $pageConfigs,
            'cards' => $cards,
            'card1Data' => $card1Data,
            'card2Data' => $card2Data,
            'section2Cards' => $section2Cards,
            'komIdKomponenLP' => $komIdKomponenLP,
            'skorLP' => $skorLP,
            'NULP' => $NULP,
            'komIdKomponenKP' => $komIdKomponenKP,
            'skorKP' => $skorKP,
            'NUKP' => $NUKP,
            'komIdKomponenPR' => $komIdKomponenPR,
            'skorPR' => $skorPR,
            'NUPR' => $NUPR,
            'BUPR' => $BUPR,
            'TBUPR' => $TBUPR,
            'komIdKomponenIK' => $komIdKomponenIK,
            'skorIK' => $skorIK,
            'NUIK' => $NUIK,
            'BUIK' => $BUIK,
            'TBUIK' => $TBUIK,
            'komIdKomponenP' => $komIdKomponenP,
            'skorP' => $skorP,
            'NUP' => $NUP,
            'BUP' => $BUP,
            'TBUP' => $TBUP
        ]);
    }
}
