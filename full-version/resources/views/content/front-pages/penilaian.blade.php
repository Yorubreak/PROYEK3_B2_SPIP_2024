@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutFront')

@section('title', 'Dashboard - SPIP')

@section('vendor-style')
@vite([
  'resources/assets/vendor/libs/apex-charts/apex-charts.scss',
  'resources/assets/vendor/libs/nouislider/nouislider.scss',
  'resources/assets/vendor/libs/swiper/swiper.scss'
])
@endsection

@section('page-style')
@vite(['resources/assets/vendor/scss/pages/front-page-landing.scss'])
@endsection

@section('vendor-script')
@vite([
  'resources/assets/vendor/libs/apex-charts/apexcharts.js',
  'resources/assets/vendor/libs/nouislider/nouislider.js',
  'resources/assets/vendor/libs/swiper/swiper.js'
])
@endsection

@section('page-script')
@vite([
  'resources/assets/js/front-page-landing.js',
  'resources/assets/js/userchart.js'
])
@endsection

@section('content')
@php
    // Inisialisasi variabel $height
    $height = 500; // Atur tinggi yang diinginkan
@endphp


</nav>
<!-- / Navbar -->

<div data-bs-spy="scroll" class="scrollspy-example">
  <section id="graph">
    <div class="container mt-5">
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
              <div id="bobotKomponenChart" style="height: {{ $height }}px;"></div>
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
              <div id="nilaiMaturitasChart" style="height: {{ $height }}px;"></div>
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
                <div id="generatedLeadsChart1" style="height: {{ $height }}px;"></div>
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
                <div id="generatedLeadsChart2" style="height: {{ $height }}px;"></div>
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
                <div id="generatedLeadsChart3" style="height: {{ $height }}px;"></div>
              </div>
            </div>
          </div>
        </div>
        <!-- /Generated Leads 3 -->
      </div>
    </div>
  </section>
</div>

<!-- Footer -->
<footer class="footer bg-light">
  <div class="container-fluid d-flex flex-md-row flex-column justify-content-between align-items-md-center gap-1 container-p-x py-3">
    <div>
      <span class="footer-text fw-bold">SPIP</span> ©
    </div>
    <div>
      <a href="#" class="footer-link me-4">Demos</a>
      <a href="#" class="footer-link">Pages</a>
    </div>
  </div>
</footer>
<!-- / Footer -->
@endsection
