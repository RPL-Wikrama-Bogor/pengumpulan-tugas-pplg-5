{{-- Panggil file template --}}
@extends('layouts.template')

{{-- Isi bagian yield --}}
@section('content')
<div class="jumbotron py-4 px-5 bg-light">
    @if (Session::get('failed'))
    <div class="alert alert-danger">{{ Session::get('failed') }}</div>
    @endif

    @if (Session::get('sudah'))
    <div class="alert alert-danger">{{ Session::get('sudah') }}</div>
    @endif
    
    <div class="row">
        <div class="col-md-6">
            <img src="{{ asset('img/Yuji.jpeg') }}" alt="Welcome Image" class="img-fluid rounded">
        </div>
        <div class="col-md-6">
            <h1 class="display-4">
                Selamat datang, <strong>{{ Auth::user()->name }}!</strong>
            </h1>
            <hr class="my-4">
            <p>
                Aplikasi ini digunakan oleh pegawai administrator apotek untuk mengelola data obat, penyetokan, serta pembelian sebagai kasir.
            </p>
        </div>
    </div>
</div>
@endsection
