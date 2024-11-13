<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Komponen;
use App\Models\Periode;

class ControllerAdmin extends Controller
{

  //Ambil data dari database
  public function index()
  {

    $bulan = DB::table('bulan')->orderBy('id', 'asc')->get();
    $tahun = DB::table('tahun')->orderBy('id', 'asc')->get();
    $dataPT =  DB::table('penetapan_tujuan')->orderBy('id', 'asc')->get();
    $dataSP =  DB::table('struktur_proses')->orderBy('id', 'asc')->get();
    $dataSPIP1 = DB::table('pencapaian_tujuan')
                    ->whereIn('id', values: [9, 10])->orderBy('id', 'asc')->get();
    $dataSPIP2 = DB::table('pencapaian_tujuan')
                    ->whereIn('id', [11])->orderBy('id', 'asc')->get();
    $dataSPIP3 = DB::table('pencapaian_tujuan')
                    ->whereIn('id', [12, 13, 14])->orderBy('id', 'asc')->get();
    $dataSPIP4 = DB::table('pencapaian_tujuan')
                    ->whereIn('id', [15])->orderBy('id', 'asc')->get();

    return view('content.admin.admin', compact('dataPT', 'dataSP', 'dataSPIP1', 'dataSPIP2', 'dataSPIP3', 'dataSPIP4', 'tahun', 'bulan'));
  }

  public function getElemenKomponens()
{
    // Retrieve 'Elemen' type components
    $elemen = Komponen::where('tipe_komponen', 'Elemen')->get();

    // Retrieve 'Unsur' type components where kom_id_komponen matches the id_komponen of the elemen
    $unsur = Komponen::where('tipe_komponen', 'Unsur')
                    ->whereIn('kom_id_komponen', $elemen->pluck('id_komponen'))
                    ->get();

    // Retrieve 'Sub Unsur' type components where kom_id_komponen matches the id_komponen of the unsur
    $subunsur = Komponen::where('tipe_komponen', 'Sub Unsur')
                        ->whereIn('kom_id_komponen', $unsur->pluck('id_komponen'))
                        ->get();

    $bulan = Periode::distinct()->pluck('bulan');
    $tahun = Periode::distinct()->pluck('tahun');

    // Return the data to the view
    return view('content.admin.nyobapace', compact('elemen', 'unsur', 'subunsur', 'tahun', 'bulan'));
}

public function getBulanByTahunId($tahun)
{
    // Ambil bulan berdasarkan tahun_id
    $bulan = Periode::where('tahun', $tahun)->pluck('bulan');
    //

    return response()->json($bulan);
}



  //Edit Skor
  public function editskorPT($bulanId)
  {
    $dataPT =  DB::table('penetapan_tujuan')->where('bulan_id', $bulanId)->orderBy('id', 'asc')->get();

    return view('content.admin.editskorPT', compact('dataPT'));
  }

  public function editskorSP()
  {
    $dataSP =  DB::table('struktur_proses')->orderBy('id', 'asc')->get();

    return view('content.admin.editskorSP', compact('dataSP'));
  }
  public function editskorSPIP()
  {
    $dataSPIP = DB::table('pencapaian_tujuan')->orderBy('id', 'asc')->get();


    return view('content.admin.editskorSPIP', compact('dataSPIP'));
  }


  //Submit Skor (update skor ke database)
  public function submitskorPT(Request $request, int $id)
  {
    $dataPT = DB::table('penetapan_tujuan')->find($id);
    $dataPT->skor = $request->skor;
    DB::table('penetapan_tujuan')->whereId($id)->update((array) $dataPT);
    return response()->json(['message' => 'Data skor berhasil disimpan']);
  }

  public function submitskorSP(Request $request, int $id)
  {
    $dataSP = DB::table('struktur_proses')->find($id);
    $dataSP->skor = $request->skor;
    DB::table('struktur_proses')->whereId($id)->update((array) $dataSP);
    return response()->json(['message' => 'Data skor berhasil disimpan']);
  }


public function submitskorSPIP(Request $request, $id)
{
    $dataSPIP = DB::table('pencapaian_tujuan')->find($id);
    $dataSPIP->skor = $request->skor;
    DB::table('pencapaian_tujuan')->whereId($id)->update((array) $dataSPIP);
    return response()->json(['message' => 'Data skor berhasil disimpan']);
}



  public function getDataByTahunBulan($bulanId)
{
    $dataPen = DB::table('penetapan_tujuan')
                ->where('bulan_id', $bulanId)
                ->select('unsur', 'skor', 'nilai_unsur', 'nilai_komponen')
                ->get();

    return response()->json($dataPen);
}

public function getDataByTahunBulanSP($bulanId)
{
    $dataSTRP = DB::table('struktur_proses')
                ->where('bulan_id', $bulanId)
                ->select('unsur', 'skor', 'nilai_unsur', 'nilai_komponen')
                ->orderBy('id','asc')
                ->get();


    return response()->json($dataSTRP);
}

}
