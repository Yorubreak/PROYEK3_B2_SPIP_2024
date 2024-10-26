<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Month;

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
                    ->whereIn('id', [9, 10])->orderBy('id', 'asc')->get();
    $dataSPIP2 = DB::table('pencapaian_tujuan')
                    ->whereIn('id', [11])->orderBy('id', 'asc')->get();
    $dataSPIP3 = DB::table('pencapaian_tujuan')
                    ->whereIn('id', [12, 13, 14])->orderBy('id', 'asc')->get();
    $dataSPIP4 = DB::table('pencapaian_tujuan')
                    ->whereIn('id', [15])->orderBy('id', 'asc')->get();

    return view('content.admin.admin', compact('dataPT', 'dataSP', 'dataSPIP1', 'dataSPIP2', 'dataSPIP3', 'dataSPIP4', 'tahun', 'bulan'));
  }


  //Edit Skor
  public function editskorPT()
  {
    $dataPT =  DB::table('penetapan_tujuan')->orderBy('id', 'asc')->get();

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
    DB::table('penetapan_tujuan')->whereId($id)->update((array) $dataSP);
    return response()->json(['message' => 'Data skor berhasil disimpan']);
  }


public function submitskorSPIP(Request $request, $id)
{
    $dataSPIP = DB::table('pencapaian_tujuan')->find($id);
    $dataSPIP->skor = $request->skor;
    DB::table('pencapaian_tujuan')->whereId($id)->update((array) $dataSPIP);
    return response()->json(['message' => 'Data skor berhasil disimpan']);
}


public function getMonthsByYear($year) {
  $months = DB::table('bulan')
      ->where('tahun_id', $year)  // Pastikan kolom ini sesuai dengan skema database
      ->pluck('bulan');  // Atau ganti dengan nama kolom bulan jika berbeda
  return response()->json($months);
}


}
