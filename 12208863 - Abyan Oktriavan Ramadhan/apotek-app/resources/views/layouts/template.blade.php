<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }} ", initial-scale="1">
    <title>Apotek-app</title>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary animate__animated animate__tada">
        <div class="container">
            <a class="navbar-brand" href="">Apotek APP</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('index') }}">Dashboard</a>
                    </li>
                    @if (Auth::check())
                        @if (Auth::user()->role == 'admin')
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Obat
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="{{ route('medicine.index') }}">Data</a></li>
                                    <li><a class="dropdown-item" href="{{ route('medicine.create') }}">Tambah</a></li>
                                    <li><a class="dropdown-item" href="{{ route('medicine.stock') }}">Stock</a></li>
                                </ul>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('user.index') }}">Kelola Akun</a>
                            </li>
                        @endif
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}">Logout</a>
                        </li>
                        </li>
                        <li class="nav-item">
                            @if (Auth::user()->role == 'kasir')
                                <a class="nav-link" href="{{ route('kasir.order.index') }}">Pembelian</a>
                            @else
                                <a class="nav-link" href="{{ route('admin.order.data') }}">Pembelian</a>
                            @endif
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        {{-- bagian dinamis yang akan berubah tiap page nya harus diisi di file yang extends ke template ini --}}
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>

    {{-- bagian optional, bole diisi atau ngga, buat penyimpanan script tambah dari page yang di panggil --}}
    @stack('script')

</body>

</html>
