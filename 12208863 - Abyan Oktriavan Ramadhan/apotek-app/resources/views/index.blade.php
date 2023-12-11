{{-- panggil file template --}}
@extends('layouts.template')

{{-- isi bagian yield --}}
@section('content')
    <div class="jumborton py-4 px-5">
        @if (Session::get('failed'))
            <div class="alert alert-danger">{{ Session::get('failed') }}</div>
        @endif
        <h1 class="display-4">
            Selamat Datang {{Auth::user()->name}}!
        </h1>
        <hr class="my-4">
        <p>Aplikasi ini di gunakan hanya oleh pegawai administrator APOTEK.
             Digunakan untuk mengola data obat, penyetokan, juga pembelian (kasir).
        </p>
    </div>
@endsection