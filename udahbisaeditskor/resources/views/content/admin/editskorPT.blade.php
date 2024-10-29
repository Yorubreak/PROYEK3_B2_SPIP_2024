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
            <div id="successMessage" class="alert alert-success transition ease-in-out" style="display: none; position: absolute; z-index: 100; margin-top: 1rem; margin-left: 70rem">
                <span class="font-weight-bolder">Data skor berhasil disimpan!</span>
            </div>
            <div id="failMessage" class="alert alert-danger transition ease-in-out" style="display: none; position: absolute; z-index: 100; margin-top: 1rem; margin-left: 70rem">
              <span class="font-weight-bolder">Skor maksimal 5!</span>
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
            if (skor > 5) {
              $.ajax({
                success: function(response) {
                    // Tampilkan pesan sukses
                    $('#failMessage').show().delay(1500).fadeOut();
                }
              })
              return;
            }

            // Kirim data dengan AJAX
            $.ajax({
                url: "{{ url('admin/submitskorPT') }}/" + id,  // URL untuk mengirim data
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
  </div>
  {{-- </form> --}}
{{-- </div> --}}
@endsection
