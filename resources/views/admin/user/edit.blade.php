@extends('layouts.admin.app')

@section('content')
    {{-- start main content --}}

    <!-- Header -->
    <div class="d-flex justify-content-between w-100 flex-wrap flex-md-nowrap align-items-center py-4">
        <div class="mb-3 mb-lg-0">
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
                <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
                    <li class="breadcrumb-item">
                        <a href="{{ route('dashboard') }}">
                            <i class="fas fa-home"></i>
                        </a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('user.index') }}">User</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Data</li>
                </ol>
            </nav>

            <h1 class="h4">Edit User</h1>
            <p class="mb-0">Form untuk mengubah data user.</p>
        </div>

        <div>
            <a href="{{ route('user.index') }}" class="btn btn-primary">Kembali</a>
        </div>
    </div>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Form Edit User -->
    <div class="card border-0 shadow mb-4">
        <div class="card-body">

            <form action="{{ route('user.update', ['user' => $dataUser->id]) }}" method="POST">

                @csrf
                @method('PUT')

                <div class="row mb-4">

                    <!-- Kolom 1 -->
                    <div class="col-lg-4 col-sm-6">

                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" id="name" name="name" class="form-control"
                                value="{{ old('name', $dataUser->name) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" id="email" name="email" class="form-control"
                                value="{{ old('email', $dataUser->email) }}" required>
                        </div>

                    </div>

                    <!-- Kolom 2 -->
                    <div class="col-lg-4 col-sm-6">

                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" id="password" name="password" class="form-control"
                                placeholder="Kosongkan jika tidak ingin mengubah">
                        </div>

                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Confirm Password</label>
                            <input type="password" id="password_confirmation" name="password_confirmation"
                                class="form-control">
                        </div>

                        <div>
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                            <a href="{{ route('user.index') }}" class="btn btn-outline-secondary ms-2">Batal</a>
                        </div>

                    </div>

                </div>

            </form>

        </div>
    </div>

    {{-- end main content --}}
@endsection