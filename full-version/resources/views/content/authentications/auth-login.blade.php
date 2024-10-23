@extends('layouts.blankLayout')

@section('content')
<div class="container d-flex justify-content-center align-items-center vh-100">
  <div class="card shadow-lg p-3 mb-5 bg-white rounded" style="width: 24rem;">
    <div class="card-body">
      <div class="text-center mb-4">
        <img src="{{asset('assets/img/branding/logo.png')}}" alt="Logo" class="mb-3" style="width: 100px;">
        <h3 class="card-title">Welcome to SPIP POLBAN</h3>
        <p class="text-muted">Please Sign in to your Account and start analyzing data</p>
      </div>

      <form id="formAuthentication" class='mb-3' action="{{url('/')}}" method="GET">
        <div class="form-group mb-3">
          <label for="email-username" class="form-label">Email or Username</label>
          <input type="text" class="form-control" name="email-username" id="email-username" placeholder="Enter your email or username" autofocus>
        </div>
        <div class="mb-3 form-password-toggle">
          <div class="d-flex justify content-between">
            <label class="form-label" for="password">Password</label>
            <a href="{{url('auth/forgot-password-cover')}}">
              <small>Forgot Password?</small>
            </a>
          </div>
          <div class="input-group input-group-merge">
            <input type="password" class="form-control" name="password" id="password" placeholder="Enter your password" aria-describedby="password">
            <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
          </div>
        </div>

      </form>
    </div>
  </div>
</div>
@endsection
