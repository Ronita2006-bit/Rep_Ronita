
<!--
=========================================================
* Volt Pro - Premium Bootstrap 5 Dashboard
=========================================================
* Designed and coded by Themesberg
=========================================================
-->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Edit Pelanggan - Volt Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('assets-admin/img/favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets-admin/img/favicon/favicon-32x32.png') }}">

    <link type="text/css" href="{{ asset('assets-admin/css/volt.css') }}" rel="stylesheet">
</head>

<body>

    <!-- Navbar Mobile -->
    <nav class="navbar navbar-dark navbar-theme-primary px-4 col-12 d-lg-none">
        <a class="navbar-brand me-lg-5" href="{{ route('dashboard') }}">
            <img src="{{ asset('assets-admin/img/brand/light.svg') }}" alt="Volt logo">
        </a>

        <button class="navbar-toggler d-lg-none collapsed" type="button"
            data-bs-toggle="collapse" data-bs-target="#sidebarMenu">
            <span class="navbar-toggler-icon"></span>
        </button>
    </nav>

    <!-- Sidebar -->
    <nav id="sidebarMenu" class="sidebar d-lg-block bg-gray-800 text-white collapse">
        <div class="sidebar-inner px-4 pt-3">

            <ul class="nav flex-column pt-3 pt-md-0">

                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link">
                        <span class="sidebar-text">Dashboard</span>
                    </a>
                </li>

                <li class="nav-item active">
                    <a href="{{ route('pelanggan.index') }}" class="nav-link">
                        <span class="sidebar-text">Pelanggan</span>
                    </a>
                </li>

                <li role="separator" class="dropdown-divider mt-4 mb-3 border-gray-700"></li>

                <li class="nav-item">
                    <a href="https://themesberg.com/docs/volt-bootstrap-5-dashboard/getting-started/quick-start/"
                        target="_blank" class="nav-link">
                        <span class="sidebar-text">Documentation</span>
                    </a>
                </li>

            </ul>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="content">

        <!-- Header -->
        <div class="py-4">

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

                    <li class="breadcrumb-item active" aria-current="page">
                        Edit Data
                    </li>

                </ol>
            </nav>

            <div class="d-flex justify-content-between w-100 flex-wrap">

                <div class="mb-3 mb-lg-0">
                    <h1 class="h4">Edit Pelanggan</h1>
                    <p class="mb-0">Form untuk mengubah data pelanggan.</p>
                </div>

                <div>
                    <a href="{{ route('pelanggan.index') }}" class="btn btn-primary">
                        Kembali
                    </a>
                </div>

            </div>
        </div>

        <!-- Form Edit Pelanggan -->
        <div class="row">

            <div class="col-12 mb-4">

                <div class="card border-0 shadow components-section">

                    <div class="card-body">

                        <form action="{{ route('pelanggan.update', ['pelanggan' => $dataPelanggan->pelanggan_id]) }}"
                            method="POST">

                            @csrf
                            @method('PUT')

                            <div class="row mb-4">

                                <!-- Kolom 1 -->
                                <div class="col-lg-4 col-sm-6">

                                    <!-- First Name -->
                                    <div class="mb-3">

                                        <label for="first_name" class="form-label">
                                            First Name
                                        </label>

                                        <input type="text"
                                            id="first_name"
                                            name="first_name"
                                            class="form-control"
                                            value="{{ old('first_name', $dataPelanggan->first_name) }}"
                                            required>

                                    </div>

                                    <!-- Last Name -->
                                    <div class="mb-3">

                                        <label for="last_name" class="form-label">
                                            Last Name
                                        </label>

                                        <input type="text"
                                            id="last_name"
                                            name="last_name"
                                            class="form-control"
                                            value="{{ old('last_name', $dataPelanggan->last_name) }}"
                                            required>

                                    </div>

                                </div>

                                <!-- Kolom 2 -->
                                <div class="col-lg-4 col-sm-6">

                                    <!-- Birthday -->
                                    <div class="mb-3">

                                        <label for="birthday" class="form-label">
                                            Birthday
                                        </label>

                                        <input type="date"
                                            id="birthday"
                                            name="birthday"
                                            class="form-control"
                                            value="{{ old('birthday', $dataPelanggan->birthday ? \Carbon\Carbon::parse($dataPelanggan->birthday)->format('Y-m-d') : '') }}">

                                    </div>

                                    <!-- Gender -->
                                    <div class="mb-3">

                                        <label for="gender" class="form-label">
                                            Gender
                                        </label>

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

                                    <!-- Email -->
                                    <div class="mb-3">

                                        <label for="email" class="form-label">
                                            Email
                                        </label>

                                        <input type="email"
                                            id="email"
                                            name="email"
                                            class="form-control"
                                            value="{{ old('email', $dataPelanggan->email) }}"
                                            required>

                                    </div>

                                    <!-- Phone -->
                                    <div class="mb-3">

                                        <label for="phone" class="form-label">
                                            Phone
                                        </label>

                                        <input type="text"
                                            id="phone"
                                            name="phone"
                                            class="form-control"
                                            value="{{ old('phone', $dataPelanggan->phone) }}">

                                    </div>

                                    <!-- Buttons -->
                                    <div>

                                        <button type="submit" class="btn btn-primary">
                                            Simpan Perubahan
                                        </button>

                                        <a href="{{ route('pelanggan.index') }}"
                                            class="btn btn-outline-secondary ms-2">
                                            Batal
                                        </a>

                                    </div>

                                </div>

                            </div>

                        </form>

                    </div>

                </div>

            </div>

        </div>

        <!-- Footer -->
        <footer class="bg-white rounded shadow p-5 mb-4 mt-4">

            <div class="row">

                <div class="col-12 col-md-4 col-xl-6 mb-4 mb-md-0">

                    <p class="mb-0 text-center text-lg-start">
                        © 2019-<span class="current-year"></span>
                        <a class="text-primary fw-normal"
                            href="https://themesberg.com"
                            target="_blank">
                            Themesberg
                        </a>
                    </p>

                </div>

                <div class="col-12 col-md-8 col-xl-6 text-center text-lg-start">

                    <ul class="list-inline list-group-flush list-group-borderless text-md-end mb-0">

                        <li class="list-inline-item px-0 px-sm-2">
                            <a href="https://themesberg.com/about">About</a>
                        </li>

                        <li class="list-inline-item px-0 px-sm-2">
                            <a href="https://themesberg.com/themes">Themes</a>
                        </li>

                        <li class="list-inline-item px-0 px-sm-2">
                            <a href="https://themesberg.com/blog">Blog</a>
                        </li>

                        <li class="list-inline-item px-0 px-sm-2">
                            <a href="https://themesberg.com/contact">Contact</a>
                        </li>

                    </ul>

                </div>

            </div>

        </footer>

    </main>

    <!-- Core -->
    <script src="{{ asset('assets-admin/vendor/@popperjs/core/dist/umd/popper.min.js') }}"></script>
    <script src="{{ asset('assets-admin/vendor/bootstrap/dist/js/bootstrap.min.js') }}"></script>

    <!-- Volt JS -->
    <script src="{{ asset('assets-admin/js/volt.js') }}"></script>

</body>

</html>
