@extends('layouts.template')
@section('content')
@if (session('hapus'))
<div class="alert alert-success">
    {{ (session('hapus'))}}
    <a href="{{route('rombels.index')}}">Kembali</a>
</div>
@endif

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>d</title>
</head>
<body>
    <h1>Data Rombel</h1>
    <div class="tambah">
    <a class="btn btn-primary" href="{{route('rombels.create')}}">Tambah Rombel</a>
</div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>NO</th>
                <th>Rombel</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @php
            $no = 1;
            @endphp
                @foreach ($datarombel as $item)
            <tr>
                
                    
               
                <td>{{$no++;}}</td>
                <td>{{$item->rombel}}</td>
                <td>
                    <div class="aksi">
                    <a class="btn btn-primary" href="{{route('rombels.edit',$item['id'])}}">Edit</a>
                    <a class="btn btn-danger" href="{{route('rombels.hapus',$item['id'])}}">Hapus</a>
                </div>
                </td>
                
            </tr>
             @endforeach
        </tbody>
    </table>
</body>
</html>
<style>
   .aksi{
    display: flex;
   }
   .tambah{
    float: left;
   }
   
</style>
@endsection