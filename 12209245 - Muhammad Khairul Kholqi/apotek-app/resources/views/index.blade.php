{{--panggil file template--}}
@extends('layouts.template')

{{--isi bagian yield--}}
@section('content')
<div class="jumbotron py-4 px-5">
    @if(Session::get('failed'))
        <div class="alert alert-danger">{{ Session::get('failed') }}</div>
    @endif
    @if(Session::get('message'))
        <div class="alert alert-danger">{{ Session::get('message') }}</div>
    @endif
    <h1 class="display-3">
        Selamat datang, {{ Auth::user()->name }}!
    </h1>
    <hr class="my-4">
    <p>
        Aplikasi ini di gunakan hanya oleh pegawai administrator apotek. Digunakan untuk mengelola data obat, penyetokan, juga pembelian (kasir).
    </p>
</div>
@endsection