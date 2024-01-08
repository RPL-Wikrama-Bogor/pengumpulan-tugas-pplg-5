@extends('layouts.template')
@section('content')

<h1>Data Keterlambatan</h1>
<a href="{{route('terlambat.telat')}}">Data Kesuluruhan</a>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Nis</th>
            <th>Nama</th>
            <th>Jumlah Keterlambatan</th>
            <th>*</th>
        </tr>
    </thead>
    <tbody>
        @php
            $no = 1;
        @endphp
        @foreach ($datalate as $item)
          <tr>
            <td>{{$no++}}</td>
            <td>{{$item->nis}}</td>
            <td>{{$item->name}}</td>
            @foreach ($jumlahdata as $data)
              <td>{{$data->total}}</td>  
            @endforeach
            <td><a href="{{route('terlambat.cetak')}}" class="btn btn-primary ">cetak</a></td>
        </tr>  
        @endforeach
        
    </tbody>
</table>
    
@endsection