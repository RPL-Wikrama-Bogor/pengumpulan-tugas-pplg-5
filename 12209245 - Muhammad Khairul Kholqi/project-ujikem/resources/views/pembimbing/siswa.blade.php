@extends('layouts.template')

@section('content')
<div class="title-user ml-[300px] mt-[50px]">
    <h1 class="text-[50px] font-bold">Data Siswa</h1>
    <p class=" mt-[10px]">Home | Data Master | <span style="font-weight: bold">Data Siswa</span></p>
    {{-- <p class=" mt-[10px] mb-[10px]">Total Siswa: {{ $totalStudents }}</p> --}}
</div>
<div class="ml-[300px]">    
    <form action="{{ route('pembimbing.search') }}" method="get">
    <div class="input-group mb-3 mt-3">
        <input type="text" class="form-control" placeholder="Cari NIS.." aria-label="Recipient's username" aria-describedby="button-addon2" name="search">
        <button class="btn btn-primary bg-info" type="submit" id="button-addon2"><i class="bi bi-search"></i></button>
        <a href="{{ route('pembimbing.siswa') }}" class="btn btn-outline-secondary">Reload</a>
    </div>
    </form>
    <table class="table table-bordered table-striped mt-3">
        <thead>
            <tr class="text-center">
                <th>No</th>
                <th>Nis</th>
                <th>Nama</th>
                <th>Rombel</th>
                <th>Rayon</th>
            </tr>
        </thead>
        <tbody>

            
            @php
                $no = 1;
            @endphp
            @foreach ($siswa as $item)
                <tr class="text-center">
                    <td>{{( $siswa->currentpage()-1) * $siswa->perpage() + $loop->index + 1}}</td>
                    <td>{{ $item['nis'] }}</td>
                    <td>{{ $item['name'] }}</td>
                    <td>{{ $item['rombel_id'] }}</td>
                    <td>{{ $item['rayon_id'] }}</td>
                </tr>
                @php $no++; @endphp
            @endforeach
        </tbody>
    </table>
</div>
     <div class="d-flex justify-content-end">
  @if($siswa->count())
      {{$siswa->links()}}
  @endif   
     </div>
     <br><br>
@endsection