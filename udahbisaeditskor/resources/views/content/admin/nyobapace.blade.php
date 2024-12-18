@extends('layouts/horizontalLayout')

@section('content')
<?php
?>
<div class="container mt-4">
    <div class="card-body row p-0 pb-3">
        <div class="col-12 col-md-8 card-separator">
          <h3>Selamat Datang, {{ Auth::user()->username }} 👋🏻 </h3>
            <div class="col-12 col-lg-8">
                <p>Ayo Nilai Kinerja Organisasi ini supaya keefektifan kinerja Organisasi ini Terkontrol!</p>
            </div>
        </div>
    </div>
    <div class="col-lg-5 col-12 action-table d-flex align-items-center justify-content-start gap-2 mb-2">
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
      <a id="editSkorButton" href="#" class="btn btn-warning"><i class="ti ti-pencil ti-xs me-2"></i>Edit Skor</a>
      <a id="exportPdf" href="#" class="btn btn-warning"><i class="ti ti-pencil ti-xs me-2"></i>Ekspor PDF</a>
      <p>Last Update by:
        @if($last_update)
            {{ $last_update->firstname }} {{ $last_update->lastname }}
        @else
            -
        @endif
    </p>
    <p>Last Update at: {{ $last_update->updated_at->format('d M Y H:i:s') }}</p>

    </div>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th rowspan="2" class="text-center align-middle"><strong>Elemen, Unsur, dan Sub Unsur Result-Based SPIP</strong></th>
                <th rowspan="2" class="text-center align-middle"><strong>Skor</strong></th>
                <th rowspan="2" class="text-center align-middle"><strong>Bobot Unsur</strong></th>
                <th rowspan="2" class="text-center align-middle"><strong>Bobot Komponen</strong></th>
                <th colspan="2" class="text-center align-middle"><strong>Penilaian</strong></th>
            </tr>

            <tr>
                <th><strong>Nilai Unsur</strong></th>
                <th><strong>Nilai Komponen</strong></th>
            </tr>
        </thead>
        <tbody id="isiTabel">

        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
  let tahun = 2023;
  let bulan = 'Januari';

  window.onload = function() {
    console.log("Halaman telah dimuat ulang!");
    getData(tahun, bulan); // Panggil fungsi yang diinginkan
    updateTahun(tahun);
    updateBulan(bulan, tahun);
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

            console.log(bulan); // Tampilkan data bulan di console untuk debugging

            // Tampilkan setiap bulan di dropdown
            bulan.forEach(bln => {
                const li = document.createElement('li');
                li.innerHTML = `<a class="dropdown-item" href="javascript:void(0);" onclick="updateBulan('${bln}', '${tahun}')">${bln}</a>`;
                bulanDropdown.appendChild(li);
            });
        })
        .catch(error => console.error('Error fetching months:', error));
        updateBulan(bulan, tahun);
        const editSkorButton = document.getElementById('editSkorButton');
        editSkorButton.href = `/editskor/${bulan}/${tahun}`;

        document.getElementById('exportPdf').href = `/generate-pdf/${tahun}/${bulan}`;
        getData(tahun, bulan);
        // updateBulan(bulan, tahun)
}


  function updateBulan(bulan, tahun) {
    document.getElementById('dropdownBulan').innerText = bulan;

    // Update the Edit Skor button link with the selected bulanId
    const editSkorButton = document.getElementById('editSkorButton');
    editSkorButton.href = `/editskor/${bulan}/${tahun}`;
    console.log(tahun, bulan);
    document.getElementById('exportPdf').href = `/generate-pdf/${tahun}/${bulan}`;

    // Fetch data only if both tahunId and bulanId are set
    if (tahun && bulan) {
        getData(tahun, bulan);
    }
  }


  function getData(tahun, bulan) {
    fetch(`/databytahunbulan/${tahun}/${bulan}`)
        .then(response => response.json())
        .then(data => {
            const isiTabel = document.getElementById('isiTabel');
            isiTabel.innerHTML = ''; // Clear the table content
            console.log(data);
            if (data[0].length === 0) {
                // If no data is found, show a message
                const tr = document.createElement('tr');
                tr.innerHTML = `<td colspan="7" style="text-align: center;">Tidak ada data, <a href="javascript:void(0)" onclick="runSeeder('${bulan}', '${tahun}')">tambah data disini!!</a></td>`;
                isiTabel.appendChild(tr);
            } else {
                // Iterate through each element (komponen)
                data[0].forEach(elm => {
                    // Create a row for each komponen
                    const tr = document.createElement('tr');
                    tr.innerHTML = `<td colspan = "6" style="text-transform: uppercase;"><strong>${elm.nama_komponen}</strong></td>`;
                    isiTabel.appendChild(tr);

                    // Filter and iterate through the 'unsur' array for each element
                    const filteredUnsur = data[1].filter(uns => uns.kom_id_komponen === elm.id_komponen);
                    filteredUnsur.forEach(uns => {
                      if (uns.has_child == true) {
                        const tr = document.createElement('tr');
                        tr.innerHTML = `<td colspan = "6" ><strong>&nbsp;&nbsp;&nbsp;${uns.nama_komponen}</strong></td>`;
                        isiTabel.appendChild(tr);

                      }else{
                        // Create a row for each unsur (with indentation)
                        const tr = document.createElement('tr');
                        tr.innerHTML = `<td><strong>&nbsp;&nbsp;&nbsp;${uns.nama_komponen}</strong></td>
                                        <td style="text-align: center;">${uns.skor}</td>
                                        <td style="text-align: center;">${uns.bobot_unsur}</td>
                                        <td style="text-align: center;">${uns.bobot_komponen}</td>
                                        <td style="text-align: center;">${uns.nilai_unsur}</td>
                                        <td  style="text-align: center;">${uns.nilai_komponen}</td>
                                        `;
                        isiTabel.appendChild(tr);
                      }
                        // Filter and iterate through the 'subunsur' array for each unsur
                          const filteredSubunsur = data[2].filter(sub => sub.kom_id_komponen === uns.id_komponen);
                          filteredSubunsur.forEach(sub => {
                              // Create a row for each subunsur (with further indentation)
                              const tr = document.createElement('tr');
                              tr.innerHTML = `<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;${sub.nama_komponen}</td>
                                              <td  style="text-align: center;">${sub.skor}</td>
                                              <td  style="text-align: center;">${sub.bobot_unsur}</td>
                                              <td  style="text-align: center;">${sub.bobot_komponen}</td>
                                              <td  style="text-align: center;">${sub.nilai_unsur}</td>
                                              <td  style="text-align: center;">${sub.nilai_komponen}</td>`;
                              isiTabel.appendChild(tr);
                          });
                    });
                });
            }
        })
        .catch(error => console.error('Error fetching data:', error));
}

