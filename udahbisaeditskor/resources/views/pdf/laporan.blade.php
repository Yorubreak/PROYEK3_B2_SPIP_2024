<!DOCTYPE html>
<html>
<head>
    <title>Laporan Komponen</title>
    <style>
        body { font-family: Arial, sans-serif; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h1>Laporan Komponen</h1>
    <p>Periode: {{ $bulan}} - Tahun: {{ $tahun}}</p>

    <table class="table table-bordered table-striped">
      <thead>
          <tr>
              <th style="text-align: center;" rowspan="2" class="text-center align-middle"><strong>Elemen, Unsur, dan Sub Unsur Result-Based SPIP</strong></th>
              <th style="text-align: center;" rowspan="2" class="text-center align-middle"><strong>Skor</strong></th>
              <th style="text-align: center;" rowspan="2" class="text-center align-middle"><strong>Bobot Unsur</strong></th>
              <th style="text-align: center;" rowspan="2" class="text-center align-middle"><strong>Bobot Komponen</strong></th>
              <th style="text-align: center;" colspan="2" class="text-center align-middle"><strong>Penilaian</strong></th>
          </tr>

          <tr>
              <th style="text-align: center;" ><strong>Nilai Unsur</strong></th>
              <th style="text-align: center;" ><strong>Nilai Komponen</strong></th>
          </tr>
      </thead>
      <tbody >
        @foreach ($elemen as $elm)
            <tr>
                <td colspan="6" style="background-color: green"><strong>{{ $elm->nama_komponen }}</strong></td>
            </tr>
            @foreach ($unsur->where('kom_id_komponen', $elm->id_komponen) as $uns)
              @if ($uns->has_child == true)
                <tr>
                  <td colspan="6"><strong>&nbsp;&nbsp;&nbsp;{{ $uns->nama_komponen }}</strong></td>
                </tr>
              @else
                <tr>
                  <td><strong>&nbsp;&nbsp;&nbsp;{{ $uns->nama_komponen }}</strong></td>
                  <td style="text-align: center;">{{ $uns->skor }}</td>
                  <td style="text-align: center;" >{{ $uns->bobot_unsur*100 }}</td>
                  <td style="text-align: center;" >{{ $uns->bobot_komponen*100 }}</td>
                  <td style="text-align: center;" >{{ $uns->nilai_unsur }}</td>
                  <td style="text-align: center;" >{{ $uns->nilai_komponen }}</td>
                </tr>
              @endif
              @foreach ($subunsur->where('kom_id_komponen', $uns->id_komponen) as $sub)
                <tr>
                  <td><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $sub->nama_komponen }}</strong></td>
                  <td style="text-align: center;" >{{ $sub->skor }}</td>
                  <td style="text-align: center;" >{{ $sub->bobot_unsur*100 }}</td>
                  <td style="text-align: center;" >{{ $sub->bobot_komponen*100 }}</td>
                  <td style="text-align: center;" >{{ $sub->nilai_unsur }}</td>
                  <td style="text-align: center;" >{{ $sub->nilai_komponen }}</td>
                </tr>
              @endforeach
            @endforeach
          @endforeach
      </tbody>
  </table>
</body>
</html>
