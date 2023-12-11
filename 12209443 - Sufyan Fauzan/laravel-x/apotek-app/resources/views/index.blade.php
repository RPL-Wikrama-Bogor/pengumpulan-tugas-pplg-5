{{-- panggil apateh? --}}
@extends('layouts.template')

@section('content')
    <div class="jumbotron py-4 px-5">
        @if (Session::get('failed'))
            <div class="alert alert-danger">{{ Session::get('failed') }}</div>
        @endif
        <h1 class="display-4"> Selamat Datang, {{ Auth::User()->name }}! </h1>
        <hr class="my-4">
        <p>Aplikasi ini digunakan hanya oleh pegawai. Digunakan untuk mengelola data user, penyetokan, juga pembelian
            (kasir).</p>
    </div>
@endsection
