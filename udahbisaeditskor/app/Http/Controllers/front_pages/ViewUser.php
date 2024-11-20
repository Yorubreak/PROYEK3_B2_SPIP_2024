<?php

namespace App\Http\Controllers\front_pages;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ViewUser extends Controller
{
    public function index(): Factory|View
    {
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

        $pageConfigs = ['myLayout' => 'front'];
        return view('content.front-pages.view_user', ['pageConfigs' => $pageConfigs], compact('cards'));
    }

}
