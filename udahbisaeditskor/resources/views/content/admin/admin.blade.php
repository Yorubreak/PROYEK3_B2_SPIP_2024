@extends('layouts/layoutMaster')

@section('title', 'Academy Dashboard - Apps')

@section('vendor-style')
@vite([
  'resources/assets/vendor/libs/datatables-fixedcolumns-bs5/fixedcolumns.bootstrap5.scss',
  'resources/assets/vendor/libs/datatables-fixedheader-bs5/fixedheader.bootstrap5.scss'
  ])
@endsection

@section('vendor-script')
@vite([
  'resources/assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js'
  ])
@endsection

@section('page-script')
@vite([
'resources/assets/js/app-academy-dashboard.js',
'resources/assets/js/tables-datatables-extensions.js'
])
@endsection


@section('content')

<div class="card-body">
  <div class="card-body row p-0 pb-3">
    <div class="col-12 col-md-8 card-separator">
      <h3>Welcome back, Akmal 👋🏻 </h3>
      <div class="col-12 col-lg-8">
        <p>Your progress this week is Awesome. let's keep it up and get a lot of points reward !</p>
      </div>
    </div>
  </div>
  <ul class="nav nav-tabs widget-nav-tabs pb-3 gap-4 mx-1 d-flex flex-nowrap" role="tablist">
    <li class="nav-item">
      <a href="javascript:void(0);" class="nav-link btn active d-flex flex-column align-items-center justify-content-center" role="tab" data-bs-toggle="tab" data-bs-target="#navs-orders-id" aria-controls="navs-orders-id" aria-selected="true">
        <div class="badge bg-label-secondary rounded p-2"><i class="ti ti-shopping-cart ti-sm"></i></div>
        <h6 class="tab-widget-title mb-0 mt-2">PT</h6>
      </a>
    </li>
    <li class="nav-item">
      <a href="javascript:void(0);" class="nav-link btn d-flex flex-column align-items-center justify-content-center" role="tab" data-bs-toggle="tab" data-bs-target="#navs-sales-id" aria-controls="navs-sales-id" aria-selected="false">
        <div class="badge bg-label-secondary rounded p-2"><i class="ti ti-chart-bar ti-sm"></i></div>
        <h6 class="tab-widget-title mb-0 mt-2"> S&P</h6>
      </a>
    </li>
    <li class="nav-item">
      <a href="javascript:void(0);" class="nav-link btn d-flex flex-column align-items-center justify-content-center" role="tab" data-bs-toggle="tab" data-bs-target="#navs-profit-id" aria-controls="navs-profit-id" aria-selected="false">
        <div class="badge bg-label-secondary rounded p-2"><i class="ti ti-currency-dollar ti-sm"></i></div>
        <h6 class="tab-widget-title mb-0 mt-2">PTSPIP</h6>
      </a>
    </li>
  </ul>


  <div class="tab-content p-0 ms-0 ms-sm-2">
    <div class="tab-pane fade show active" id="navs-orders-id" role="tabpanel">
      <div class="col-lg-3 col-12 action-table d-flex align-items-center justify-content-start gap-1">
        {{-- <button class="btn btn-warning w-40"> --}}
          <a href="{{ route('admin.editskorPT') }}" class="btn btn-warning"><i class="ti ti-pencil ti-xs me-2"></i>Edit Skor</a>
        {{-- </button> --}}
        <div class="dropdown">
          <button type="button" class="btn btn-label-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" id="dropdownTahun">2023</button>
          <ul class="dropdown-menu">
            {{-- onclick="updateTahun('{{ $thn->tahun }}')" --}}
              @foreach ($tahun as $thn)
                  <li><a class="dropdown-item" href="javascript:void(0);" >{{ $thn->tahun }}</a></li>
              @endforeach
          </ul>
        </div>

        <div class="dropdown">
          <button type="button" class="btn btn-label-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" id="dropdownBulan">January</button>
          <ul class="dropdown-menu dropdown-menu-bulan">
              {{-- <!-- Bulan akan diisi dinamis oleh JavaScript onclick="updateTahun('{{ $bln->bulan }}')"--> --}}
              @foreach ($bulan as $bln)
              <li><a class="dropdown-item" href="javascript:void(0);" >{{ $bln->bulan }}</a></li>
              @endforeach
          </ul>
        </div>
      </div>
      <div class="card">
        <h5 class="card-header">Penetapan Tujuan</h5>
        <div class="card-datatable table-responsive">
          <table class="dt-fixedheader table">
            <thead>
              @php
                  $pembagi = 100;
              @endphp
              <tr>
                <th>komponen</th>
                <th>skor</th>
                <th>bobot unsur</th>
                <th>bobot komponen</th>
                <th>nilai unsur</th>
                <th>nilai komponen</th>
                <th>nilai akhir</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($dataPT as $dPT)
                <tr>
                  <th>{{ $dPT->unsur }}</th>
                  <th>{{ $dPT->skor }}</th>
                  <th>{{ 'bobot unsur' }}</th>
                  <th>{{ 'bobot komponen' }}</th>
                  <th>{{ $dPT->nilai_unsur }}</th>
                  <th>{{ $dPT->nilai_komponen }}</th>
                  <th>{{ 'True' }}</th>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <div class="tab-pane fade" id="navs-sales-id" role="tabpanel">
      <div class="col-lg-3 col-12 action-table d-flex align-items-center justify-content-start gap-1">
        {{-- <button class="btn btn-warning w-40"> --}}
          <a href="{{ route('admin.editskorPT') }}" class="btn btn-warning"><i class="ti ti-pencil ti-xs me-2"></i>Edit Skor</a>
        {{-- </button> --}}
        <div class="dropdown">
          <button type="button" class="btn btn-label-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">2023</button>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="javascript:void(0);">2024</a></li>
            <li><a class="dropdown-item" href="javascript:void(0);">2025</a></li>
            <li><a class="dropdown-item" href="javascript:void(0);">2026</a></li>
            <li><a class="dropdown-item" href="javascript:void(0);">2027</a></li>
            <li><a class="dropdown-item" href="javascript:void(0);">2028</a></li>
            <li><a class="dropdown-item" href="javascript:void(0);">2029</a></li>
            <li><a class="dropdown-item" href="javascript:void(0);">2030</a></li>
          </ul>
        </div>

        <div class="dropdown">
          <button type="button" class="btn btn-label-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">January</button>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="javascript:void(0);">January</a></li>
            <li><a class="dropdown-item" href="javascript:void(0);">February</a></li>
            <li><a class="dropdown-item" href="javascript:void(0);">March</a></li>
            <li><a class="dropdown-item" href="javascript:void(0);">April</a></li>
            <li><a class="dropdown-item" href="javascript:void(0);">May</a></li>
            <li><a class="dropdown-item" href="javascript:void(0);">June</a></li>
            <li><a class="dropdown-item" href="javascript:void(0);">July</a></li>
            <li><a class="dropdown-item" href="javascript:void(0);">August</a></li>
            <li><a class="dropdown-item" href="javascript:void(0);">September</a></li>
            <li><a class="dropdown-item" href="javascript:void(0);">October</a></li>
            <li><a class="dropdown-item" href="javascript:void(0);">November</a></li>
            <li><a class="dropdown-item" href="javascript:void(0);">December</a></li>
          </ul>
        </div>
      </div>
      <div class="card">
        <h5 class="card-header">Fixed Header</h5>
        <div class="card-datatable table-responsive">
          <table class="dt-fixedheader table">
            <thead>
              @php
                  $pembagi = 100;
              @endphp
              <tr>
                <th>komponen</th>
                <th>skor</th>
                <th>bobot unsur</th>
                <th>bobot komponen</th>
                <th>nilai unsur</th>
                <th>nilai komponen</th>
                <th>nilai akhir</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($dataSP as $dSP)
                <tr>
                  <th>{{ $dSP->unsur }}</th>
                  <th>{{ $dSP->skor }}</th>
                  <th>{{ 'bobot unsur' }}</th>
                  <th>{{ 'bobot komponen' }}</th>
                  <th>{{ $dSP->nilai_unsur }}</th>
                  <th>{{ $dSP->nilai_komponen }}</th>
                  <th>{{ 'True' }}</th>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <div class="tab-pane fade" id="navs-profit-id" role="tabpanel">
      <div class="col-lg-3 col-12 action-table d-flex align-items-center justify-content-start gap-1">
        {{-- <button class="btn btn-warning w-40"> --}}
          <a href="{{ route('admin.editskorPT') }}" class="btn btn-warning"><i class="ti ti-pencil ti-xs me-2"></i>Edit Skor</a>
        {{-- </button> --}}
        <div class="dropdown">
          <button type="button" class="btn btn-label-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">2023</button>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="javascript:void(0);">2024</a></li>
            <li><a class="dropdown-item" href="javascript:void(0);">2025</a></li>
            <li><a class="dropdown-item" href="javascript:void(0);">2026</a></li>
            <li><a class="dropdown-item" href="javascript:void(0);">2027</a></li>
            <li><a class="dropdown-item" href="javascript:void(0);">2028</a></li>
            <li><a class="dropdown-item" href="javascript:void(0);">2029</a></li>
            <li><a class="dropdown-item" href="javascript:void(0);">2030</a></li>
          </ul>
        </div>

        <div class="dropdown">
          <button type="button" class="btn btn-label-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">January</button>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="javascript:void(0);">January</a></li>
            <li><a class="dropdown-item" href="javascript:void(0);">February</a></li>
            <li><a class="dropdown-item" href="javascript:void(0);">March</a></li>
            <li><a class="dropdown-item" href="javascript:void(0);">April</a></li>
            <li><a class="dropdown-item" href="javascript:void(0);">May</a></li>
            <li><a class="dropdown-item" href="javascript:void(0);">June</a></li>
            <li><a class="dropdown-item" href="javascript:void(0);">July</a></li>
            <li><a class="dropdown-item" href="javascript:void(0);">August</a></li>
            <li><a class="dropdown-item" href="javascript:void(0);">September</a></li>
            <li><a class="dropdown-item" href="javascript:void(0);">October</a></li>
            <li><a class="dropdown-item" href="javascript:void(0);">November</a></li>
            <li><a class="dropdown-item" href="javascript:void(0);">December</a></li>
          </ul>
        </div>
      </div>
      <div class="card">
        <h5 class="card-header">Fixed Header</h5>
        <div class="card-datatable table-responsive">
          <table class="dt-fixedheader table">
            <thead>
              @php
                  $pembagi = 100;
              @endphp
              <tr>
                <th>komponen</th>
                <th>skor</th>
                <th>bobot unsur</th>
                <th>bobot komponen</th>
                <th>nilai unsur</th>
                <th>nilai komponen</th>
                <th>nilai akhir</th>
              </tr>
            </thead>
            <tbody>
              {{-- efektivitas --}}
              <tr>
                <th colspan="7">
                    <strong>{{ 'Efektivitas dan Efisiensi' }}</strong>
                </th>
              </tr>
              @foreach ($dataSPIP1 as $dSPIP1)
                <tr>
                  <th>{{  $dSPIP1->unsur }}</th>
                  <th>{{ $dSPIP1->skor }}</th>
                  <th>{{ 'bobot unsur' }}</th>
                  <th>{{ 'bobot komponen' }}</th>
                  <th>{{ $dSPIP1->nilai_unsur }}</th>
                  <th>{{ $dSPIP1->nilai_komponen }}</th>
                  <th>{{ 'True' }}</th>
                </tr>
              @endforeach
              {{-- kendala laporan --}}
              <tr>
                <th colspan="7">
                    <strong>{{ 'Keandalan Laporan Keuangan' }}</strong>
                </th>
              </tr>
              @foreach ($dataSPIP2 as $dSPIP2)
                <tr>
                  <th>{{ $dSPIP2->unsur }}</th>
                  <th>{{ $dSPIP2->skor }}</th>
                  <th>{{ 'bobot unsur' }}</th>
                  <th>{{ 'bobot komponen' }}</th>
                  <th>{{ $dSPIP2->nilai_unsur }}</th>
                  <th>{{ $dSPIP2->nilai_komponen }}</th>
                  <th>{{ 'True' }}</th>
                </tr>
              @endforeach
              {{-- pengamanan aset --}}
              <tr>
                <th colspan="7">
                    <strong>{{ 'Pengamanan atas Aset' }}</strong>
                </th>
              </tr>
              @foreach ($dataSPIP3 as $dSPIP3)
                <tr>
                  <th>{{ $dSPIP3->unsur }}</th>
                  <th>{{ $dSPIP3->skor }}</th>
                  <th>{{ 'bobot unsur' }}</th>
                  <th>{{ 'bobot komponen' }}</th>
                  <th>{{ $dSPIP3->nilai_unsur }}</th>
                  <th>{{ $dSPIP3->nilai_komponen }}</th>
                  <th>{{ 'True' }}</th>
                </tr>
              @endforeach
              {{-- ketaatan pada peraturan --}}
              <tr>
                <th colspan="7" >
                    <strong>{{ 'Ketaatan pada Peraturan' }}</strong>
                </th>
              </tr>
              @foreach ($dataSPIP4 as $dSPIP4)
                <tr>
                  <th>{{ $dSPIP4->unsur }}</th>
                  <th>{{ $dSPIP4->skor }}</th>
                  <th>{{ 'bobot unsur' }}</th>
                  <th>{{ 'bobot komponen' }}</th>
                  <th>{{ $dSPIP4->nilai_unsur }}</th>
                  <th>{{ $dSPIP4->nilai_komponen }}</th>
                  <th>{{ 'True' }}</th>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
      var selectedTahun = 2023;  // Set default tahun
      var selectedBulan = 1;     // Set default bulan (misalkan Januari)

      function updateTahun(tahun) {
        selectedTahun = tahun;
        $('#dropdownTahun').text(tahun);  // Menampilkan tahun yang dipilih di dropdown

        // AJAX untuk mengambil data bulan sesuai tahun yang dipilih
        $.ajax({
            url: `/getMonthsByYear/${tahun}`,  // Endpoint untuk mendapatkan bulan
            method: 'GET',
            success: function (data) {
                $('#dropdownBulan').text('Pilih Bulan');  // Reset tampilan teks bulan
                const bulanMenu = $('.dropdown-menu-bulan');  // Pastikan ini selector ke dropdown bulan
                bulanMenu.empty();  // Kosongkan dropdown bulan

                // Loop untuk menambahkan bulan ke dalam dropdown
                data.forEach(function(bulan) {
                    bulanMenu.append(`
                        <li>
                            <a class="dropdown-item" href="javascript:void(0);" onclick="updateBulan('${bulan}')">${bulan}</a>
                        </li>
                    `);
                });
            },
            error: function() {
                alert('Gagal mengambil data bulan.');
            }
        });
      }

      function updateBulan(bulan) {
          selectedBulan = bulan;
          $('#dropdownBulan').text(bulan);
          fetchData();
      }


</script>
@endsection
