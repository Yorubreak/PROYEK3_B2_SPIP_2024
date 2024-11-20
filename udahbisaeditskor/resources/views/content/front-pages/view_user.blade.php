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

@extends('layouts/LayoutMaster')

<script>

  document.addEventListener('DOMContentLoaded', function(){

    const generateLeads = [
      {
        elementId: 'PenilaianRisiko',
        labels:['Bobot'],
        series:[30,70],
        colors:['#fee802','#fbfcd9'],
      },
      {
        elementId: 'identifikasirisiko',
        labels:['Unsur'],
        series:[60,40],
        colors:['#fee802','#fbfcd9'],
      },
      {
        elementId: 'analisisrisiko',
        labels:['Unsur'],
        series:[30,70],
        colors:['#fee802','#fbfcd9'],
      },
      {
        elementId: 'informasi_komunikasi',
        labels:['Bobot'],
        series:[30,70],
        colors:['#ffaf00','#fff2d6'],
      },
      {
        elementId: 'informasirelevan',
        labels:['Unsur'],
        series:[60,40],
        colors:['#ffaf00','#fff2d6'],
      },
      {
        elementId: 'komunikasiefektif',
        labels:['Unsur'],
        series:[30,70],
        colors:['#ffaf00','#fff2d6'],
      },
      {
        elementId: 'pemantauan',
        labels:['Bobot'],
        series:[30,70],
        colors:['#9747FF','#e9dff7'],
      },
      {
        elementId: 'pemantauanberkelanjutan',
        labels:['Unsur'],
        series:[60,40],
        colors:['#9747FF','#e9dff7'],
      },
      {
        elementId: 'evaluasiterpisah',
        labels:['Unsur'],
        series:[30,70],
        colors:['#9747FF','#e9dff7'],
      }
    ]

    generateLeads.forEach(function (generateLead) {
      const generateLeadEl = document.querySelector(`#${generateLead.elementId}`);

      if (generateLeadEl) {
        const genLeadconfigs = {
          chart: {
            height: 140,
            width : 140,
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

  document.addEventListener('DOMContentLoaded', function () {
    const radialBars = [
      {
        elementId: 'Total1'
      }
    ];

    radialBars.forEach(function (radialBar) {
      const radialBarChartEl = document.querySelector(`#${radialBar.elementId}`);

      if (radialBarChartEl) {
        const radialBarChartConfig = {
          chart: {
            height: 380,
            type: 'radialBar'
          },
          colors: ['#fee802', '#ffaf00', '#9747FF'], // Ubah warna sesuai kebutuhan
          plotOptions: {
            radialBar: {
              size: 185,
              hollow: {
                size: '40%'
              },
              track: {
                margin: 10,
                background: '#f4f4f4' // Sesuaikan dengan warna label
              },
              dataLabels: {
                name: {
                  fontSize: '2rem',
                  fontFamily: 'Public Sans'
                },
                value: {
                  fontSize: '1.2rem',
                  color: '#6e6b7b', // Warna nilai
                  fontFamily: 'Public Sans'
                },
                total: {
                  show: true,
                  fontWeight: 400,
                  fontSize: '1.3rem',
                  color: '#5e5873', // Warna heading
                  label: 'Penilaian',
                  formatter: function (w) {
                    return '80%';
                  }
                }
              }
            }
          },
          grid: {
            borderColor: '#ebe9f1', // Warna border
            padding: {
              top: -25,
              bottom: -20
            }
          },
          legend: {
            show: true,
            position: 'bottom',
            labels: {
              colors: '#6e6b7b', // Warna legend
              useSeriesColors: false
            }
          },
          stroke: {
            lineCap: 'round'
          },
          series: [80, 50, 35],
          labels: ['Penilaian', 'Informasi', 'Pemantauan']
        };

        const radialChart = new ApexCharts(radialBarChartEl, radialBarChartConfig);
        radialChart.render();
      }
    });
  });

  document.addEventListener('DOMContentLoaded', function () {
      const config = {
        colors: {
          primary: '#696cff',
          warning: '#ffb74d'
        }
      };

      const cardColor = '#ffffff';
      const labelColor = '#6c757d';
      const legendColor = '#6c757d';

      const totalRevenueChartEl = document.querySelector('#totalRevenueChart');
      if (totalRevenueChartEl) {
        const totalRevenueChartOptions = {
          series: [
            {
              name: 'Earning',
              data: [270, 210, 180, 200, 250, 280, 250, 270, 150]
            },
            {
              name: 'Expense',
              data: [-140, -160, -180, -150, -100, -60, -80, -100, -180]
            }
          ],
          chart: {
            height: 200,
            parentHeightOffset: 0,
            stacked: true,
            type: 'bar',
            toolbar: { show: false }
          },
          tooltip: {
            enabled: false
          },
          plotOptions: {
            bar: {
              horizontal: false,
              columnWidth: '40%',
              borderRadius: 9,
              startingShape: 'rounded',
              endingShape: 'rounded'
            }
          },
          colors: [config.colors.primary, config.colors.warning],
          dataLabels: {
            enabled: false
          },
          stroke: {
            curve: 'smooth',
            width: 6,
            lineCap: 'round',
            colors: [cardColor]
          },
          legend: {
            show: true,
            horizontalAlign: 'right',
            position: 'top',
            fontFamily: 'Public Sans',
            markers: {
              height: 12,
              width: 12,
              radius: 12,
              offsetX: -3,
              offsetY: 2
            },
            labels: {
              colors: legendColor
            },
            itemMargin: {
              horizontal: 10,
              vertical: 2
            }
          },
          grid: {
            show: false,
            padding: {
              bottom: -8,
              top: 20
            }
          },
          xaxis: {
            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Okt', 'Nov', 'Des'],
            labels: {
              style: {
                fontSize: '13px',
                colors: labelColor,
                fontFamily: 'Public Sans'
              }
            },
            axisTicks: {
              show: false
            },
            axisBorder: {
              show: false
            }
          },
          yaxis: {
            labels: {
              offsetX: -16,
              style: {
                fontSize: '13px',
                colors: labelColor,
                fontFamily: 'Public Sans'
              }
            },
            min: -200,
            max: 300,
            tickAmount: 5
          }
        };

        console.log('Chart Options:', totalRevenueChartOptions);
        console.log('Chart Element:', totalRevenueChartEl);

        const totalRevenueChart = new ApexCharts(totalRevenueChartEl, totalRevenueChartOptions);
        totalRevenueChart.render();
      } else {
        console.error('Element with ID "totalRevenueChart" not found.');
      }
    });
</script>

@endsection

@section('content')
<div class="container mt-5">
    <!-- Header -->
    <section id="segment1" style="margin-top: 9%">
      <h2>Struktur dan Proses</h2>
      <p>Lingkungan Pengendalian</p>

      <!-- Grid untuk Card -->
      <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-3">
        @foreach ($cards as $card)
        <div class="col">
          <div class="card h-100 shadow-sm">
            <div class="card-header bg-white border-bottom-0">
              <h6 class="card-title text-wrap">{{ $card['title'] }}</h6>
            </div>
            <div class="card-body d-flex flex-column">
              <p class="mb-1">Skor</p>
              <h4 class="mb-2">{{ $card['score'] }}</h4>
              <div class="progress mb-4" style="height: 8px;">
                <div class="progress-bar bg-primary" style="width: {{ $card['score_width'] }}%" role="progressbar" aria-valuenow="{{ $card['score_width'] }}" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
              <p class="mb-1">Nilai Unsur</p>
              <h4 class="mb-2">{{ $card['element_value'] }}</h4>
              <div class="progress" style="height: 8px;">
                <div class="progress-bar bg-warning" style="width: {{ $card['element_width'] }}%" role="progressbar" aria-valuenow="{{ $card['element_width'] }}" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </section>

  <!-- Segment 2 -->
  <section id="segment2" class="mt-5">
    <h2>Segment 2</h2>
    <p>Konten untuk Segment 2</p>
  </section>


  <!-- Segment 3: Penilaian Risiko & Pemantauan -->
  <section id="segment3" class="mt-5">
    <h2>Penilaian Risiko & Pemantauan</h2>
    <div class="row">
        <!-- Layout 3x3 untuk 9 Chart -->
        <div class="col-md-9">
            <div class="row">
                <!-- Chart 1 -->
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div class="d-flex flex-column">
                                    <div class="card-title mb-auto">
                                        <h5 class="mb-1 text-nowrap">Penilaian Risiko</h5>
                                        <small>Nilai Komponen</small>
                                    </div>
                                </div>
                                <div id="PenilaianRisiko" style="margin-right: 20px"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Chart 2 -->
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div class="d-flex flex-column">
                                    <div class="card-title mb-auto">
                                        <h5 class="mb-1 text-nowrap">Identifikasi Risiko</h5>
                                        <small>Nilai Komponen</small>
                                    </div>
                                </div>
                                <div id="identifikasirisiko" style="margin-right: 20px;"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Chart 3 -->
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div class="d-flex flex-column">
                                    <div class="card-title mb-auto">
                                        <h5 class="mb-1 text-nowrap">Analisis Risiko</h5>
                                        <small>Skor</small>
                                    </div>
                                </div>
                                <div id="analisisrisiko" style="margin-right: 20px"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Chart 4 -->
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div class="d-flex flex-column">
                                    <div class="card-title mb-auto">
                                        <h5 class="mb-1 text-nowrap">Informasi &</h5>
                                        <h5 class="mb-1 text-nowrap">Komunikasi</h5>
                                    </div>
                                </div>
                                <div id="informasi_komunikasi" style="margin-right: 20px;"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Chart 5 -->
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div class="d-flex flex-column">
                                    <div class="card-title mb-auto">
                                        <h5 class="mb-1 text-nowrap">Informasi Relevan</h5>
                                        <small>Skor</small>
                                    </div>
                                </div>
                                <div id="informasirelevan" style="margin-right: 20px"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Chart 6 -->
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div class="d-flex flex-column">
                                    <div class="card-title mb-auto">
                                        <h5 class="mb-1 text-nowrap">Komunikasi Efektif</h5>
                                        <small>Skor</small>
                                    </div>
                                </div>
                                <div id="komunikasiefektif" style="margin-right: 20px"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Chart 7 -->
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div class="d-flex flex-column">
                                    <div class="card-title mb-auto">
                                        <h5 class="mb-1 text-nowrap">Pemantauan</h5>
                                    </div>
                                </div>
                                <div id="pemantauan" style="margin-right: 20px"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Chart 8 -->
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div class="d-flex flex-column">
                                    <div class="card-title mb-auto">
                                        <h5 class="mb-1 text-nowrap">Pemantauan </h5>
                                        <h5 class="mb-1 text-nowrap">Berkelanjutan</h5>
                                        <small>Skor</small>
                                    </div>
                                </div>
                                <div id="pemantauanberkelanjutan" style="margin-right: 20px"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Chart 9 -->
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div class="d-flex flex-column">
                                    <div class="card-title mb-auto">
                                        <h5 class="mb-1 text-nowrap">Evaluasi Terpisah</h5>
                                        <small>Skor</small>
                                    </div>
                                </div>
                                <div id="evaluasiterpisah" style="margin-right: 20px"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Chart 10 yang menempati 1/4 layar -->
        <div class="col-md-3" style="margin-top: 120px;">
          <div class="card" style="position: relative; text-align: center;">
            <div class="card-body" style="padding-top: 50px;">
              <div class="card-title" style="position: absolute; top: 10px; left: 50%; transform: translateX(-50%);">
                <h5 class="mb-1 text-nowrap">Skor</h5>
              </div>
              <div id="Total1"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>
@endsection

<style>
  /* Tetapkan tinggi tetap untuk judul */
  .card-title {
    min-height: 48px; /* Sesuaikan agar cukup untuk 2 baris teks */
    line-height: 1.2; /* Jarak antar baris teks */
    font-size: 16px;
  }

  /* Flexbox untuk menyusun elemen dalam card-body */
  .card-body {
    display: flex;
    flex-direction: column;
    padding: 15px;
    justify-content: space-between; /* Membuat progress bar selalu di bawah */
  }

  /* Atur tinggi card secara seragam */
  .card {
    min-height: 320px; /* Sesuaikan dengan desain */
    border-radius: 10px;
    max-height: 250px;
  }

  .progress {
    height: 8px; /* Tinggi progress bar */
  }
</style>



