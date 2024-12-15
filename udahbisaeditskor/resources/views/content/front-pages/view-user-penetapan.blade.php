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
  let tahun = 2023;
  let bulan = 'Januari';

  window.onload = function() {
    console.log("Halaman telah dimuat ulang!");
    updateTahun(tahun);
  };

  function updateTahun(Selectedtahun) {
    tahun = Selectedtahun;
    console.log(tahun);
    document.getElementById('dropdownTahun').innerText = tahun;

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

            // Tampilkan setiap bulan di dropdown
            bulan.forEach(bln => {
                const li = document.createElement('li');
                li.innerHTML = `<a class="dropdown-item" href="javascript:void(0);" onclick="updateBulan('${bln}', ${tahun})">${bln}</a>`;
                bulanDropdown.appendChild(li);
            });
        })
        .catch(error => console.error('Error fetching months:', error));
        updateBulan(bulan, tahun);
  }

  function updateBulan(bulan, tahun) {
    document.getElementById('dropdownBulan').innerText = bulan;
    console.log(tahun, bulan);

    // Reset elemen yang menampilkan data lama
    const noData = document.getElementById('noData');
    noData.innerHTML = ''; // Kosongkan elemen noData

    getData(tahun, bulan);
  }

  function getData(tahun, bulan){
    fetch(`/datauserPT/${tahun}/${bulan}`)
      .then(response => response.json())
      .then(dataPT => {
        console.log(dataPT)
        dataPT.cards.forEach(data1 => {
            const card1 = document.getElementById('card1');
            console.log(data1.title);
            card1.innerHTML = ' ';
            if(data1.length === 0){
              const h3 = document.createElement('h3');
              h3.innerHTML = 'Data Tidak Ditemukan';
              card1.appendChild(h3);
            }
            else{
              const div = document.createElement('div');
              div.innerHTML = `<div class="card mb-4">
                                <div class="card-header">
                                  ${data1.title}<!-- Menampilkan judul dari card -->
                                </div>
                                <div class="card-body">
                                  <p>Skor: ${data1.skor}</p>
                                  <div class="progress mb-4" style="height: 8px;">
                                    <div class="progress-bar bg-primary" style="width: ${data1.skor_width}%" role="progressbar" aria-valuenow="${data1.skor_width}" aria-valuemin="0" aria-valuemax="100"></div>
                                  </div>
                                  <p>Nilai Unsur: ${data1.nilai_unsur}</p>
                                  <div class="progress" style="height: 8px;">
                                    <div class="progress-bar bg-warning" style="width: ${data1.nilai_unsur_width}%" role="progressbar" aria-valuenow="${data1.nilai_unsur_width}" aria-valuemin="0" aria-valuemax="100"></div>
                                  </div>
                                </div>
                              </div>`
              card1.appendChild(div);
            }
        })
        dataPT.cards2.forEach(data2 => {
            const card2 = document.getElementById('card2');
            console.log(data2.title);
            card2.innerHTML = ' ';
            if(data2.length === 0){
              const h3 = document.createElement('h3');
              h3.innerHTML = 'Data Tidak Ditemukan';
              card2.appendChild(h3);
            }
            else{
              const div = document.createElement('div');
              div.innerHTML = `<div class="card mb-4">
                                <div class="card-header">
                                  ${data2.title}<!-- Menampilkan judul dari card -->
                                </div>
                                <div class="card-body">
                                  <p>Skor: ${data2.skor}</p>
                                  <div class="progress mb-4" style="height: 8px;">
                                    <div class="progress-bar bg-primary" style="width: ${data2.skor_width}%" role="progressbar" aria-valuenow="${data2.skor_width}" aria-valuemin="0" aria-valuemax="100"></div>
                                  </div>
                                  <p>Nilai Unsur: ${data2.nilai_unsur}</p>
                                  <div class="progress" style="height: 8px;">
                                    <div class="progress-bar bg-warning" style="width: ${data2.nilai_unsur_width}%" role="progressbar" aria-valuenow="${data2.nilai_unsur_width}" aria-valuemin="0" aria-valuemax="100"></div>
                                  </div>
                                </div>
                              </div>`
              card2.appendChild(div);
            }
        })

      
  // document.addEventListener('DOMContentLoaded', function(){
    // const BKPT = @json($bobotKomponen);
    const penetapanTujuan = document.getElementById('penetapanTujuan');
    penetapanTujuan.innerHTML = ''; 
    const generateLeads = [
      {
        elementId: 'penetapanTujuan',
        labels:['Bobot Komponen'],
        series:[(dataPT.bobotKomponen * 100),100 - (dataPT.bobotKomponen * 100)],
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
    // });
  })
}

</script>
@endsection

@section('content')
<!-- Container utama untuk mengatur layout -->
<div class="container">

  <!-- Segment 1 - Bagian Konten Utama -->
  <section id="segment-1" class="mb-5" style="margin-top: 10%; padding-top: 20px;">
    <h2>Penetapan Tujuan</h2>
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
      <div id="noData"></div>

    <!-- Baris untuk card 1 dan 3 atas-bawah, dan card 2 di sebelah kanan -->
    <div class="row">
      <!-- Kolom untuk card 1 dan 3 (atas-bawah) -->
      <div class="col-md-6">
        <div id="card1">

        </div>
        <div id="card2">

        </div>
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
