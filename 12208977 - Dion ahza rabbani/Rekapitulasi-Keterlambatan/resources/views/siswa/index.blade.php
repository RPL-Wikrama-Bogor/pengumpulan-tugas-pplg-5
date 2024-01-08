@extends('layouts.template')
@section('content')
@if (session('success'))
<div class="alert alert-success">
    {{session('success')}}
</div>
@endif
@if (session('hapus'))
 <div class="alert alert-success">
    {{session('hapus')}}
 </div>
@endif
    

<h1>Data Siswa</h1>
<div class="tambah">
<a href="{{route('siswa.create')}}" class="btn btn-primary">Tambah data</a>
</div>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Nis</th>
            <th>Nama</th>
            <th>Rombel</th>
            <th>Rayon</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @php
         $no =1 ;   
        @endphp

        <tr>
            @foreach ($datasiswa as $item)
            <td>{{$no++}}</td>
            <td>{{$item->nis}}</td>
            <td>{{$item->name}}</td>
            <td>{{$item->rombel_id}}</td>
            <td>{{$item->rayon_id}}</td>
            <td> 
                <div class="aksi">
                <a class="btn btn-danger" href="{{route('siswa.hapus',$item->id)}}">Hapus</a>
                <a class="btn btn-primary" href="">edit</a>
            </div>
            </td>
            
        </tr>@endforeach
    </tbody>
</table>
    
@endsection

<style>
    .tambah{
        float: right;
    }
    .aksi{
        display: flex;
    }
    
</style>