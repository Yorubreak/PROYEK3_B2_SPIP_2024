<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Komponen;
use App\Models\Periode;
use Barryvdh\DomPDF\Facade\Pdf;

class ControllerAdmin extends Controller
{
public function index()
{
    // Retrieve 'Elemen' type components
    $elemen = Komponen::where('tipe_komponen', 'Elemen')
                    ->orderBy('id_komponen', 'asc')
                    ->get();

    // Retrieve 'Unsur' type components where kom_id_komponen matches the id_komponen of the elemen
    $unsur = Komponen::where('tipe_komponen', 'Unsur')
                    ->whereIn('kom_id_komponen', $elemen->pluck('id_komponen'))
                    ->orderBy('id_komponen', 'asc')
                    ->get();

    // Retrieve 'Sub Unsur' type components where kom_id_komponen matches the id_komponen of the unsur
    $subunsur = Komponen::where('tipe_komponen', 'Sub Unsur')
                        ->whereIn('kom_id_komponen', $unsur->pluck('id_komponen'))
                        ->orderBy('id_komponen', 'asc')
                        ->get();

    $bulan = Periode::distinct()->pluck('bulan');
    $tahun = Periode::distinct()->orderby('tahun', 'asc')->pluck('tahun');

    // Return the data to the view
    return view('content.admin.nyobapace', compact('elemen', 'unsur', 'subunsur', 'tahun', 'bulan'));
}

public function generatePdf($tahun, $bulan)
    {
        // Mengambil data dari database
        $elemen = Komponen::where('tipe_komponen', 'Elemen')
                    ->whereIn('tahun', [$tahun])
                    ->whereIn('bulan', [$bulan])
                    ->orderBy('id_komponen', 'asc')
                    ->get();

        // Mengambil komponen bertipe 'Unsur' dengan filter id_komponen dari elemen
        $unsur = Komponen::where('tipe_komponen', 'Unsur')
                        ->whereIn('tahun', [$tahun])
                        ->whereIn('bulan', [$bulan])
                        ->whereIn('kom_id_komponen', $elemen->pluck('id_komponen'))
                        ->orderBy('id_komponen', 'asc')
                        ->get();

        // Mengambil komponen bertipe 'Sub Unsur' dengan filter id_komponen dari unsur
        $subunsur = Komponen::where('tipe_komponen', 'Sub Unsur')
                            ->whereIn('tahun', [$tahun])
                            ->whereIn('bulan', [$bulan])
                            ->whereIn('kom_id_komponen', $unsur->pluck('id_komponen'))
                            ->orderBy('id_komponen', 'asc')
                            ->get();

        // Mengambil bulan dan tahun unik dari tabel Periode

        // Data yang akan diteruskan ke view
        $data = [
            'elemen' => $elemen,
            'unsur' => $unsur,
            'subunsur' => $subunsur,
            'bulan' => $bulan,
            'tahun' => $tahun,
        ];

        // Load view dengan data
        $pdf = Pdf::loadView('pdf.laporan', $data)
                ->setPaper('a4', 'landscape'); // Set ukuran dan orientasi kertas


        // Unduh PDF langsung
        return $pdf->download('Laporan ' . $tahun. ' - ' . $bulan . '.pdf');

        // Atau tampilkan di browser
        // return $pdf->stream('laporan.pdf');
    }

public function getBulanByTahunId($tahun)
{
    // Daftar nama bulan dalam urutan kalender

    // Query untuk mengambil bulan berdasarkan tahun dan urutkan sesuai dengan $bulanOrder
    $bulan = Periode::where('tahun', $tahun)->orderby('no_bln', 'asc')->pluck('bulan');

    return response()->json($bulan);
}


  //Edit Skor
  public function editskor($bulan, $tahun)
  {
    $elmn = Komponen::where('tipe_komponen', 'Elemen')
                  ->whereIn('tahun', [$tahun])
                  ->whereIn('bulan', [$bulan])
                  ->orderby('id_komponen', 'asc')
                  ->get();

    // Retrieve 'Unsur' type components where kom_id_komponen matches the id_komponen of the elemen
    $unsr = Komponen::where('tipe_komponen', 'Unsur')
                    ->whereIn('kom_id_komponen', $elmn->pluck('id_komponen'))
                    ->whereIn('tahun', [$tahun])
                    ->whereIn('bulan', [$bulan])
                    ->orderby('id_komponen', 'asc')
                    ->get();

    // Retrieve 'Sub Unsur' type components where kom_id_komponen matches the id_komponen of the unsur
    $subunsr = Komponen::where('tipe_komponen', 'Sub Unsur')
                        ->whereIn('kom_id_komponen', $unsr->pluck('id_komponen'))
                        ->whereIn('tahun', [$tahun])
                        ->whereIn('bulan', [$bulan])
                        ->orderby('id_komponen', 'asc')
                        ->get();

    $data = [$elmn, $unsr, $subunsr];

    return view('content.admin.editskorPT', compact('data'));
  }

  //Submit Skor (update skor ke database)
  public function submitskor(Request $request, int $id_komponen)
{
    Komponen::where('id_komponen', $id_komponen)->update(['skor' => $request->skor]);
    return response()->json(['message' => 'Data skor berhasil disimpan']);
}


  public function getDataByTahunBulan($tahun, $bulan)
{
  $elmn = Komponen::where('tipe_komponen', 'Elemen')
                  ->whereIn('tahun', [$tahun])
                  ->whereIn('bulan', [$bulan])
                  ->orderby('id_komponen', 'asc')
                  ->get();

  // Retrieve 'Unsur' type components where kom_id_komponen matches the id_komponen of the elemen
  $unsr = Komponen::where('tipe_komponen', 'Unsur')
                  ->whereIn('kom_id_komponen', $elmn->pluck('id_komponen'))
                  ->whereIn('tahun', [$tahun])
                  ->whereIn('bulan', [$bulan])
                  ->orderby('id_komponen', 'asc')
                  ->get();

  // Retrieve 'Sub Unsur' type components where kom_id_komponen matches the id_komponen of the unsur
  $subunsr = Komponen::where('tipe_komponen', 'Sub Unsur')
                      ->whereIn('kom_id_komponen', $unsr->pluck('id_komponen'))
                      ->whereIn('tahun', [$tahun])
                      ->whereIn('bulan', [$bulan])
                      ->orderby('id_komponen', 'asc')
                      ->get();

  $data = [$elmn, $unsr, $subunsr];
    return response()->json($data);
}

public function nyobapace()
{
    return view('content.admin.nyobapace');
}

}
