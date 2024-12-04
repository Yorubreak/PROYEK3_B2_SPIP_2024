@php
$customizerHidden = 'customizer-hide';
@endphp

@extends('layouts/blankLayout')

@section('title', 'Register Basic - Pages')

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

{{-- @section('page-script')
@vite([
  'resources/assets/js/pages-auth.js'
])
@endsection --}}

@section('content')
<div class="container-xxl">
  <div class="authentication-wrapper authentication-basic container-p-y">
    <div class="authentication-inner py-4">

      <!-- Register Card -->
      <div class="card">
        <div class="card-body">
          <!-- Logo -->
          <div class="app-brand justify-content-center">
            <a href="{{url('/')}}" class="app-brand-link">
              <img src="{{asset('assets/img/branding/logo.png')}}" alt="logo" class="mb-3" style="width:55px">
            </a>
          </div>
          <!-- /Logo -->
          <h4 class="mb-1 pt-2">Let's start analyze</h4>
          <p class="mb-4">Make your data look's more interesting</p>

          <form id="formAuthentication" class="mb-3" action="{{ route('auth-create') }}" method="POST">
            @csrf
            <div class="mb-3">
              <label for="fisrtname" class="form-label">First Name</label>
              <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Enter your First Name" >
              @error('firstname')
                  <span class="invalid-feedback" role="alert"></span>
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
            <div class="mb-3">
              <label for="lastname" class="form-label">Last Name</label>
              <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Enter your Last Name" >
              @error('lastname')
                  <span class="invalid-feedback" role="alert"></span>
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Enter your username" >
                @error('username')
                    <span class="invalid-feedback" role="alert"></span>
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" >
                @error('email')
                  <span class="invalid-feedback" role="alert"></span>
                      <strong>{{ $message }}</strong>
                  </span>
                @enderror
            </div>
            <div class="mb-3 form-password-toggle">
                <label class="form-label" for="password">Password</label>
                <div class="input-group input-group-merge">
                    <input type="password" id="password" class="form-control" name="password" placeholder="••••••••" aria-describedby="password"/>
                    <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off" id="togglePassword"></i></span>
                </div>
                @error('password')
                <span class="invalid-feedback" role="alert"></span>
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="mb-3">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="terms-conditions" name="terms" value="1" required>
                    <label class="form-check-label" for="terms-conditions">
                        I agree to
                        <a href="javascript:void(0);">privacy policy & terms</a>
                    </label>
                </div>
            </div>
            <button type="submit" class="btn btn-primary d-grid w-100">
                Sign up
            </button>
        </form>

          {{-- <p class="text-center">
            <span>Already have an account?</span>
            <a href="{{url('/login')}}">
              <span>Sign in instead</span>
            </a>
          </p> --}}

          {{-- <div class="divider my-4">
            <div class="divider-text">or</div>
          </div> --}}

          {{-- <div class="d-flex justify-content-center">
            <a href="javascript:;" class="btn btn-icon btn-label-facebook me-3">
              <i class="tf-icons fa-brands fa-facebook-f fs-5"></i>
            </a>

            <a href="javascript:;" class="btn btn-icon btn-label-google-plus me-3">
              <i class="tf-icons fa-brands fa-google fs-5"></i>
            </a>

            <a href="javascript:;" class="btn btn-icon btn-label-twitter">
              <i class="tf-icons fa-brands fa-twitter fs-5"></i>
            </a>
          </div> --}}
        </div>
      </div>
      <!-- Register Card -->
    </div>
  </div>
</div>

<script>
  document.addEventListener("DOMContentLoaded", function () {
    const togglePassword = document.getElementById("togglePassword");
    const passwordField = document.getElementById("password");

    if (togglePassword && passwordField) {
      togglePassword.addEventListener("click", function () {
        // Toggle the type attribute
        const type = passwordField.getAttribute("type") === "password" ? "text" : "password";
        passwordField.setAttribute("type", type);

        // Toggle the icon class
        if (type === "text") {
          togglePassword.classList.remove("ti-eye-off");
          togglePassword.classList.add("ti-eye");
        } else {
          togglePassword.classList.remove("ti-eye");
          togglePassword.classList.add("ti-eye-off");
        }
      });
    }
  });
</script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@if($message = Session::get('success'))
  <script>
    Swal.fire('{{ $message }}');
  </script>
@endif

@if ($errors->any())
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            html: `
                @foreach ($errors->all() as $error)
                    {{ $error }} <br>
                @endforeach
            `,
            confirmButtonText: 'Coba Lagi'
        });
    </script>
@endif


@endsection
