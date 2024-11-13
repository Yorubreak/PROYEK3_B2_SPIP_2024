@extends('layouts/horizontalLayout')

@section('content')
<div class="container mt-4">
    <div class="card-body row p-0 pb-3">
        <div class="col-12 col-md-8 card-separator">
            <h3>Selamat Datang Staff Kami 👋🏻 </h3>
            <div class="col-12 col-lg-8">
                <p>Ayo Nilai Kinerja Organisasi ini supaya keefektifan kinerja Organisasi ini Terkontrol!</p>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-12 action-table d-flex align-items-center justify-content-start gap-2">
      <div class="dropdown">
        <button type="button" class="btn btn-label-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" id="dropdownTahun">Tahun</button>
        <ul class="dropdown-menu">
            @foreach ($tahun as $thn)
                <li><a class="dropdown-item" href="javascript:void(0);" onclick="updateTahun('{{ $thn }}')">{{ $thn }}</a></li>
            @endforeach
            {{-- onclick="updateTahun('{{ $thn->id }}', '{{ $thn->tahun }}')" --}}
        </ul>
      </div>

      <div class="dropdown">
          <button type="button" class="btn btn-label-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" id="dropdownBulan">Bulan</button>
          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-bulan" id="bulanDropdown">
              <!-- Bulan akan diisi dinamis oleh JavaScript -->
          </ul>
      </div>
      <a id="editSkorButton" href="#" class="btn btn-warning"><i class="ti ti-pencil ti-xs me-2"></i>Edit Skor</a>
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
{{--
          @foreach ($elemen as $elm)
            <tr>
                <td><strong>{{ $elm->nama_komponen }}</strong></td>
            </tr>
            @foreach ($unsur->where('kom_id_komponen', $elm->id_komponen) as $uns)
              <tr>
                  <td><strong>&nbsp;&nbsp;&nbsp;{{ $uns->nama_komponen }}</strong></td>
              </tr>
              @foreach ($subunsur->where('kom_id_komponen', $uns->id_komponen) as $sub)
                  <tr>
                      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $sub->nama_komponen }}</td>
                  </tr>
              @endforeach
            @endforeach
          @endforeach --}}
        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
  let tahun = null;
  let bulan = null;

  function updateTahun(tahun) {
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

            console.log(bulan); // Tampilkan data bulan di console untuk debugging

            // Tampilkan setiap bulan di dropdown
            bulan.forEach(bln => {
                const li = document.createElement('li');
                li.innerHTML = `<a class="dropdown-item" href="javascript:void(0);" onclick="updateBulan('${bln}', '${tahun}')">${bln}</a>`;
                bulanDropdown.appendChild(li);
            });
        })
        .catch(error => console.error('Error fetching months:', error));
}


  function updateBulan(bulan, tahun) {
    document.getElementById('dropdownBulan').innerText = bulan;

    // Update the Edit Skor button link with the selected bulanId
    const editSkorButton = document.getElementById('editSkorButton');
    editSkorButton.href = `/editskor/${bulan}/${tahun}`;

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
                tr.innerHTML = `<td colspan="7" style="text-align: center;">Tidak ada data, <a href="javascript:void(0)" onclick="runSeederPT('${bulan}', '${tahun}')">tambah data disini!!</a></td>`;
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
                                        <td text-align: center>&nbsp;&nbsp;&nbsp;${uns.skor}</td>
                                        <td text-align: center>&nbsp;&nbsp;&nbsp;${uns.bobot_unsur}</td>
                                        <td text-align: center>&nbsp;&nbsp;&nbsp;${uns.bobot_komponen}</td>
                                        <td text-align: center>&nbsp;&nbsp;&nbsp;${uns.nilai_unsur}</td>
                                        <td text-align: center>&nbsp;&nbsp;&nbsp;${uns.nilai_komponen}</td>`;
                        isiTabel.appendChild(tr);
                      }
                        // Filter and iterate through the 'subunsur' array for each unsur
                          const filteredSubunsur = data[2].filter(sub => sub.kom_id_komponen === uns.id_komponen);
                          filteredSubunsur.forEach(sub => {
                              // Create a row for each subunsur (with further indentation)
                              const tr = document.createElement('tr');
                              tr.innerHTML = `<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;${sub.nama_komponen}</td>
                                              <td text-align: center>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;${sub.skor}</td>
                                              <td text-align: center>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;${sub.bobot_unsur}</td>
                                              <td text-align: center>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;${sub.bobot_komponen}</td>
                                              <td text-align: center>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;${sub.nilai_unsur}</td>
                                              <td text-align: center>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;${sub.nilai_komponen}</td>`;
                              isiTabel.appendChild(tr);
                          });
                    });
                });
            }
        })
        .catch(error => console.error('Error fetching data:', error));
}

</script>
@endsection
