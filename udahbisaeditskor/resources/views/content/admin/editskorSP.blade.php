@extends('layouts/layoutMaster')

@section('title', 'Basic Inputs - Forms')

@section('page-script')
@vite('resources/assets/js/form-basic-inputs.js')
@endsection


@section('content')
  <a href="{{ route('admin') }}" class="btn btn-warning w-40"><i class="ti ti-pencil ti-xs me-2"></i>Kembali</a>
  <div class="tab-content p-0 ms-0 ms-sm-2">
    <div class="tab-pane fade show active" id="navs-orders-id" role="tabpanel">
      <div class="card">
          <h5 class="card-header">Struktur dan Proses</h5>
          <!-- Tempat notifikasi sukses -->
          <div id="successMessage" class="alert alert-success" style="display: none;">
              Data skor berhasil disimpan!
          </div>
          <div id="failMessage" class="alert alert-danger" style="display: none;">
            Skor maksimal 5!
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
                      @foreach ($dataSP as $dSP)
                          <tr>
                              <th>{{ $dSP->unsur }}</th>
                              <form id="skorForm-{{ $dSP->id }}" method="POST">
                                  @csrf
                                  @method('PUT')
                                  <th>
                                      <div>
                                          <input type="text" class="form-control" id="skorInput-{{ $dSP->id }}" placeholder="Skor ...." name="skor" value="{{ old('skor', $dSP->skor) }}" />
                                      </div>
                                  </th>
                                  <th>
                                      <button type="button" class="btn btn-success" onclick="submitSkor({{ $dSP->id }})">
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
                url: "{{ url('admin/submitskorSP') }}/" + id,  // URL untuk mengirim data
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