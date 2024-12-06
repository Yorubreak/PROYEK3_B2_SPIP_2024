<?php

namespace App\Http\Controllers\front_pages;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ViewUserPenetapan extends Controller
{
    public function index(): Factory|View
    {
        // Menyiapkan data untuk cards
        $cards = [
          [
            'title' => 'Kualitas Sasaran Strategis',
            'skor' => '5',
            'skor_width' => '100',
            'nilai_unsur' => '3.5',
            'nilai_unsur_width' => '50'
          ]
        ];

        $cards2 = [
          [
            'title' => 'Kualitas Strategi Pencapaian Sasaran Strategis',
            'skor' => '4',
            'skor_width' => '80',
            'nilai_unsur' => '2.5',
            'nilai_unsur_width' => '50'
          ]
        ];

        // Menyiapkan konfigurasi untuk layout
        $pageConfigs = ['myLayout' => 'front'];

        // Mengirimkan data ke view
        return view('content.front-pages.view-user-penetapan', [
            'pageConfigs' => $pageConfigs,
            'cards' => $cards, // Menambahkan data $cards ke view
            'cards2' => $cards2
        ]);
    }
}


