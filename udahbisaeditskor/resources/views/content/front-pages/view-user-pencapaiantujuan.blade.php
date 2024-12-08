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
  document.addEventListener('DOMContentLoaded', function () {
      const BUEE0 = @json($BUEE[0]);
      const BUEE1 = @json($BUEE[1]);
      document.getElementById('skor-BU0-value').textContent = BUEE0;
      document.getElementById('skor-BU1-value').textContent = BUEE1;

      const skorEE = @json($skorEE);
      const skorKLK = @json($skorKLK);
      const skorKP = @json($skorKP);
      const skorPA = @json($skorPA);

      const legendColor = '#6c757d';
      const borderColor = '#dee2e6';
      const labelColor = '#495057';
      const chartColors = {
          donut: {
              series1: '#7367f0',
              series3: '#28c76f'
          }
      };

      const radarCharts = [
          {
              elementId: 'Pengamananatasaset',
          }
      ];

      radarCharts.forEach(function (radarChart) {
          const radarChartEl = document.querySelector(`#${radarChart.elementId}`);
          if (radarChartEl) {
              const radarChartConfig = {
                  chart: {
                      height: 380,
                      type: 'radar',
                      toolbar: {
                          show: false
                      },
                      dropShadow: {
                          enabled: false,
                          blur: 8,
                          left: 1,
                          top: 1,
                          opacity: 0.2
                      }
                  },
                  legend: {
                      show: true,
                      position: 'bottom',
                      horizontalAlign: 'center',
                      offsetY: -80,
                      labels: {
                          colors: legendColor,
                          useSeriesColors: false
                      }
                  },
                  plotOptions: {
                      radar: {
                          polygons: {
                              strokeColors: borderColor,
                              connectorColors: borderColor
                          },
                      }
                  },
                  yaxis: {
                      show: false,
                      max: 100
                  },
                  series: [
                      {
                          name: 'skor1',
                          data: [(skorPA[0] / 5 * 100), 30, 30]
                      },
                      {
                          name: 'skor2',
                          data: [30, (skorPA[1] / 5 * 100), 30]
                      },
                      {
                          name: 'skor3',
                          data: [30, 30, (skorPA[2] / 5 * 100)]
                      }
                  ],
                  colors: [chartColors.donut.series1, chartColors.donut.series3],
                  xaxis: {
                      categories: ['Administrasi', 'Fisik', 'Hukum'],
                      labels: {
                          show: true,
                          style: {
                              colors: ['#fee802', '#ffaf00', '#9747FF'],
                              fontSize: '13px',
                              fontFamily: 'Public Sans'
                          }
                      }
                  },
                  fill: {
                      opacity: [1, 0.8]
                  },
                  stroke: {
                      show: false,
                      width: 0
                  },
                  markers: {
                      size: 0
                  },
                  grid: {
                      show: false,
                      padding: {
                          top: -40,
                          bottom: -40,
                          left: 50
                      }
                  }
              };

              const radarChart = new ApexCharts(radarChartEl, radarChartConfig);
              radarChart.render();
          }
      });

      const supportTrackers = [
          {
              elementId: 'Outcome',
              colors: '#7367f0',
              grad: '#7367f0',
              series: skorEE[0] / 5 * 100,
          },
          {
              elementId: 'Output',
              colors: '#f76657',
              grad:'#eb4634',
              series: skorEE[1] / 5 * 100,
          }
      ];

      supportTrackers.forEach(function (supportTracker) {
          const supportTrackerEl = document.querySelector(`#${supportTracker.elementId}`);
          const color = supportTracker.colors;
          const grad = supportTracker.grad;
          const series =supportTracker.series
          if (supportTrackerEl) {
              const supportTrackerOptions = {
                  series: [series],
                  labels: ['Completed Task'],
                  chart: {
                      height: 240,
                      type: 'radialBar'
                  },
                  plotOptions: {
                      radialBar: {
                          offsetY: 10,
                          startAngle: -140,
                          endAngle: 130,
                          hollow: {
                              size: '65%'
                          },
                          track: {
                              background: '#ffffff',
                              strokeWidth: '100%'
                          },
                          dataLabels: {
                              name: {
                                  offsetY: -20,
                                  color: labelColor,
                                  fontSize: '13px',
                                  fontWeight: '400',
                                  fontFamily: 'Public Sans'
                              },
                              value: {
                                  offsetY: 10,
                                  color: '#000000',
                                  fontSize: '26px',
                                  fontWeight: '500',
                                  fontFamily: 'Public Sans'
                              }
                          }
                      }
                  },

                  colors: [color],
                  fill: {
                      type: 'gradient',
                      gradient: {
                          shade: 'dark',
                          shadeIntensity: 0.5,
                          gradientToColors: [grad],
                          inverseColors: true,
                          opacityFrom: 1,
                          opacityTo: 0.6,
                          stops: [30, 70, 100]
                      }
                  },
                  stroke: {
                      dashArray: 10
                  },
                  grid: {
                      padding: {
                          top: -20,
                          bottom: 5
                      }
                  },
                  states: {
                      hover: {
                          filter: {
                              type: 'none'
                          }
                      },
                      active: {
                          filter: {
                              type: 'none'
                          }
                      }
                  },
                  responsive: [
                      {
                          breakpoint: 1025,
                          options: {
                              chart: {
                                  height: 330
                              }
                          }
                      },
                      {
                          breakpoint: 769,
                          options: {
                              chart: {
                                  height: 280
                              }
                          }
                      }
                  ]
              };
              const supportTracker = new ApexCharts(supportTrackerEl, supportTrackerOptions);
              supportTracker.render();
          }
      });

    const generateLeads = [
      {
        elementId: 'OpiniLK',
        labels:['Skor'],
        series:[skorKLK, 5 - skorKLK],
        colors:['#fee802','#fbfcd9'],
      },
      {
        elementId: 'TemuanKetaatan',
        labels:['Skor'],
        series:[skorKP, 5 - skorKP],
        colors:['#9747FF','#e9dff7'],
      }
    ]

    generateLeads.forEach(function (generateLead) {
      const generateLeadEl = document.querySelector(`#${generateLead.elementId}`);

      if (generateLeadEl) {
        const genLeadconfigs = {
          chart: {
            height: 180,
            width : 177,
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
                size: '85%',
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
                      return parseInt(val, 10) + '%';
                    },
                  },
                  total: {
                    show: true,
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

<div class="container mt-5">
  <section style="margin-top:9%">
    <h3>Pencapaian Tujuan SPIP</h3>
    <div class="container mb-3">
      <div class="row">
        <!-- Grid 1 (2/3 dari panjang layar) -->
        <div class="col-md-8">
          <!-- Card 1: Lebar penuh -->
          <div class="card mb-3" style="height: 40vh;">
            <div class="card-body d-flex">
                <!-- Bagian Kiri -->
                <div class="col-4 d-flex-column align-items-start justify-content-left">
                    <h5 class="text-left ml-2">Efektivitas dan Efisiensi</h5>
                    <h5 class="text-left">Bobot Outcome</h5>
                    <h5 class="text-left" id="skor-BU0-value"></h5>
                    <h5 class="text-left">Bobot Output</h5>
                    <h5 class="text-left" id="skor-BU1-value"></h5>
                </div>
                <!-- Bagian Tengah -->
                <div class="col-4 d-flex flex-column align-items-center">
                  <div id="Outcome"></div>
                  <p class="text-end mt-2">Outcome</p>
              </div>
                <!-- Bagian Kanan -->
                <div class="col-4 d-flex flex-column align-items-center ">
                    <div id="Output" class="chart-container"></div>
                    <p class="text-end mt-2">Output</p>
                </div>
            </div>
        </div>
          <!-- Card 2, 3, 4: Lebar masing-masing 1/3 -->
          <div class="row">
            <div class="col-md-4">
              <div class="card mb-3" style="height: 40vh;">
                <div class="card-body">
                  <h5 class="card-title-center">Bobot</h5>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card mb-3" style="height: 40vh;">
                <div class="card-body d-flex justify-content-center align-items-center">
                    <div class="d-flex flex-column justify-content-between align-items-center h-100 w-100">
                        <!-- Title di tengah atas -->
                        <h5 class="card-title text-center">Keandalan Laporan Keuangan</h5>
                        <!-- Chart di tengah-tengah -->
                        <div id="OpiniLK" class="mt-auto mb-auto"></div>
                    </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card mb-3" style="height: 40vh;">
                <div class="card-body d-flex justify-content-center align-items-center">
                    <div class="d-flex flex-column justify-content-between align-items-center h-100 w-100">
                        <!-- Title di tengah atas -->
                        <h5 class="card-title text-center">Ketaatan Peraturan</h5>
                        <!-- Chart di tengah-tengah -->
                        <div id="TemuanKetaatan" class="mb-3"></div>
                    </div>
                </div>
             </div>
            </div>
          </div>
        </div>
        <!-- Grid 2 (1/3 dari panjang layar) -->
        <div class="col-md-4">
          <!-- Card 5: Lebar dan panjang setengah layar -->
          <div class="card" style="height: 82.2vh; width: 65vh;">
            <div class="card-body d-flex flex-column">
              <!-- Judul di tengah atas -->
              <div class="card-body d-flex flex-column justify-content-center align-items-center">
                <h5 class="card-title text-center mb-3">Pengamanan Atas Aset</h5>
                <div id="Pengamananatasaset" class="chart-container"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>


