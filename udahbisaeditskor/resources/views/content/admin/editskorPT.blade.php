@extends('layouts/layoutMaster')

@section('title', 'Basic Inputs - Forms')

@section('page-script')
@vite('resources/assets/js/form-basic-inputs.js')
@endsection


@section('content')
    <a href="{{ route('admin.admin') }}" class="btn btn-warning w-40 mb-2"><i class="ti ti-pencil ti-xs me-2"></i>Kembali</a>
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
                      @foreach ($data[0] as $elm)
                        <tr>
                            <td colspan="3" style="text-transform: uppercase;"><strong>{{ $elm->nama_komponen }}</strong></td>
                        </tr>
                        @foreach ($data[1]->where('kom_id_komponen', $elm->id_komponen) as $uns)
                          @if ($uns->has_child == true)
                          <tr>
                            <td colspan="3"><strong>&nbsp;&nbsp;&nbsp;{{ $uns->nama_komponen }}</strong></td>
                          </tr>
                          @endif
                          @if ($uns->has_child == false)
                            <tr>
                              <td><strong>&nbsp;&nbsp;&nbsp;{{ $uns->nama_komponen }}</strong></td>
                              <form id="skorForm-{{ $uns->id_komponen }}" method="POST">
                                @csrf
                                @method('PUT')
                                <th>
                                  <div>
                                      <input type="text" class="form-control" id="skorInput-{{ $uns->id_komponen }}" placeholder="Skor ...." name="skor" value="{{ old('skor', $uns->skor) }}" />
                                  </div>
                                </th>
                                <th>
                                    <button type="button" class="btn btn-success" onclick="submitSkor({{ $uns->id_komponen }})">
                                        <i class="ti ti-check ti-xs me-2"></i>Submit Skor
                                    </button>
                                </th>
                              </form>
                            </tr>
                          @endif
                          @foreach ($data[2]->where('kom_id_komponen', $uns->id_komponen) as $sub)
                              <tr>
                                  <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $sub->nama_komponen }}</td>
                                  <form id="skorForm-{{ $uns->id_komponen }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <th>
                                      <div>
                                          <input type="text" class="form-control" id="skorInput-{{ $sub->id_komponen }}" placeholder="Skor ...." name="skor" value="{{ old('skor', $sub->skor) }}" />
                                      </div>
                                    </th>
                                    <th>
                                        <button type="button" class="btn btn-success" onclick="submitSkor({{ $sub->id_komponen }})">
                                            <i class="ti ti-check ti-xs me-2"></i>Submit Skor
                                        </button>
                                    </th>
                                  </form>
                              </tr>
                          @endforeach
                        @endforeach
                      @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript">
        function submitSkor(id_komponen) {
            // Ambil nilai input dari form
            var skor = $('#skorInput-' + id_komponen).val();
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
                url: "{{ url('/submitskor') }}/" + id_komponen,  // URL untuk mengirim data
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
