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
      <div class="col-lg-3 col-12 action-table">
        {{-- <button class="btn btn-warning w-40"> --}}
          <a href="{{ route('admin-editskorPT') }}" class="btn btn-warning w-40"><i class="ti ti-pencil ti-xs me-2"></i>Edit Skor</a>
        {{-- </button> --}}
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
      <div class="col-lg-3 col-12 action-table">
        <button class="btn btn-warning w-40">
          <span class="d-flex align-items-center justify-content-center text-nowrap"><i class="ti ti-pencil ti-xs me-2"></i>Edit Skor</span>
        </button>
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
              <th>1</th>
              <th>Akmal</th>
              <th>akmal140</th>
              <th>28-01-04</th>
              <th>5</th>
              <th>Active</th>
              <th>True</th>
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <div class="tab-pane fade" id="navs-profit-id" role="tabpanel">
      <div class="col-lg-3 col-12 action-table">
          <a href="{{ route('admin-editskorSPIP') }}" class="btn btn-warning w-40"><i class="ti ti-pencil ti-xs me-2"></i>Edit Skor</a>
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
              @foreach ($dataSPIP as $dSPIP)
                <tr>
                  <th>{{ $dSPIP->unsur }}</th>
                  <th>{{ $dSPIP->skor }}</th>
                  <th>{{ 'bobot unsur' }}</th>
                  <th>{{ 'bobot komponen' }}</th>
                  <th>{{ $dSPIP->nilai_unsur }}</th>
                  <th>{{ $dSPIP->nilai_komponen }}</th>
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

@endsection
