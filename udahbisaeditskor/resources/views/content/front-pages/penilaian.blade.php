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
  let tahun = 2023;
  let bulan = 'Januari';

  window.onload = function() {
    console.log("Halaman telah dimuat ulang!");
    // getData(tahun, bulan); // Panggil fungsi yang diinginkan
    updateTahun(tahun);
    // updateBulan(bulan, tahun);
}

  function updateTahun(Selectedtahun) {
    tahun = Selectedtahun;
    console.log(tahun);
    document.getElementById('dropdownTahun').innerText = tahun;
    // getData(tahun, bulan);

    // Fetch months associated with selected tahunId
    fetch(`/bulan-by-tahun/${tahun}`)
        .then(response => {
            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }
            return response.json();
        })
        .then(bulan => {
            const bulanDropdown = document.getElementById('bulanDropdown');
            bulanDropdown.innerHTML = ''; // Kosongkan dropdown sebelum menambahkan bulan baru

            // console.log(bulan); // Tampilkan data bulan di console untuk debugging

            // Tampilkan setiap bulan di dropdown
            bulan.forEach(bln => {
                const li = document.createElement('li');
                li.innerHTML = `<a class="dropdown-item" href="javascript:void(0);" onclick="updateBulan('${bln}', ${tahun})">${bln}</a>`;
                bulanDropdown.appendChild(li);
            });
        })
        .catch(error => console.error('Error fetching months:', error));
        updateBulan(bulan, tahun);
        // updateBulan(bulan, tahun);
        // getData(tahun, bulan);
        // updateBulan(bulan, tahun)
}


function updateBulan(bulan, tahun) {
    document.getElementById('dropdownBulan').innerText = bulan;
    console.log(tahun, bulan);

    // Reset elemen yang menampilkan data lama
    const noData = document.getElementById('noData');
    noData.innerHTML = ''; // Kosongkan elemen noData

    // Reset elemen chart
    const donutChart1 = document.getElementById('donutChart1');
    const donutChart2 = document.getElementById('donutChart2');
    donutChart1.innerHTML = ''; // Kosongkan chart 1
    donutChart2.innerHTML = ''; // Kosongkan chart 2

    getData(tahun, bulan);
}



function getData(tahun, bulan){
  // document.addEventListener('DOMContentLoaded', function () {
    // Data dan konfigurasi untuk beberapa donut chart
    fetch(`/datauser/${tahun}/${bulan}`)
      .then(response => response.json())
      .then(data => {
        if (data[2][1] == null || data.length === 0) {
          console.log('data 2', data[2]);

          const donutChart1 = document.getElementById('donutChart1');
          const donutChart2 = document.getElementById('donutChart2');
          donutChart1.innerHTML = ''; // Kosongkan chart 1
          donutChart2.innerHTML = ''; // Kosongkan chart 2
          // If no data is found, show a message
          const noData = document.getElementById('noData');
          const h3 = document.createElement('h3');
          h3.textContent = 'Data Tidak Ditemukan';
          noData.appendChild(h3);
          console.log('data 2', data[2]);
          const PenetapanTujuan = document.getElementById('PenetapanTujuan');
          const StrukturdanProses = document.getElementById('StrukturdanProses');
          const Pencapaian = document.getElementById('Pencapaian');
          PenetapanTujuan.innerHTML = '';
          StrukturdanProses.innerHTML = '';
          Pencapaian.innerHTML = '';

          }else{

            const donutChart1 = document.getElementById('donutChart1');
            const donutChart2 = document.getElementById('donutChart2');
            donutChart1.innerHTML = ''; // Kosongkan chart 1
            donutChart2.innerHTML = ''; // Kosongkan chart 2
            const PenetapanTujuan = document.getElementById('PenetapanTujuan');
            const StrukturdanProses = document.getElementById('StrukturdanProses');
            const Pencapaian = document.getElementById('Pencapaian');
            PenetapanTujuan.innerHTML = '';
            StrukturdanProses.innerHTML = '';
            Pencapaian.innerHTML = '';

            console.log('data 2', data[2]);
                const nakom = data[0];
                const bokom = data[1];
                const nilaimaturitas = data[3];
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




                const generateLeads = [
                  {
                    elementId: 'PenetapanTujuan',
                    labels:['Skor'],
                    series:[data[2][0],2 - data[2][0]],
                    colors:['#fee802','#fbfcd9'],
                    maxScale : 2,
                    mainScore: data[2][0] + ' / ' + 2
                  },
                  {
                    elementId: 'StrukturdanProses',
                    labels:['Skor'],
                    series:[data[2][1],1.5 - data[2][1]],
                    colors:['#9747FF','#e9dff7'],
                    maxScale : 1.5,
                    mainScore:data[2][1] + ' / ' + 1.5
                  },
                  {
                    elementId: 'Pencapaian',
                    labels:['Skor'],
                    series:[data[2][2],1.5 - data[2][2]],
                    colors:['#9747FF','#e9dff7'],
                    maxScale : 1.5,
                    mainScore:data[2][2] + ' / ' + 1.5
                  }
                ]

                const maxScale = 5; // Skala maksimum yang diinginkan

              generateLeads.forEach(function (generateLead) {
                const generateLeadEl = document.querySelector(`#${generateLead.elementId}`);

                if (generateLeadEl) {
                  // Hitung total data untuk grafik (hanya untuk proporsi)
                  const scaledSeries = generateLead.series.map((val) => (val / generateLead.maxScale) * 100);

                  const genLeadconfigs = {
                    chart: {
                      height: 180,
                      width: 177,
                      type: 'donut',
                    },
                    labels: generateLead.labels, // Menggunakan data labels dari array
                    series: scaledSeries, // Series yang telah diskalakan menjadi persentase
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
                              label: 'Skor', // Label untuk total
                              formatter: function () {
                                // Menampilkan nilai utama yang ditentukan
                                return generateLead.mainScore;
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
          }
      })
      .catch(error => console.error('Error fetching data:', error));

    // });
  }


</script>

@endsection

@section('content')
<section class="section-py bg-body first-section-pt">
  <div class="container mt-5">
  <div class="col-lg-6 col-12 action-table d-flex align-items-center justify-content-start gap-2 mb-2">
    <div class="dropdown">
        <button type="button" class="btn btn-label-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" id="dropdownTahun">2023</button>
        <ul class="dropdown-menu" id="tahunDropdown">
            @foreach ($tahun as $thn)
                <li><a class="dropdown-item" href="javascript:void(0);" onclick="updateTahun({{ $thn }})">{{ $thn }}</a></li>
            @endforeach
            <li style="text-align: center"><a class="dropdown-item" href="javascript:void(0);" onclick="seederTahunBulan({{ $thn }})"><i class="ti ti-plus ti-l"></i></a></li>
        </ul>
      </div>

      <div class="dropdown">
          <button type="button" class="btn btn-label-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" id="dropdownBulan">Januari</button>
          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-bulan" id="bulanDropdown">
              <!-- Bulan akan diisi dinamis oleh JavaScript -->
          </ul>
      </div>
  </div>
      <div id="noData">

      </div>
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
                <div id="PenetapanTujuan" style="margin-right: 20px"></div>
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
                <div id="StrukturdanProses" style="margin-right: 20px"></div>
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
                <div id="Pencapaian"style="margin-right: 20px"></div>
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
