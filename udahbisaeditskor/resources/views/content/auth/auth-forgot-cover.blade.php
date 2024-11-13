@extends('layouts/blankLayout')

@section('title', 'Reset Password - Pages')

@section('vendor-style')
@vite([
  'resources/assets/vendor/libs/@form-validation/form-validation.scss'
])
@endsection

@section('page-style')
@vite([
  'resources/assets/vendor/scss/pages/page-auth.scss'
])
@endsection

@section('vendor-script')
@vite([
  'resources/assets/vendor/libs/@form-validation/popular.js',
  'resources/assets/vendor/libs/@form-validation/bootstrap5.js',
  'resources/assets/vendor/libs/@form-validation/auto-focus.js'
])
@endsection

@section('page-script')
@vite([
  'resources/assets/js/pages-auth.js'
])
@endsection

@section('content')

<div class="container-xxl">
  <div class="authentication-wrapper authentication-basic container-p-y">
    <div class="authentication-inner py-4">
      <!-- Reset Password -->
      <div class="card">
        <div class="card-body">
          <!-- Logo -->
          <div class="app-brand justify-content-center">
            <a href="{{url('/')}}" class="app-brand-link">
              <img src="{{asset('assets/img/branding/logo.png')}}" alt="logo" class="mb-3" style="width:60px">
            </a>
          </div>
          <!-- /Logo -->
          <h4 class="mb-1 pt-2">Reset Password</h4>
          <p class="mb-2">for {{ $email }}</p>
          <p class="mb-3">Please enter your new password below</p>


          <form id="formAuthentication" class="mb-3" action="{{ route('validasi-forgot-password-act') }}" method="POST">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
            <input type="hidden" name="email" value="{{ $email }}">

            <div class="mb-3 form-password-toggle">
              <label for="password" class="form-label">New Password</label>
              <div class="input-group input-group-merge">
                <input type="password" id="password" class="form-control" name="password" required />
                <span class="input-group-text cursor-pointer toggle-password">
                  <i class="ti ti-eye-off" id="togglePassword"></i>
                </span>
              </div>
            </div>

            <div class="mb-3 form-password-toggle">
              <label for="confirm-password" class="form-label">Confirm New Password</label>
              <div class="input-group input-group-merge">
                <input type="password" id="confirm-password" class="form-control" name="confirm_password" required />
                <span class="input-group-text cursor-pointer toggle-password">
                  <i class="ti ti-eye-off" id="toggleConfirmPassword"></i>
                </span>
              </div>
            </div>

            <button class="btn btn-primary d-grid w-100 mb-3" type="submit">Set New Password</button>
          </form>

          <div class="text-center">
            <a href="{{url('/login')}}">
              <small>Back to login</small>
            </a>
          </div>
        </div>
      </div>
      <!-- /Reset Password -->
    </div>
  </div>
</div>

<script>
  document.addEventListener("DOMContentLoaded", function () {
    function togglePasswordVisibility(toggleButtonId, passwordFieldId) {
      const toggleButton = document.getElementById(toggleButtonId);
      const passwordField = document.getElementById(passwordFieldId);

      if (toggleButton && passwordField) {
        toggleButton.addEventListener("click", function () {
          // Toggle the type attribute
          const type = passwordField.getAttribute("type") === "password" ? "text" : "password";
          passwordField.setAttribute("type", type);

          // Toggle the icon class
          if (type === "text") {
            toggleButton.classList.remove("ti-eye-off");
            toggleButton.classList.add("ti-eye");
          } else {
            toggleButton.classList.remove("ti-eye");
            toggleButton.classList.add("ti-eye-off");
          }
        });
      }
    }

    togglePasswordVisibility("togglePassword", "password");
    togglePasswordVisibility("toggleConfirmPassword", "confirm-password");
  });
</script>

@endsection
