@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/LayoutMaster')

@section('title', 'Dashboard - SPIP')

@section('vendor-style')
@vite([ 'resources/assets/vendor/libs/apex-charts/apex-charts.scss' ])
@endsection

@section('vendor-script')
@vite([
      'resources/assets/vendor/libs/apex-charts/apexcharts.js',
      'resources/assets/js/app-ecommerce-dashboard.js'
      ])
@endsection

@section('page-script')
@vite([ 'resources/assets/js/charts-apex.js','resources/assets/js/app-ecommerce-dashboard.js' ])

<script>
  document.addEventListener('DOMContentLoaded', function () {
    // Data dan konfigurasi untuk beberapa donut chart
    const chartsData = [
      {
        elementId: 'donutChart1', // ID untuk elemen chart pertama
        labels: ['Penetapan Tujuan', 'Struktur dan Proses', 'Pencapaian Tujuan'],
        series: [35, 35, 30],
        colors: ['#fee802', '#826bf8', '#FFAF00'],
      },
      {
        elementId: 'donutChart2', // ID untuk elemen chart kedua
        labels: ['Sales'],
        series: [70],
        colors: ['#ffb74d'],
      },
    ];

    // Perulangan untuk membuat donut chart berdasarkan data
    chartsData.forEach(function (chartData) {
      const donutChartEl = document.querySelector(`#${chartData.elementId}`);

      if (donutChartEl) {
        const donutChartConfig = {
          chart: {
            height: 390,
            type: 'donut',
          },
          labels: chartData.labels, // Menggunakan data labels dari array
          series: chartData.series, // Menggunakan data series dari array
          colors: chartData.colors, // Menggunakan data colors dari array
          stroke: { show: false },
          dataLabels: {
            enabled: true,
            formatter: function (val) {
              return parseInt(val, 10) + '%';
            },
          },
          legend: {
            show: true,
            position: 'bottom',
            markers: { offsetX: -3 },
            itemMargin: {
              vertical: 3,
              horizontal: 10,
            },
            labels: {
              colors: '#8c8c8c',
              useSeriesColors: false,
            },
          },
          plotOptions: {
            pie: {
              donut: {
                labels: {
                  show: true,
                  name: {
                    fontSize: '2rem',
                    fontFamily: 'Public Sans',
                  },
                  value: {
                    fontSize: '1.2rem',
                    color: '#8c8c8c',
                    fontFamily: 'Public Sans',
                    formatter: function (val) {
                      return parseInt(val, 10) + '%';
                    },
                  },
                  total: {
                    show: true,
                    fontSize: '1rem',
                    color: '#333',
                    label: chartData.labels[0], // Tampilkan label pertama sebagai total
                    formatter: function () {
                      return chartData.series[0] + '%'; // Menampilkan persentase pertama sebagai total
                    },
                  },
                },
              },
            },
          },
        };

        // Render chart jika elemen ditemukan
        const donutChart = new ApexCharts(donutChartEl, donutChartConfig);
        donutChart.render();
      }
    });

  const chartIds = ['generatedLeadsChart1',
                    'generatedLeadsChart2',
                    'generatedLeadsChart3'];
  const chartConfig = {
    chart: {
      height: 147,
      width: 130,
      parentHeightOffset: 0,
      type: 'donut'
    },
    labels: ['Electronic', 'Sports', 'Decor', 'Fashion'],
    series: [45, 58, 30, 50],
    colors: [
      chartColors.donut.series1,
      chartColors.donut.series2,
      chartColors.donut.series3,
      chartColors.donut.series4
    ],
    stroke: { width: 0 },
    dataLabels: { enabled: false },
    legend: { show: false },
    tooltip: { theme: false },
    grid: { padding: { top: 15, right: -20, left: -20 } },
    states: { hover: { filter: { type: 'none' } } },
    plotOptions: {
      pie: {
        donut: {
          size: '70%',
          labels: {
            show: true,
            value: { fontSize: '1.375rem', fontFamily: 'Public Sans', fontWeight: 500, offsetY: -15 },
            name: { offsetY: 20 },
            total: { show: true, label: 'Total', formatter: () => '184' }
          }
        }
      }
    }
  };

  chartIds.forEach((id) => {
    const chartElement = document.querySelector(`#${id}`);
    if (chartElement) {
      const chart = new ApexCharts(chartElement, chartConfig);
      chart.render();
    }
  });

  });
</script>


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
              <div id="donutChart1"></div>
            </div>
          </div>
          <div class="card-body"></div>
        </div>
      </div>
      <!-- /Donut Chart1 -->

      <!-- Donut Chart2 -->
      <div class="col-md-6 col-12 mb-4">
        <div class="card">
            <div class="card-header d-flex align-items-center justify-content-center">
                <div class="text-center">
                    <h5 class="card-title mb-0">Nilai Maturitas</h5>
                    <div id="donutChart2"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Generated Leads Charts -->
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
                    <div id="generatedLeadsChart1"></div>
                  </div>
                </div>
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
                    <div id="generatedLeadsChart2"></div>
                  </div>
                </div>
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
  </div>
</section>
@endsection
