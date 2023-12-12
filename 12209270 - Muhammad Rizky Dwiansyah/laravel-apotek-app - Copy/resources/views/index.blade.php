{{-- panggil file template--}}
@extends('layouts.template')

{{-- isi bagian yied --}}
@section('content')
<div class="jumbotron py-4 px-5">
    @if (Session::get('failed'))
      <div class="alert alert-danger">{{ }}
    <h1 class="display-4">
        Selamat Datang! {{Auth::user()->name}}
    </h1>
    <hr class=display-4>
    <p>Aplikasi ini digunakan hanya oleh pegawai administrator APOTEK. Digunakan untuk mengelola data obat, penyetokan, juga pembelian(kasir).</p>
</div>
@endsection