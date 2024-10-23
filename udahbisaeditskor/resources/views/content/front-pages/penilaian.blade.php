@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/LayoutMaster')

@section('title', 'Dashboard - SPIP')

@section('vendor-style')
@vite([
  'resources/assets/vendor/libs/apex-charts/apex-charts.scss'
])
@endsection

@section('vendor-script')
@vite([
  'resources/assets/vendor/libs/apex-charts/apexcharts.js'
])
@endsection

@section('page-script')
@vite([
  'resources/assets/js/userchart.js'
])
@endsection

@section('content')
<section class="section-py bg-body first-section-pt">
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
                  <h5 class="mb-1 text-nowrap">Penetapan Tujuan</h5>
                  <small>Nilai Komponen</small>
                  <h5>2.0</h5>
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
@endsection
