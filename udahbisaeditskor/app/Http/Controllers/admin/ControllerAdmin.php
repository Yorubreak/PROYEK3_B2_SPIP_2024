<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;

class ControllerAdmin extends Controller
{
  public function index()
  {

    $dataPT =  DB::table('penetapan_tujuan')->orderBy('id', 'asc')->get();
    $dataSP =  DB::table('struktur_proses')->orderBy('id', 'asc')->get();
    $dataSPIP = DB::table('pencapaian_tujuan')->orderBy('id', 'asc')->get();

    return view('content.admin.admin', compact('dataPT', 'dataSP', 'dataSPIP'));
  }

  public function editskorPT()
  {
    $dataPT =  DB::table('penetapan_tujuan')->orderBy('id', 'asc')->get();

    return view('content.admin.editskorPT', compact('dataPT'));
  }

  public function editskorSPIP()
  {
    $dataSPIP = DB::table('pencapaian_tujuan')->orderBy('id', 'asc')->get();


    return view('content.admin.editskorSPIP', compact('dataSPIP'));
  }

  public function submitskorPT(Request $request, $id)
{
    // Ambil data berdasarkan ID
    $dataPT = DB::table('penetapan_tujuan')->find($id);

    // Ubah object menjadi array
    $dataPen = (array) $dataPT;

    // Update field skor
    $dataPen['skor'] = $request->skor;

    // Update data di database
    DB::table('penetapan_tujuan')->whereId($id)->update($dataPen);

    // Mengembalikan response JSON setelah sukses menyimpan
    return response()->json(['message' => 'Data skor berhasil disimpan']);
}

public function submitskorSPIP(Request $request, $id)
{
    // Ambil data berdasarkan ID
    $dataSPIP = DB::table('pencapaian_tujuan')->find($id);

    // Ubah object menjadi array
    $dSPIP = (array) $dataSPIP;

    // Update field skor
    $dSPIP['skor'] = $request->skor;

    // Update data di database
    DB::table('pencapaian_tujuan')->whereId($id)->update($dSPIP);

    // Mengembalikan response JSON setelah sukses menyimpan
    return response()->json(['message' => 'Data skor berhasil disimpan']);
}

}
