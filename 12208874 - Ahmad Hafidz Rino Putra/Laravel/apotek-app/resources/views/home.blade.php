@extends('layouts.template')

@section('content')
<br>
    @if (Session::get('sudahLogin'))
        <div class="alert alert-danger mt5">{{ Session::get('sudahLogin') }}</div>
    @endif
    <div class="jumbotron py-4 px-5">
        <h1 class="display-4">
            Selamat Datang {{ Auth::user()->name }}
        </h1>
        <hr class="my-4">
        <p>Aplikasi ini hanya digunakan oleh pegawai administrator APOTEK. Digunakan untuk mengelola data obat, penyetokan,
            juga pembelian (kasir)</p>
    </div>
@endsection
