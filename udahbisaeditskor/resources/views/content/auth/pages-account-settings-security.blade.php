@extends('layouts/layoutMaster')

@section('title', 'Account settings - Security')

@section('content')
<h4 class="py-3 mb-4">
  <span class="text-muted fw-light">Account Settings /</span> Security
</h4>

<div class="row">
  <div class="col-md-12">
    <ul class="nav nav-pills flex-column flex-md-row mb-4">
      <li class="nav-item"><a class="nav-link" href="{{ route('admin.pages-account-settings-account', ['id' => Auth::user()->id]) }}"><i class="ti-xs ti ti-users me-1"></i> Account</a></li>
      <li class="nav-item"><a class="nav-link active" href="javascript:void(0);"><i class="ti-xs ti ti-lock me-1"></i> Security</a></li>
    </ul>
    <!-- Change Password -->
    <div class="card mb-4">
      <h5 class="card-header">Change Password</h5>
      <div class="card-body">
        <form id="formAccountSettings" action="{{ route('admin.change.password', ['id' => Auth::user()->id]) }}" method="POST">
          @csrf
          @method('PUT')
          <div class="row">
            <!-- Current Password -->
            <div class="mb-3 col-md-6 form-password-toggle">
              <label class="form-label" for="currentPassword">Current Password</label>
              <div class="input-group input-group-merge">
                  <input class="form-control @error('currentPassword') is-invalid @enderror" type="password" name="currentPassword" id="currentPassword" placeholder="********" required />
                  <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
              </div>
              @error('currentPassword')
              <span class="invalid-feedback" role="alert"></span>
                  <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>

            <!-- New Password -->
            <div class="mb-3 col-md-6 form-password-toggle">
              <label class="form-label" for="newPassword">New Password</label>
              <div class="input-group input-group-merge">
                  <input class="form-control @error('newPassword') is-invalid @enderror" type="password" id="newPassword" name="newPassword" placeholder="********" required />
                  <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
              </div>
              @error('newPassword')
              <span class="invalid-feedback" role="alert"></span>
                  <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>

            <!-- Confirm New Password -->
            <div class="mb-3 col-md-6 form-password-toggle">
              <label class="form-label" for="newPassword_confirmation">Confirm New Password</label>
              <div class="input-group input-group-merge">
                  <input class="form-control @error('newPassword_confirmation') is-invalid @enderror" type="password" name="newPassword_confirmation" id="newPassword_confirmation" placeholder="********" required />
                  <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
              </div>
              @error('newPassword_confirmation')
              <span class="invalid-feedback" role="alert"></span>
                  <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>

            <!-- Submit and Cancel Buttons -->
            <div>
                <button type="submit" class="btn btn-primary me-2">Save changes</button>
                <button type="reset" class="btn btn-label-secondary">Cancel</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if ($message = Session::get('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: '{{ $message }}',
            position: 'center',
            showConfirmButton: false,
            timer: 1500
        });
    </script>
@endif

@if ($message = Session::get('error'))
    <script>
        Swal.fire({
            icon: 'error',
            title: '{{ $message }}',
            position: 'center',
            showConfirmButton: false,
            timer: 1500
        });
    </script>
@endif

@endsection
