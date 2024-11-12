@extends('layouts/layoutMaster')

@section('title', 'Account settings - Account')

<!-- Vendor Styles -->
@section('vendor-style')
@vite([
  'resources/assets/vendor/libs/select2/select2.scss',
  'resources/assets/vendor/libs/@form-validation/form-validation.scss',
  'resources/assets/vendor/libs/animate-css/animate.scss',
  'resources/assets/vendor/libs/sweetalert2/sweetalert2.scss'
])
@endsection

<!-- Vendor Scripts -->
@section('vendor-script')
@vite([
  'resources/assets/vendor/libs/select2/select2.js',
  'resources/assets/vendor/libs/@form-validation/popular.js',
  'resources/assets/vendor/libs/@form-validation/bootstrap5.js',
  'resources/assets/vendor/libs/@form-validation/auto-focus.js',
  'resources/assets/vendor/libs/cleavejs/cleave.js',
  'resources/assets/vendor/libs/cleavejs/cleave-phone.js',
  'resources/assets/vendor/libs/sweetalert2/sweetalert2.js'
])
@endsection

<!-- Page Scripts -->
@section('page-script')
@vite(['resources/assets/js/pages-account-settings-account.js'])
@endsection

@section('content')
<h4 class="py-3 mb-4">
  <span class="text-muted fw-light">Account Settings /</span> Account
</h4>

<div class="row">
  <div class="col-md-12">
    <ul class="nav nav-pills flex-column flex-md-row mb-4">
      <li class="nav-item"><a class="nav-link active" href="javascript:void(0);"><i class="ti-xs ti ti-users me-1"></i> Account</a></li>
      <li class="nav-item"><a class="nav-link" href="{{ route('admin.pages-account-settings-security', ['id' => Auth::user()->id]) }}"><i class="ti-xs ti ti-lock me-1"></i> Security</a></li>
    </ul>
    <div class="card mb-4">
      <h5 class="card-header">Profile Details</h5>
      <!-- Account -->
      <form action="{{ route('admin.update.profil', ['id' => Auth::user()->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="card-body">
          <div class="d-flex align-items-start align-items-sm-center gap-4">
            <img src="{{ Auth::user()->image ? asset('storage/' . Auth::user()->image) : asset('assets/img/avatars/14.png') }}"
                 alt="user-avatar" class="d-block w-px-100 h-px-100 rounded" id="uploadedAvatar" />
            <div class="button-wrapper">
              <label for="upload" class="btn btn-primary me-2 mb-3" tabindex="0">
                <span class="d-none d-sm-block">Upload new photo</span>
                <i class="ti ti-upload d-block d-sm-none"></i>
                <input type="file" id="upload" class="form-control" id="image" name="image"/>
              </label>
              <button type="button" class="btn btn-label-secondary account-image-reset mb-3" onclick="resetImage()">
                <i class="ti ti-refresh-dot d-block d-sm-none"></i>
                <span class="d-none d-sm-block">Reset</span>
              </button>
              <div class="text-muted">Allowed JPG,PNG, and JPEG. Max size of 2MB</div>
              @error('image')
              <span class="invalid-feedback" role="alert"></span>
                  <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
          </div>
        </div>
        <hr class="my-0">
        <div class="card-body">
          <div class="row">
            <div class="mb-3 col-md-6">
              <label for="firstName" class="form-label">First Name</label>
              <input class="form-control" type="text" id="firstname" name="firstname" value="{{ Auth::user()->firstname }}" autofocus />
              @error('firstname')
              <span class="invalid-feedback" role="alert"></span>
                  <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
            <div class="mb-3 col-md-6">
              <label for="lastName" class="form-label">Last Name</label>
              <input class="form-control" type="text" name="lastname" id="lastname" value="{{ Auth::user()->lastname }}" />
              @error('lastname')
              <span class="invalid-feedback" role="alert"></span>
                  <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
            <div class="mb-3 col-md-6">
              <label for="email" class="form-label">E-mail</label>
              <span class="d-block">{{ Auth::user()->email }}</span>
            </div>
            <div class="mb-3 col-md-6">
              <label for="organization" class="form-label">Username</label>
              <span class="d-block">{{ Auth::user()->username }}</span>
            </div>
          </div>
          <div class="mt-2">
            <button type="submit" class="btn btn-primary me-2">Save changes</button>
            <button type="reset" class="btn btn-label-secondary">Cancel</button>
          </div>
        </div>
      </form>
      </div>
      <!-- /Account -->
    </div>
  </div>
</div>

<script>
  function resetImage() {
      if (confirm('Are you sure you want to reset your profile image to the default?')) {
          fetch("{{ route('admin.reset.image', ['id' => Auth::user()->id]) }}", {
              method: 'POST',
              headers: {
                  'X-CSRF-TOKEN': '{{ csrf_token() }}',
                  'Content-Type': 'application/json'
              },
              body: JSON.stringify({ _method: 'PUT' })
          })
          .then(response => response.json())
          .then(data => {
              if (data.success) {
                  // Ganti gambar dengan default secara langsung tanpa refresh
                  document.getElementById('uploadedAvatar').src = "{{ asset('assets/img/avatars/14.png') }}";
              } else {
                  alert('Failed to reset image.');
              }
          })
          .catch(error => console.error('Error:', error));
      }
  }
</script>

@endsection
