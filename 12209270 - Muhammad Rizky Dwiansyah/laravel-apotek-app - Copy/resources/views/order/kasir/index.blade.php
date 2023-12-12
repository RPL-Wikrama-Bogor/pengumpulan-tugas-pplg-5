@extends('layout.template')

@section('content')
     <div class="mt-5 d-flex justify-content-end">
        <a href="" class="btn btn-primary">Tambah Pembelian</a>
     </div>
     <table class="table table-stripped table-bordered">
        <thead>
            <th>
                <tr>No</tr>
                <tr>Pembeli</tr>
                <tr>Obat</tr>
                <tr>Kasir</tr>
                <tr>Aksi</tr>
            </th>
        </thead>
        <tbody></tbody>
     </table>
@endsection