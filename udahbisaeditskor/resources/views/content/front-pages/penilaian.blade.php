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
@vite([ 'resources/assets/js/charts-apex.js'])
@vite([ 'resources/assets/js/app-ecommerce-dashboard.js'])

<script>
  document.addEventListener('DOMContentLoaded', function () {
    // Data dan konfigurasi untuk beberapa donut chart
    const nakom = @json($namaKomponen);
    const bokom = @json($bobotKomponen);
    const nilaimaturitas = @json($totalNilaiKomponen);
    const chartsData = [
      {
        elementId: 'donutChart1', // ID untuk elemen chart pertama
        labels: nakom,
        series: bokom,
        colors: ['#fee802', '#826bf8', '#FFAF00'],
        show: true,
        dataLabels: true,
        tooltip: true,
        states: 'lighten',
        persen: '%'
      },
      {
        elementId: 'donutChart2', // ID untuk elemen chart kedua
        labels: ['Nilai Maturitas'],
        series: [nilaimaturitas, 5 - nilaimaturitas],
        colors: ['#fee200', '#fbfcd9'],
        show: false,
        dataLabels: false,
        tooltip: false,
        states: 'none',
        persen: ''
      },
    ];



    // Perulangan untuk membuat donut chart berdasarkan data
    chartsData.forEach(function (chartData) {
      const donutChartEl = document.querySelector(`#${chartData.elementId}`);

      if (donutChartEl) {
        const donutChartConfig = {
          chart: {
            height: 390,
            width : 500,
            type: 'donut',
          },
          labels: chartData.labels, // Menggunakan data labels dari array
          series: chartData.series, // Menggunakan data series dari array
          colors: chartData.colors, // Menggunakan data colors dari array
          stroke: { show: false },
          dataLabels: {
            enabled: chartData.dataLabels,
            formatter: function (val) {
              return parseInt(val, 10) + '%';
            },
          },
          legend: {
            show: chartData.show,
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
                      return chartData.series[0] + chartData.persen; // Menampilkan persentase pertama sebagai total
                    },
                  },
                },
              },
            },
          },
          tooltip: {
            enabled: chartData.tooltip, // Menonaktifkan tooltip saat hover
          },
          states: {
            hover: {
              filter: {
                type: chartData.states, // Nonaktifkan efek hover
              },
            },
          },

        };

        // Render chart jika elemen ditemukan
        const donutChart = new ApexCharts(donutChartEl, donutChartConfig);
        donutChart.render();
      }
    });


  });

  document.addEventListener('DOMContentLoaded', function(){
    const nikom = @json($nilaiKomponen)

    const generateLeads = [
      {
        elementId: 'generateLead1',
        labels:['PT'],
        series:[nikom[0], 5 - nikom[0]],
        colors:['#fee802','#fbfcd9'],
      },
      {
        elementId: 'generateLead2',
        labels:['SP'],
        series:[nikom[1], 5 - nikom[1]],
        colors:['#9747FF','#e9dff7'],
      },
      {
        elementId: 'generateLead3',
        labels:['PTSPIP'],
        series:[nikom[2], 5 - nikom[2]],
        colors:['#ffaf00','#fff2d6'],
      }
    ]

    generateLeads.forEach(function (generateLead) {
      const generateLeadEl = document.querySelector(`#${generateLead.elementId}`);

      if (generateLeadEl) {
        const genLeadconfigs = {
          chart: {
            height: 140,
            width : 137,
            type: 'donut',
          },
          labels: generateLead.labels, // Menggunakan data labels dari array
          series: generateLead.series, // Menggunakan data series dari array
          colors: generateLead.colors, // Menggunakan data colors dari array
          stroke: { show: false },
          dataLabels: {
            enabled: generateLead.dataLabels,
            formatter: function (val) {
              return parseInt(val, 10) + '%';
            },
          },
          legend: {
            show: generateLead.show,
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
                    fontSize: '1rem',
                    fontFamily: 'Public Sans',
                  },
                  value: {
                    fontSize: '0.8rem',
                    color: '#8c8c8c',
                    fontFamily: 'Public Sans',
                    formatter: function (val) {
                      return parseInt(val, 10);
                    },
                  },
                  total: {
                    show: true,
                    fontSize: '0.8rem',
                    color: '#333',
                    label: generateLead.labels[0], // Tampilkan label pertama sebagai total
                    formatter: function () {
                      return generateLead.series[0]; // Menampilkan persentase pertama sebagai total
                    },
                  },
                },
              },
            },
          },
          tooltip: {
            enabled: generateLead.tooltip, // Menonaktifkan tooltip saat hover
          },
          states: {
            hover: {
              filter: {
                type: generateLead.states, // Nonaktifkan efek hover
              },
            },
          },

        };

        // Render chart jika elemen ditemukan
        const genLead = new ApexCharts(generateLeadEl, genLeadconfigs);
        genLead.render();
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
        <div class="card" style="height: 480px">
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
          <a href="{{url('/penilaian/viewuserpenetapan')}}">
          <div class="card">
            <div class="card-body">
              <div class="d-flex justify-content-between">
                <div class="d-flex flex-column">
                  <div class="card-title mb-auto">
                    <h5 class="mb-1 text-nowrap">Penetapan Tujuan</h5>
                    <small>Nilai Komponen</small>
                  </div>
                </div>
                <div id="generateLead1" style="margin-right: 20px"></div>
              </div>
            </div>
          </div>
          </a>
        </div>
        <!-- /Generated Leads 1 -->

        <!-- Generated Leads 2 -->
        <div class="col-md-4 mb-4">
          <a href="{{url('viewuser')}}">
          <div class="card">
            <div class="card-body">
              <div class="d-flex justify-content-between">
                <div class="d-flex flex-column">
                  <div class="card-title mb-auto">
                    <h5 class="mb-1 text-nowrap">Struktur dan Proses</h5>
                    <small>Nilai Komponen</small>
                  </div>
                </div>
                <div id="generateLead2" style="margin-right: 20px"></div>
              </div>
            </div>
          </div>
          </a>
        </div>
        <!-- /Generated Leads 2 -->

        <!-- Generated Leads 3 -->
        <div class="col-md-4 mb-4">
          <div class="card">
            <div class="card-body">
              <div class="d-flex justify-content-between">
                <div class="d-flex flex-column">
                  <div class="card-title mb-auto">
                    <h5 class="mb-1 text-nowrap">Pencapaian Tujuan</h5>
                    <small>Nilai Komponen</small>
                  </div>
                </div>
                <div id="generateLead3"style="margin-right: 20px"></div>
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
