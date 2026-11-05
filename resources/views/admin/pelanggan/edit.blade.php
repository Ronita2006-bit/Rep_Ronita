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
                        <a href="{{ route('pelanggan.index') }}">Pelanggan</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Data</li>
                </ol>
            </nav>

            <h1 class="h4">Edit Pelanggan</h1>
            <p class="mb-0">Form untuk mengubah data pelanggan.</p>
        </div>

        <div>
            <a href="{{ route('pelanggan.index') }}" class="btn btn-primary">Kembali</a>
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

    <!-- Form Edit Pelanggan -->
    <div class="card border-0 shadow mb-4">
        <div class="card-body">

            <form action="{{ route('pelanggan.update', ['pelanggan' => $dataPelanggan->pelanggan_id]) }}"
                method="POST">

                @csrf
                @method('PUT')

                <div class="row mb-4">

                    <!-- Kolom 1 -->
                    <div class="col-lg-4 col-sm-6">

                        <div class="mb-3">
                            <label for="first_name" class="form-label">First Name</label>
                            <input type="text" id="first_name" name="first_name" class="form-control"
                                value="{{ old('first_name', $dataPelanggan->first_name) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="last_name" class="form-label">Last Name</label>
                            <input type="text" id="last_name" name="last_name" class="form-control"
                                value="{{ old('last_name', $dataPelanggan->last_name) }}" required>
                        </div>

                    </div>

                    <!-- Kolom 2 -->
                    <div class="col-lg-4 col-sm-6">

                        <div class="mb-3">
                            <label for="birthday" class="form-label">Birthday</label>
                            <input type="date" id="birthday" name="birthday" class="form-control"
                                value="{{ old('birthday', $dataPelanggan->birthday ? \Carbon\Carbon::parse($dataPelanggan->birthday)->format('Y-m-d') : '') }}">
                        </div>

                        <div class="mb-3">
                            <label for="gender" class="form-label">Gender</label>
                            <select id="gender" name="gender" class="form-select">
                                <option value="">-- Pilih --</option>
                                <option value="Female"
                                    {{ old('gender', $dataPelanggan->gender) == 'Female' ? 'selected' : '' }}>
                                    Female
                                </option>
                                <option value="Male"
                                    {{ old('gender', $dataPelanggan->gender) == 'Male' ? 'selected' : '' }}>
                                    Male
                                </option>
                                <option value="Other"
                                    {{ old('gender', $dataPelanggan->gender) == 'Other' ? 'selected' : '' }}>
                                    Other
                                </option>
                            </select>
                        </div>

                    </div>

                    <!-- Kolom 3 -->
                    <div class="col-lg-4 col-sm-12">

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" id="email" name="email" class="form-control"
                                value="{{ old('email', $dataPelanggan->email) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="text" id="phone" name="phone" class="form-control"
                                value="{{ old('phone', $dataPelanggan->phone) }}">
                        </div>

                        <div>
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                            <a href="{{ route('pelanggan.index') }}" class="btn btn-outline-secondary ms-2">Batal</a>
                        </div>

                    </div>

                </div>

            </form>

        </div>
    </div>

    {{-- end main content --}}
@endsection