function runSeeder(bulan, tahun) {
    console.log(bulan, tahun);
    fetch(`/run-seeder/${bulan}/${tahun}`)
        .then(response => response.json())
        .then(result => {
            // Menampilkan alert sukses menggunakan SweetAlert2
            Swal.fire({
                title: 'Berhasil!',
                text: result.success,
                icon: 'success',
                confirmButtonText: 'OK'
            });
            getData(tahun, bulan);
        })
        .catch(error => {
            console.error('Error running seeder:', error);
            // Menampilkan alert error menggunakan SweetAlert2
            Swal.fire({
                title: 'Gagal!',
                text: 'Gagal menjalankan Seeder. Silakan coba lagi.',
                any : 'error',
                confirmButtonText: 'OK'
            });
        });
}

function seederTahunBulan(tahun) {
    console.log(tahun);
    fetch(`/seederTahun/${tahun}`)
        .then(response => response.json())
        .then(result => {
            // Menampilkan alert sukses menggunakan SweetAlert2
            Swal.fire({
                title: 'Berhasil!',
                text: result.success,
                icon: 'success',
                confirmButtonText: 'OK'
            }) .then(() => {
                // Refresh halaman setelah alert ditutup
                location.reload();
            });

            // Memperbarui tampilan tombol dropdown
            updateTahun(tahun);

            // Memanggil fungsi getData jika diperlukan
            getData(tahun, bulan);
        })
        .catch(error => {
            console.error('Error running seeder:', error);
            // Menampilkan alert error menggunakan SweetAlert2
            Swal.fire({
                title: 'Gagal!',
                text: 'Gagal menjalankan Seeder. Silakan coba lagi.',
                icon: 'error',
                confirmButtonText: 'OK'
            });
        });
}



</script>
@endsection
