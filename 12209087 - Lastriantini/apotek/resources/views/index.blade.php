{{--panngil file template--}}
@extends('layouts.template')

{{--isi bagian yield--}}
@section('content')

<div class="jumbotron py-4 px-5">
    @if (Session::get('failed'))
        <div class="alert alert-danger">{{ Session::get('failed') }}</div>
    @endif
    <h1 class="display-4">Selamat Datang, {{ Auth::user()->name }} !</h1>
    <hr class="my-4">
    <p>Aplikasi ini digunakan hanya oleh pegawai admisnistator APOTEK. Digunakan untuk mengelola data obat, penyetokan, jua pembelian (kasir). </p>
</div>
@endsection

{{--bisa css juga--}}
@push('script')
<script>
    console.log("hello")
</script>