@extends('layouts.layoutMaster')

@section('title', 'User List')

@section('content')
<div class="container my-4">
    <!-- Menampilkan pesan sukses atau error -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <div class="col-12 col-md-8 card-separator">
      <h3>Welcome back, {{ Auth::user()->username }} 👋🏻 </h3>
      <div class="col-12 col-lg-8">
        <p>Selamat Datang , Ayo Mulai Kelola Data Dengan Baik</p>
      </div>
    </div>

    <div class="d-flex justify-content-end mb-3">
        <a href="{{ url('/register') }}" class="btn btn-success btn-lg">Tambah User</a>
    </div>

    <div class="mb-0" style="margin-bottom: 0 !important;">
      <span class="text-muted">Total Users: <strong>{{ $usersCount }}</strong></span>
    </div>

    <!-- Tabel Daftar User -->
    <table class="table table-striped table-bordered" style="margin-top: 0;">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Profile Picture</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @php
            $no = 1;
            @endphp
            @foreach($users as $user)
            @if ($user->isSuperadmin == false)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $user->firstname . ' ' . $user->lastname }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    {{'Admin' }}
                </td>
                <td>
                    @if($user->image)
                        <img src="{{ asset('storage/'.$user->image) }}" alt="Profile Picture" class="img-fluid" style="max-width: 50px; height: 50px; object-fit: cover;">
                    @else
                        <span>No Image</span>
                    @endif
                </td>
                <td>
                    <!-- Tombol Delete -->
                    <form action="{{ route('users.delete', $user->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Are you sure you want to delete this user?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
            @endif
            @endforeach
        </tbody>
    </table>
</div>
@endsection
