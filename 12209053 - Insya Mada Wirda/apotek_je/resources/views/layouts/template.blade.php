<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Apoteker App</title>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>
  <nav class="navbar navbar-expand-lg bg-light">
  <div class="container">
    <a class="navbar-brand" href="/dashboard">Apoteker App</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="http://127.0.0.1:8000/">Dashboard</a>
        </li>

        @if (Auth::check())

        @if (Auth::user()->role == "admin")
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Obat
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="{{ route('medicine.index') }}">Data</a></li>
            <li><a class="dropdown-item" href="{{ route('medicine.create') }}">Tambah</a></li>
            <li><a class="dropdown-item" href="{{ route('medicine.stock') }}">Stock</a></li>
          </ul>
        </li>
        @endif

        <li class="nav-item">
         @if (Auth::user()->role == "kasir")
         <a class="nav-link" href="{{ route('kasir.order.index') }}">Pembelian</a>
         @else
         <a class="nav-link" href="{{ route('admin.order.data') }}">Pembelian</a>
        @endif
        </li>


        @if (Auth::user()->role == "admin")
        <li class="nav-item">
          <a class="nav-link" href="{{ route('user.index') }}">Kelola akun</a>
        </li>
        @endif

        <li class="nav-item">
          <a class="nav-link" href="{{ route('logout') }}">Logout</a>
        </li>
        @endif

        </ul>
    </div>
  </div>
</nav>

<div class="container">
  {{-- wajib diisi difile extendsnya --}}
  @yield('content')
</div>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>

  {{-- tidak wajib diisi --}}
  @stack('script')

  </body>
</html>