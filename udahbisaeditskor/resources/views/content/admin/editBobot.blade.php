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
                            <td><strong>{{ $elm->nama_komponen }}</strong></td>
                            <form id="skorForm-{{ $elm->id_komponen }}" method="POST">
                              @csrf
                              @method('PUT')
                              <th>
                                <div style="display: flex; align-items: center;">
                                    <input style="width: 75px;" type="text" class="form-control" id="bobot_komInput-{{ $elm->id_komponen }}" placeholder="Bobot Komponen...." name="bobot_komponen" value="{{ old('bobot_komponen', $elm->bobot_komponen*100) }}" /><span style="font-size: 1.5em; font-weight: bold; margin-left: 5px">%</span>
                                </div>
                              </th>
                              <th>
                                  <button type="button" class="btn btn-success" onclick="submitbobot({{ $elm->id_komponen }})">
                                      <i class="ti ti-check ti-xs me-2"></i>Submit Bobot
                                  </button>
                              </th>
                            </form>
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
                                  <div style="display: flex; align-items: center;">
                                      <input style="width: 75px;" type="text" class="form-control" id="bobotUnsInput-{{ $uns->id_komponen }}" placeholder="Bobot Unsur...." name="bobot_unsur" value="{{ old('bobot_unsur', $uns->bobot_unsur) }}" /><span style="font-size: 1.5em; font-weight: bold; margin-left: 5px">%</span>
                                  </div>
                                </th>
                                <th>
                                    <button type="button" class="btn btn-success" onclick="submitunsur({{ $uns->id_komponen }})">
                                        <i class="ti ti-check ti-xs me-2"></i>Submit Bobot
                                    </button>
                                </th>
                              </form>
                            </tr>
                          @endif
                          @foreach ($data[2]->where('kom_id_komponen', $uns->id_komponen) as $sub)
                              <tr>
                                  <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $sub->nama_komponen }}</td>
                                  <form id="skorForm-{{ $sub->id_komponen }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <th>
                                      <div style="display: flex; align-items: center;">
                                        <input style="width: 75px;" type="text" class="form-control" id="bobotUnsInput-{{ $sub->id_komponen }}" placeholder="Bobot Unsur...." name="bobot_unsur" value="{{ old('bobot_unsur', $sub->bobot_unsur) }}" /><span style="font-size: 1.5em; font-weight: bold; margin-left: 5px">%</span>
                                    </div>
                                    </th>
                                    <th>
                                      <button type="button" class="btn btn-success" onclick="submitunsur({{ $sub->id_komponen }})">
                                        <i class="ti ti-check ti-xs me-2"></i>Submit Bobot
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
        function submitbobot(id_komponen) {
            // Ambil nilai input dari form
            var bobot_komponen = $('#bobot_komInput-' + id_komponen).val();
            var bobot_komAkhir = bobot_komponen / 100;

            // Kirim data dengan AJAX
            $.ajax({
                url: "{{ url('/submitbobot') }}/" + id_komponen,  // URL untuk mengirim data
                method: "PUT",
                data: {
                    _token: "{{ csrf_token() }}",  // Token CSRF untuk keamanan
                    bobot_komponen: bobot_komAkhir  // Data skor yang akan dikirim
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
            console.log(bobot_komAkhir);
        }

        function submitunsur(id_komponen) {
            // Ambil nilai input dari form
            var bobot_unsur = $('#bobotUnsInput-' + id_komponen).val();
            var bobot_unsAkhir = bobot_unsur / 100;

            // Kirim data dengan AJAX
            $.ajax({
                url: "{{ url('/submitunsur') }}/" + id_komponen,  // URL untuk mengirim data
                method: "PUT",
                data: {
                    _token: "{{ csrf_token() }}",  // Token CSRF untuk keamanan
                    bobot_unsur: bobot_unsAkhir  // Data skor yang akan dikirim
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
            console.log(bobot_unsAkhir);
        }
    </script>
  </div>
  {{-- </form> --}}
{{-- </div> --}}
@endsection
