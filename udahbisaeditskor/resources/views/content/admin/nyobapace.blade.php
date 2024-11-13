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
        <tbody>

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
          @endforeach
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
      fetch(`admin/bulan-by-tahun/${tahun}`)
          .then(response => response.json())
          .then(data => {
              const bulanDropdown = document.getElementById('bulanDropdown');
              bulanDropdown.innerHTML = '';

              data.forEach(bulan => {
                  const li = document.createElement('li');
                  li.innerHTML = `<a class="dropdown-item" href="javascript:void(0);" onclick="updateBulan('${bulan}','${tahun}')">${bulan}</a>`;
                  bulanDropdown.appendChild(li);
              });
          })
          .catch(error => console.error('Error fetching months:', error));
  }

  function updateBulan(bulan, tahun) {
    document.getElementById('dropdownBulan').innerText = bulan;

    // Update the Edit Skor button link with the selected bulanId
    const editSkorButtonPT = document.getElementById('editSkorButton');
    editSkorButtonPT.href = `admin/editskorPT/${bulan}`;

    // Fetch data only if both tahunId and bulanId are set
    if (tahun && bulan) {
        getDataPT(tahunId, bulanId, tahunText, bulanText);
    }
  }
</script>
@endsection