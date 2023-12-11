<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <title>Apotek APP</title>
    <link rel="icon" href="/img/apotek.png" type="image/png">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
  <nav class="navbar navbar-expand-lg bg-primary bg-opacity-75">
  <div class="container">
    <a class="navbar-brand" href="#">Apotek App</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/dashborad">Dashboard</a>
        </li>
       @if (Auth::check())
       @if (Auth::user()->role == "admin")
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Obat
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="{{route('medicine.index')}}">Data</a></li>
            <li><a class="dropdown-item" href="{{route('medicine.create')}}">Tambah</a></li>
            <li><a class="dropdown-item" href="{{route('medicine.stock')}}">Stock</a></li>
          </ul>
        </li>
          @endif
          @if (Auth::user()->role == "kasir")
          <li class="nav-item">
            <a class="nav-link" href="{{ route('kasir.order.index')}}">pembelian</a>
          </li>
          
              
          @else
          <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.order.data')}}">pembelian</a>
          </li>
          
          
          @endif
         
        @if (Auth::user()->role == "admin")
          <li class="nav-item">
            <a class="nav-link" href="{{route('user.index')}}">kelola akun</a>
        </li>
        @endif
        <li class="nav-item">
          <a class="nav-link" href="{{route('logout')}}">logout</a>
        </li>
        @endif
      </ul>
    </div>
  </div>
</nav>

<div class="container">
    {{-- bagian di namamis yang akan berubah tiap page nya, harus di diisi di file yang extends ke tamplate ini --}}

    @yield('content')
</div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    {{-- bagian optional , bole di isi atau ngga , buat menyimpan script tambahan dari page yang di pangil --}}
    @stack('script')
  </body>
</html>