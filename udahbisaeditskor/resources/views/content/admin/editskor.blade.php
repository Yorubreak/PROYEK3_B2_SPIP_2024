@extends('layouts/layoutMaster')

@section('title', 'Basic Inputs - Forms')

@section('page-script')
@vite('resources/assets/js/form-basic-inputs.js')
@endsection


@section('content')
{{-- <div class="col-md-6"> --}}
  {{-- <form action="{{ route('admin-submitskor') }}" method="POST"> --}}
    <a href="{{ route('admin') }}" class="btn btn-warning w-40"><i class="ti ti-pencil ti-xs me-2"></i>Kembali</a>
    <div class="tab-content p-0 ms-0 ms-sm-2">
      <div class="tab-pane fade show active" id="navs-orders-id" role="tabpanel">
        <div class="card">
            <h5 class="card-header">Fixed Header</h5>

            <!-- Tempat notifikasi sukses -->
            <div id="successMessage" class="alert alert-success" style="display: none;">
                Data skor berhasil disimpan!
            </div>

            <div class="card-datatable table-responsive">
                <table class="dt-fixedheader table">
                    <thead>
                        <tr>
                            <th>Komponen</th>
                            <th>Skor</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dataPT as $dPT)
                            <tr>
                                <th>{{ $dPT->unsur }}</th>
                                <form id="skorForm-{{ $dPT->id }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <th>
                                        <div>
                                            <input type="text" class="form-control" id="skorInput-{{ $dPT->id }}" placeholder="Skor ...." name="skor" value="{{ old('skor', $dPT->skor) }}" />
                                        </div>
                                    </th>
                                    <th>
                                        <button type="button" class="btn btn-success" onclick="submitSkor({{ $dPT->id }})">
                                            <i class="ti ti-check ti-xs me-2"></i>Submit Skor
                                        </button>
                                    </th>
                                </form>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript">
        function submitSkor(id) {
            // Ambil nilai input dari form
            var skor = $('#skorInput-' + id).val();

            // Kirim data dengan AJAX
            $.ajax({
                url: "{{ url('admin/submitskor') }}/" + id,  // URL untuk mengirim data
                method: "PUT",
                data: {
                    _token: "{{ csrf_token() }}",  // Token CSRF untuk keamanan
                    skor: skor  // Data skor yang akan dikirim
                },
                success: function(response) {
                    // Tampilkan pesan sukses
                    $('#successMessage').show().delay(1500).fadeOut();

                    // Reset input skor (opsional)
                    //$('#skorInput-' + id).val('');
                },
                error: function(xhr) {
                    // Tampilkan pesan error jika ada masalah
                    alert('Error: ' + xhr.responseText);
                }
            });
        }
    </script>
    <div class="tab-pane fade" id="navs-sales-id" role="tabpanel">
      <div class="col-lg-3 col-12 action-table">
        <button class="btn btn-warning w-40">
          <span class="d-flex align-items-center justify-content-center text-nowrap"><i class="ti ti-pencil ti-xs me-2"></i>Edit Skor</span>
        </button>
      </div>
      <div class="card">
        <h5 class="card-header">Fixed Header</h5>
        <div class="card-datatable table-responsive">
          <table class="dt-fixedheader table">
            <thead>
              @php
                  $pembagi = 100;
              @endphp
              <tr>
                <th>komponen</th>
                <th>skor</th>
                <th>bobot unsur</th>
                <th>bobot komponen</th>
                <th>nilai unsur</th>
                <th>nilai komponen</th>
                <th>nilai akhir</th>
              </tr>
            </thead>
            <tbody>
              <th>1</th>
              <th>Akmal</th>
              <th>akmal140</th>
              <th>28-01-04</th>
              <th>5000000000</th>
              <th>Active</th>
              <th>True</th>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <div class="tab-pane fade" id="navs-profit-id" role="tabpanel">
      <div class="col-lg-3 col-12 action-table">
        <button class="btn btn-warning w-40">
          <span class="d-flex align-items-center justify-content-center text-nowrap"><i class="ti ti-pencil ti-xs me-2"></i>Edit Skor</span>
        </button>
      </div>
      <div class="card">
        <h5 class="card-header">Fixed Header</h5>
        <div class="card-datatable table-responsive">
          <table class="dt-fixedheader table">
            <thead>
              @php
                  $pembagi = 100;
              @endphp
              <tr>
                <th>komponen</th>
                <th>skor</th>
                <th>bobot unsur</th>
                <th>bobot komponen</th>
                <th>nilai unsur</th>
                <th>nilai komponen</th>
                <th>nilai akhir</th>
              </tr>
            </thead>
            <tbody>
              <th>1</th>
              <th>Akmal</th>
              <th>akmal140</th>
              <th>28-01-04</th>
              <th>5000000000</th>
              <th>Active</th>
              <th>True</th>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  {{-- </form> --}}
{{-- </div> --}}
@endsection
