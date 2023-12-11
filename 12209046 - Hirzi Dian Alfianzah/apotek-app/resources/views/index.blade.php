{{-- panggil file template --}}
@extends('layouts.template')

{{-- isi bagian yield --}}
@section('content')
    <div class="jumbotron py-4 px-5">
        <h1 class="display-4">
            @if (Session::get('failed'))
                <div class="alert alert-danger">{{ Session::get('failed') }}</div>
                
            @endif

            @if (Session::get('sudahLogin'))
                <div class="alert alert-danger">{{ Session::get('sudahLogin') }}</div>
                
            @endif
            Selamat Datang! {{ Auth::user()->name }}
        </h1>
        <hr class="my-4">
        <p>
            aplikasi ini digunakan hanya oleh pegawai administrator Apotek. Digunakan untuk mengelola data obat, Penyetokan,
            juga pembelian(kasir).
        </p>
    </div>
@endsection
