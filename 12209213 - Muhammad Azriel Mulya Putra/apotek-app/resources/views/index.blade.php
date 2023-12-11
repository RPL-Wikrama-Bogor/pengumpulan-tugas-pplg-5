{{--panggil file template--}}
@extends('layouts.template')

{{--ini bagian yield--}}
@section('content')
<div class="jumbotron py-4 px-5">
    @if(Session::get('failed'))
    <div class="alert alert-danger">{{Session::get('failed')}}</div>
    @endif
    <h1 class="display-4">
        Selamat datang, {{Auth::user()->name}}
    </h1>
</div>
<hr class="my-4">
<p>Aplikasi ini digunakan hanya oleh pegawai administration apotek, digunakan untuk mengelola data obat ,penyetokan juga pembelian (kasir)</p>
</div>
@endsection