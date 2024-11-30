@extends('layouts.layoutMaster')

@section('title', 'User List')

@section('content')
<div class="container my-4">
    <h1 class="my-4 text-center">User List</h1>

    <!-- Kotak untuk Menampilkan Jumlah User -->
    <div class="row">
        <div class="col-md-3">
            <!-- Kotak Card untuk Total Users dengan ukuran lebih kecil -->
            <div class="card mb-4" style="width: 120px; height: 120px; border-radius: 8px;">
                <div class="card-body d-flex flex-column justify-content-center align-items-center">
                    <h4 class="text-center" style="font-size: 1rem;">Total Users:</h4>
                    <!-- Menggunakan <h1> untuk menampilkan angka dengan ukuran lebih besar -->
                    <h1 class="text-center text-primary" style="font-size: 1.2rem; margin-top: 4px;">
                        {{ $usersCount }}
                    </h1>
                </div>
            </div>
        </div>
    </div>

    <!-- Tombol Tambah User -->
    <div class="d-flex justify-content-end mb-3">
        <a href="{{ url('/register') }}" class="btn btn-success btn-lg">Tambah User</a>
    </div>

    <!-- Tabel Daftar User -->
    <table class="table table-striped table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Profile Picture</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->firstname . ' ' . $user->lastname }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        {{ $user->isSuperadmin ? 'Superadmin' : 'Admin' }}
                    </td>
                    <td>
                        @if($user->image)
                            <img src="{{ asset('storage/'.$user->image) }}" alt="Profile Picture" class="img-fluid" style="max-width: 50px; height: 50px; object-fit: cover;">
                        @else
                            <span>No Image</span>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
