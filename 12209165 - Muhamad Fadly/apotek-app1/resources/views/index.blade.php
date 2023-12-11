{{-- pangil file tempalte --}}
@extends('layouts.template')
{{-- isi bagian yield --}}
@section('content')
@if (Session::get('filed'))
<div class="alert alert-danger mt-3">{{ Session::get('filed')}}</div>
@endif
<div class="jumbotron py-4 px-5" style="margin-top: 230px;">
   
    <h1 class="dispaly-4" style="color: blue;font-size:70px">
        <marquee width="1000" height="90" >selamat datang,{{Auth::user()->name}}!</marquee>
    </h1>
    <hr class="my-4" >
    <p style="text-align:center">aplikasi ini di gunakan hanya oleh pegawai administrator APOTEK. di gunakan untuk mengelola data obat,penyetokan,juga pembelian (kasir).</p>
</div>
@endsection

