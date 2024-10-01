@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutFront')

@section('title', 'Landing - Front Pages')

<!-- Vendor Styles -->
@section('vendor-style')
@vite([
  'resources/assets/vendor/libs/nouislider/nouislider.scss',
  'resources/assets/vendor/libs/apex-charts/apex-charts.scss',
  'resources/assets/vendor/libs/swiper/swiper.scss'
])
@endsection

<!-- Page Styles -->
@section('page-style')
@vite(['resources/assets/vendor/scss/pages/front-page-landing.scss'])
@endsection

<!-- Vendor Scripts -->
@section('vendor-script')
@vite([
  'resources/assets/vendor/libs/nouislider/nouislider.js',
  'resources/assets/vendor/libs/apex-charts/apexcharts.js',
  'resources/assets/vendor/libs/swiper/swiper.js'
])
@endsection

<!-- Page Scripts -->
@section('page-script')
@vite(['resources/assets/js/front-page-landing.js',
'resources/assets/js/userchart.js',
'resources/assets/js/landing.js'])
@endsection

@section('content')
<div data-bs-spy="scroll" class="scrollspy-example">
  <section id="graph">
    <div class="container">
      <div class="row justify-content-center">
        <!-- Donut Chart1 -->
        <div class="col-md-6 col-12 mb-4">
          <div class="card">
            <div class="card-header d-flex align-items-center justify-content-center">
              <div class="text-center">
                <h5 class="card-title mb-0">Bobot Komponen</h5>
                <small class="text-muted">Bobot Untuk Setiap Komponen</small>
              </div>
            </div>
            <div class="card-body">
              <div id="bobotKomponenChart"></div>
            </div>
          </div>
        </div>
        <!-- /Donut Chart1 -->

        <!-- Donut Chart2 -->
        <div class="col-md-6 col-12 mb-4">
          <div class="card">
            <div class="card-header d-flex align-items-center justify-content-center">
              <div class="text-center">
                <h5 class="card-title mb-0">Nilai Maturitas</h5>
              </div>
            </div>
            <div class="card-body">
              <div id="nilaiMaturitasChart"></div>
            </div>
          </div>
        </div>
        <!-- /Donut Chart2 -->
      </div>
    </div>

    <div class="container">
      <div class="row justify-content-center">
        <!-- Generated Leads 1 -->
        <div class="col-md-4 mb-4">
          <div class="card">
            <div class="card-body">
              <div class="d-flex justify-content-between">
                <div class="d-flex flex-column">
                  <div class="card-title mb-auto">
                    <h5 class="mb-1 text-nowrap">Generated Leads</h5>
                    <small>Monthly Report</small>
                  </div>
                </div>
                <div id="generatedLeadsChart1"></div>
              </div>
            </div>
          </div>
        </div>
        <!-- /Generated Leads 1 -->

        <!-- Generated Leads 2 -->
        <div class="col-md-4 mb-4">
          <div class="card">
            <div class="card-body">
              <div class="d-flex justify-content-between">
                <div class="d-flex flex-column">
                  <div class="card-title mb-auto">
                    <h5 class="mb-1 text-nowrap">Generated Leads</h5>
                    <small>Monthly Report</small>
                  </div>
                </div>
                <div id="generatedLeadsChart2"></div>
              </div>
            </div>
          </div>
        </div>
        <!-- /Generated Leads 2 -->

        <!-- Generated Leads 3 -->
        <div class="col-md-4 mb-4">
          <div class="card">
            <div class="card-body">
              <div class="d-flex justify-content-between">
                <div class="d-flex flex-column">
                  <div class="card-title mb-auto">
                    <h5 class="mb-1 text-nowrap">Generated Leads</h5>
                    <small>Monthly Report</small>
                  </div>
                </div>
                <div id="generatedLeadsChart3"></div>
              </div>
            </div>
          </div>
        </div>
        <!-- /Generated Leads 3 -->
      </div>
    </div>
  </section>
</div>
@endsection