<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;

class StrukturdanProses extends Controller
{
  public function index()
  {

    $dataPT =  DB::table('penetapan_tujuan')->orderBy('id', 'asc')->get();
    $dataSP =  DB::table('struktur_proses')->orderBy('id', 'asc')->get();
    $dataSPIP = DB::table('pencapaian_tujuan')->orderBy('id', 'asc')->get();

    return view('content.admin.admin', compact('dataPT', 'dataSP', 'dataSPIP'));
  }

  public function editskor()
  {
    $dataPT =  DB::table('penetapan_tujuan')->orderBy('id', 'asc')->get();
    $dataSP =  DB::table('struktur_proses')->orderBy('id', 'asc')->get();
    $dataSPIP = DB::table('pencapaian_tujuan')->orderBy('id', 'asc')->get();


    return view('content.admin.editskor', compact('dataPT', 'dataSP', 'dataSPIP'));
  }


  public function submitskor(Request $request, $id)
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


}
