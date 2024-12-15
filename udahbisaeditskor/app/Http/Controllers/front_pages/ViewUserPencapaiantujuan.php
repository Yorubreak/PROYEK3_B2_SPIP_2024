<?php

namespace App\Http\Controllers\front_pages;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use App\Models\Komponen;
use App\Models\Periode;

class ViewUserPencapaiantujuan extends Controller
{
    public function index(): Factory|View
    {
        // Mendapatkan kom_id_komponen berdasarkan nama komponen 'Efektivitas dan Efisiensi'
        $komIdKomponenEE = Komponen::where('kom_id_komponen', function ($query) {
            $query->select('id_komponen')
                ->from('komponens')
                ->where('nama_komponen', 'Efektivitas dan Efisiensi')
                ->limit(1);
        })->pluck('kom_id_komponen')->toArray();

        $BUEE = Komponen::whereIn('kom_id_komponen', $komIdKomponenEE)
                    ->pluck('bobot_unsur')
                    ->toArray();

        $skorEE = Komponen::whereIn('kom_id_komponen', $komIdKomponenEE)
                    ->pluck('skor')
                    ->toArray();

        // Mendapatkan kom_id_komponen berdasarkan nama komponen 'Keandalan Laporan Keuangan'
        $komIdKomponenKLK = Komponen::where('kom_id_komponen', function ($query) {
            $query->select('id_komponen')
                ->from('komponens')
                ->where('nama_komponen', 'Keandalan Laporan Keuangan')
                ->limit(1);
        })->pluck('kom_id_komponen')->toArray();

        $BUKLK = Komponen::whereIn('kom_id_komponen', $komIdKomponenKLK)
                    ->pluck('bobot_unsur')
                    ->toArray();

        $skorKLK = Komponen::whereIn('kom_id_komponen', $komIdKomponenKLK)
                    ->pluck('skor')
                    ->toArray();

        // Mendapatkan kom_id_komponen berdasarkan nama komponen 'Ketaatan pada Peraturan'
        $komIdKomponenKP = Komponen::where('kom_id_komponen', function ($query) {
            $query->select('id_komponen')
                ->from('komponens')
                ->where('nama_komponen', 'Keandalan Laporan Keuangan')
                ->limit(1);
        })->pluck('kom_id_komponen')->toArray();

        $BUKP = Komponen::whereIn('kom_id_komponen', $komIdKomponenKP)
                ->pluck('bobot_unsur')
                ->toArray();

        $skorKP = Komponen::whereIn('kom_id_komponen', $komIdKomponenKP)
                    ->pluck('skor')
                    ->toArray();

        // Mendapatkan kom_id_komponen berdasarkan nama komponen 'Pengamanan atas Aset'
        $komIdKomponenPA = Komponen::where('kom_id_komponen', function ($query) {
            $query->select('id_komponen')
                ->from('komponens')
                ->where('nama_komponen', 'Pengamanan atas Aset')
                ->limit(1);
        })->pluck('kom_id_komponen')->toArray();

        $BUPA = Komponen::whereIn('kom_id_komponen', $komIdKomponenPA)
                ->pluck('bobot_unsur')
                ->toArray();

        $skorPA = Komponen::whereIn('kom_id_komponen', $komIdKomponenPA)
                    ->pluck('skor')
                    ->toArray();

        
        $bulan = Periode::distinct()->pluck('bulan');
        $tahun = Periode::distinct()->orderby('tahun', 'asc')->pluck('tahun');
        
        $pageConfigs = ['myLayout' => 'front'];
        return view('content.front-pages.view-user-pencapaiantujuan', [
            'pageConfigs' => $pageConfigs,
            'BUEE' => $BUEE,
            'BUKLK' => $BUKLK,
            'BUKP' => $BUKP,
            'BUPA' => $BUPA,
            'skorEE' => $skorEE,
            'skorKLK' => $skorKLK,
            'skorKP' => $skorKP,
            'skorPA' => $skorPA,
            'tahun' => $tahun,
            'bulan' => $bulan
        ]);
    }


