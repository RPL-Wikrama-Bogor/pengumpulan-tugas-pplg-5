@extends('layouts.template')
@section('content')
    @if (session('hapus'))
    <div class="alert alert-success">
        {{session('hapus')}}
    </div>
        
    @endif
    @if (session('success'))
    <div class="alert alert-success">
        {{session('success')}}
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
     <h1>Data Keterlambatan</h1>
     <a href="{{route('terlambat.rekaptulasi')}}">Rekaptulasi data</a>
     <div class="lapor">
     <a href="{{route('terlambat.create')}}" class="btn btn-primary ">lapor</a>
    </div>
     <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Siswa</th>
                <th>Tanggal</th>
                <th>Keterangan</th>
                <th>aksi</th>
            </tr>
        </thead>
        <tbody>
            @php 
            $no = 1;
            @endphp
    
            @foreach ($datalate as $item)
            <tr>
                <td>{{ $no++ }}</td> 
                <td>{{$item->name_id}}</td> 
                <td>{{ $item->date_time_late }}</td>
                <td>{{ $item->information }}</td>
                <td>
                    
                    <div class="aksi">
                    <a href="" class="btn btn-primary">edit</a>
                    <a href="{{route('terlambat.hapus',$item->id)}}" class="btn btn-danger">delete</a>
                </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
</body>
</html>
@endsection
<style>
        .aksi{
            display: flex;
        }
        .lapor{
            float: right;
        }
        
        
</style>