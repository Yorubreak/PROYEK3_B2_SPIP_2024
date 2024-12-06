@extends('layouts/LayoutMaster')

@section('vendor-style')
@vite([
  'resources/assets/vendor/libs/apex-charts/apex-charts.scss'
])
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
    document.addEventListener('DOMContentLoaded', function(){

const generateLeads = [
  {
    elementId: 'penetapanTujuan',
    labels:['Bobot Unsur'],
    series:[30,70],
    colors:['#fee802','#fbfcd9']
  }
]

generateLeads.forEach(function (generateLead) {
  const generateLeadEl = document.querySelector(`#${generateLead.elementId}`);

  if (generateLeadEl) {
    const genLeadconfigs = {
      chart: {
        height: 310,
        width : 310,
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
        position: 'middle',
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
                offsetY: -2,
                fontSize: '1rem',
                fontFamily: 'Public Sans',
              },
              value: {
                fontSize: '0.8rem',
                color: '#8c8c8c',
                fontFamily: 'Public Sans',
                offsetY: -1,
                formatter: function (val) {
                  return parseInt(val, 10) + '%';
                },
              },
              total: {
                show: true,
                position: 'top',
                fontSize: '0.8rem',
                color: '#333',
                label: generateLead.labels[0], // Tampilkan label pertama sebagai total
                formatter: function () {
                  return generateLead.series[0] + '%'; // Menampilkan persentase pertama sebagai total
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
<!-- Container utama untuk mengatur layout -->
<div class="container">

  <!-- Segment 1 - Bagian Konten Utama -->
  <section id="segment-1" class="mb-5" style="margin-top: 10%; padding-top: 20px;">
    <h2>Penetapan Tujuan</h2>

    <!-- Baris untuk card 1 dan 3 atas-bawah, dan card 2 di sebelah kanan -->
    <div class="row">
      <!-- Kolom untuk card 1 dan 3 (atas-bawah) -->
      <div class="col-md-6">
        <!-- Card pertama -->
        @foreach ($cards as $card)
        <div class="card mb-4">
          <div class="card-header">
            {{ $card['title'] }} <!-- Menampilkan judul dari card -->
          </div>
          <div class="card-body">
            <p>Skor: {{ $card['skor'] }}</p>
            <div class="progress mb-4" style="height: 8px;">
              <div class="progress-bar bg-primary" style="width: {{ $card['skor_width'] }}%" role="progressbar" aria-valuenow="{{ $card['skor_width'] }}" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <p>Nilai Unsur: {{ $card['nilai_unsur'] }}</p>
            <div class="progress" style="height: 8px;">
              <div class="progress-bar bg-warning" style="width: {{ $card['nilai_unsur_width'] }}%" role="progressbar" aria-valuenow="{{ $card['nilai_unsur_width'] }}" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
          </div>
        </div>
        @endforeach

        <!-- Card ketiga -->
        @foreach ($cards2 as $card)
        <div class="card mb-4">
          <div class="card-header">
            {{ $card['title'] }} <!-- Menampilkan judul dari card -->
          </div>
          <div class="card-body">
            <p>Skor: {{ $card['skor'] }}</p>
            <div class="progress mb-4" style="height: 8px;">
              <div class="progress-bar bg-primary" style="width: {{ $card['skor_width'] }}%" role="progressbar" aria-valuenow="{{ $card['skor_width'] }}" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <p>Nilai Unsur: {{ $card['nilai_unsur'] }}</p>
            <div class="progress" style="height: 8px;">
              <div class="progress-bar bg-warning" style="width: {{ $card['nilai_unsur_width'] }}%" role="progressbar" aria-valuenow="{{ $card['nilai_unsur_width'] }}" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
          </div>
        </div>
        @endforeach
      </div>

      <!-- Card 2 di sebelah kanan -->
      <div class="col-md-6">
        <div class="card" style="height: 94%; display: flex; justify-content: center; align-items: center;">
          <div class="card-body" id="penetapanTujuan">
            <!-- Chart akan di-render di sini -->
          </div>
        </div>
      </div>


  </section>
</div>
@endsection

<style>
  #penetapanTujuan {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100%;
  }
</style>

