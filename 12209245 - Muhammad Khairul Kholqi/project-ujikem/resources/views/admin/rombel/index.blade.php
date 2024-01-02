@extends('layouts.template')

@section('content')
<div class="title-user ml-[300px] mt-[50px]">
    <h1 class="text-[50px] font-bold">Data Rombel</h1>
    <p class=" mt-[10px]">Home | Data Master | <span style="font-weight: bold">Data Rombel</span></p>
    <p class=" mt-[10px] mb-[10px]" >Total Rombel: {{ $totalRombel }}</p>
</div>
    <div class="ml-[300px]">
         <div class="d-grid gap-2 d-md-flex justify-content-md-str">
        <a href="{{ route('rombel.create') }}" class="btn btn-primary me-md-2"><i class="bi bi-plus-circle mr-[5px]"></i>Tambah Data</a>
    </div>
    <form action="{{ route('rombel.search') }}" method="get">
    <div class="input-group mb-3 mt-3">
        <input type="text" class="form-control" placeholder="Cari rombel.." aria-label="Recipient's username" aria-describedby="button-addon2" name="search">
        <button class="btn btn-primary bg-info" type="submit" id="button-addon2"><i class="bi bi-search"></i></button>
        <a href="{{ route('rombel.index') }}" class="btn btn-outline-secondary me-md-2 ">Reload</a>
    </div>
    </form>
    <table class="table table-bordered table-striped mt-3">
        <thead>
            <tr class="text-center">
                <th>No</th>
                <th>Rombel</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @php
                $no = 1;
            @endphp
            @foreach ($rombels as $item)
                <tr class="text-center">
                    <td>{{( $rombels->currentpage()-1) * $rombels->perpage() + $loop->index + 1}}</td>
                    <td>{{ $item['rombel'] }}</td>
                    <td class="d-flex justify-content-center">
                        <a href="{{ route('rombel.edit', $item['id'])}}" class="btn btn-primary me-2"><i class="bi bi-pencil-square"></i></a>
                        <form action="{{ route('rombel.delete', $item['id']) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn bg-danger" onclick="return confirm('Yakin mau hapus data!')"><i class="bi bi-trash text-white"></i></button>
                        </form>
                </tr>
                @php $no++; @endphp
            @endforeach
        </tbody>
    </table>
    </div>
     <div class="d-flex justify-content-end">
  @if($rombels->count())
      {{$rombels->links()}}
  @endif   
     </div>
  <br><br>
@endsection