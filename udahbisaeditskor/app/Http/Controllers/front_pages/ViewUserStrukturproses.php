<?php

namespace App\Http\Controllers\front_pages;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class ViewUserStrukturproses extends Controller
{
    public function index(): Factory|View
    {
        // Data untuk Section 1
        $cards = [
            ['title' => 'Penegakan Integritas Dan Nilai Etika', 'score' => 3, 'element_value' => 2.3, 'score_width' => 60, 'element_width' => 50],
            ['title' => 'Komitmen Terhadap Kompetensi', 'score' => 3, 'element_value' => 2.4, 'score_width' => 60, 'element_width' => 55],
            ['title' => 'Kepemimpinan Yang Kondusif', 'score' => 2, 'element_value' => 2.5, 'score_width' => 40, 'element_width' => 50],
            ['title' => 'Pembentukan Organisasi Yang Sesuai Kebutuhan', 'score' => 4, 'element_value' => 2.6, 'score_width' => 80, 'element_width' => 55],
            ['title' => 'Pendelegasian Wewenang Dan Tanggung Jawab', 'score' => 4, 'element_value' => 2.5, 'score_width' => 80, 'element_width' => 55],
            ['title' => 'Penyusunan dan Penerapan Kebijakan Yang Sehat', 'score' => 2, 'element_value' => 2.0, 'score_width' => 40, 'element_width' => 50],
            ['title' => 'Perwujudan Peran APIP Yang Efektif', 'score' => 4, 'element_value' => 3.5, 'score_width' => 80, 'element_width' => 75],
            ['title' => 'Hubungan Yang Baik Dengan Instansi Pemerintah Terkait', 'score' => 3, 'element_value' => 3.3, 'score_width' => 60, 'element_width' => 65],
        ];

        // Data untuk Section 2
        $section2Cards = [
            ['title' => 'Pelayanan Prima', 'score' => 4, 'element_value' => 3.8, 'score_width' => 75, 'element_width' => 80],
            ['title' => 'Efisiensi Operasional', 'score' => 3, 'element_value' => 3.2, 'score_width' => 65, 'element_width' => 70],
            ['title' => 'Pengelolaan Risiko', 'score' => 4, 'element_value' => 3.9, 'score_width' => 85, 'element_width' => 90],
            ['title' => 'Keberlanjutan Program', 'score' => 3, 'element_value' => 3.4, 'score_width' => 70, 'element_width' => 75],
            ['title' => 'Kolaborasi Tim', 'score' => 5, 'element_value' => 4.0, 'score_width' => 90, 'element_width' => 95],
            ['title' => 'Pemantauan Kinerja', 'score' => 4, 'element_value' => 3.7, 'score_width' => 80, 'element_width' => 85],
            ['title' => 'Pelayanan Prima', 'score' => 4, 'element_value' => 3.8, 'score_width' => 75, 'element_width' => 80],
            ['title' => 'Efisiensi Operasional', 'score' => 3, 'element_value' => 3.2, 'score_width' => 65, 'element_width' => 70],
            ['title' => 'Pengelolaan Risiko', 'score' => 4, 'element_value' => 3.9, 'score_width' => 85, 'element_width' => 90],
            ['title' => 'Keberlanjutan Program', 'score' => 3, 'element_value' => 3.4, 'score_width' => 70, 'element_width' => 75],
            ['title' => 'Kolaborasi Tim', 'score' => 5, 'element_value' => 4.0, 'score_width' => 90, 'element_width' => 95],
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
            'card2Data' => $card2Data
        ]);
    }
}
