{{-- panggil file template --}}
@extends('layouts.template')

@section('content')
<div class="jumbotron py-4 px-5">
    @if (Session::get('failed'))
    <div class="alert alert-danger">{{ Session::get('failed') }}</div>
    @endif
    <h1 class="display-4">
        Selamat datang,{{ Auth::user()->name }}!
    </h1>

    <hr class="my-4">
    <p>Aplikasi ini digunakan hanya oleh pegawai administrator Apotek. Digunakan untuk mengelola  data obat, penyetokan, juga pebelian (kasir).</p>
</div>
@endsection