    public function getDataPTSPIP($tahun, $bulan)
    {
        // Mendapatkan kom_id_komponen berdasarkan nama komponen 'Efektivitas dan Efisiensi'
        $komIdKomponenEE = Komponen::where('kom_id_komponen', function ($query) use ($tahun, $bulan) {
            $query->select('id_komponen')
                ->from('komponens')
                ->where('nama_komponen', 'Efektivitas dan Efisiensi')
                ->whereIn('tahun', [$tahun])
                ->whereIn('bulan', [$bulan])
                ->limit(1);
        })->pluck('kom_id_komponen')->toArray();

        $BUEE = Komponen::whereIn('kom_id_komponen', $komIdKomponenEE)
                    ->whereIn('tahun', [$tahun])
                    ->whereIn('bulan', [$bulan])
                    ->pluck('bobot_unsur')
                    ->toArray();

        $skorEE = Komponen::whereIn('kom_id_komponen', $komIdKomponenEE)
                    ->whereIn('tahun', [$tahun])
                    ->whereIn('bulan', [$bulan])
                    ->pluck('skor')
                    ->toArray();

        // Mendapatkan kom_id_komponen berdasarkan nama komponen 'Keandalan Laporan Keuangan'
        $komIdKomponenKLK = Komponen::where('kom_id_komponen', function ($query) use ($tahun, $bulan) {
            $query->select('id_komponen')
                ->from('komponens')
                ->where('nama_komponen', 'Keandalan Laporan Keuangan')
                ->whereIn('tahun', [$tahun])
                ->whereIn('bulan', [$bulan])
                ->limit(1);
        })->pluck('kom_id_komponen')->toArray();

        $BUKLK = Komponen::whereIn('kom_id_komponen', $komIdKomponenKLK)
                    ->whereIn('tahun', [$tahun])
                    ->whereIn('bulan', [$bulan])
                    ->pluck('bobot_unsur')
                    ->toArray();

        $skorKLK = Komponen::whereIn('kom_id_komponen', $komIdKomponenKLK)
                    ->whereIn('tahun', [$tahun])
                    ->whereIn('bulan', [$bulan])
                    ->pluck('skor')
                    ->toArray();

        // Mendapatkan kom_id_komponen berdasarkan nama komponen 'Ketaatan pada Peraturan'
        $komIdKomponenKP = Komponen::where('kom_id_komponen', function ($query) use ($tahun, $bulan){
            $query->select('id_komponen')
                ->from('komponens')
                ->where('nama_komponen', 'Keandalan Laporan Keuangan')
                ->whereIn('tahun', [$tahun])
                ->whereIn('bulan', [$bulan])
                ->limit(1);
        })->pluck('kom_id_komponen')->toArray();

        $BUKP = Komponen::whereIn('kom_id_komponen', $komIdKomponenKP)
                ->whereIn('tahun', [$tahun])
                ->whereIn('bulan', [$bulan])
                ->pluck('bobot_unsur')
                ->toArray();

        $skorKP = Komponen::whereIn('kom_id_komponen', $komIdKomponenKP)
                ->whereIn('tahun', [$tahun])
                ->whereIn('bulan', [$bulan])
                ->pluck('skor')
                ->toArray();

        // Mendapatkan kom_id_komponen berdasarkan nama komponen 'Pengamanan atas Aset'
        $komIdKomponenPA = Komponen::where('kom_id_komponen', function ($query) use ($tahun, $bulan) {
            $query->select('id_komponen')
                ->from('komponens')
                ->where('nama_komponen', 'Pengamanan atas Aset')
                ->whereIn('tahun', [$tahun])
                ->whereIn('bulan', [$bulan])
                ->limit(1);
        })->pluck('kom_id_komponen')->toArray();

        $BUPA = Komponen::whereIn('kom_id_komponen', $komIdKomponenPA)
                ->whereIn('tahun', [$tahun])
                ->whereIn('bulan', [$bulan])
                ->pluck('bobot_unsur')
                ->toArray();

        $skorPA = Komponen::whereIn('kom_id_komponen', $komIdKomponenPA)
                ->whereIn('tahun', [$tahun])
                ->whereIn('bulan', [$bulan])
                ->pluck('skor')
                ->toArray();
        
        $dataSPIP = [
            'BUEE' => $BUEE,
            'BUKLK' => $BUKLK,
            'BUKP' => $BUKP,
            'BUPA' => $BUPA,
            'skorEE' => $skorEE,
            'skorKLK' => $skorKLK,
            'skorKP' => $skorKP,
            'skorPA' => $skorPA
        ];
        return response()->json($dataSPIP);
    }
}
