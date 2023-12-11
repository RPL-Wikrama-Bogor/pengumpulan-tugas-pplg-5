@extends('layouts.template')
@if (Session::get('success'))
<div class="alert alert-success">{{Session::get('success')}}</div> 
@endif
@if (Session::get('deleted'))
<div class="alert alert-warning">{{Session::get('deleted')}}</div> 
@endif
@section('content')
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama</th>
                <th>Tipe</th>
                <th>Harga</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @php $no = 1; @endphp
            @foreach ($medicines as $item)
            <tr>
                <td>{{ ($medicines ->currentpage()-1) * $medicines ->perpage() + $loop->index + 1 }}
                </td>
                <td>{{ $item['name']}}</td>
                <td>{{ $item['type']}}</td>
                <td>{{ $item['price']}}</td>
              
                    <td class="d-flex">
                    {{-- atau route('medicine.edit', ['param1' => $isi1, 'param2' => $isi2]) --}}
                    <a href="{{ route('medicine.edit', $item['id'])}}" class="btn btn-primary me-2">Edit</a>
                  <form action="{{route ('medicine.delete', $item['id'])}}" method="POST">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger">Hapus</button>
                
                </form>
            </td>
               
            </tr>
            @endforeach
        </tbody>
    </table>
    {{-- memunculkan pagination --}}
    <div class="d-flex justify-content-end">
        {{-- pagination dimunculin hanya jika data medicines nya ada / > 0 --}}
        @if($medicines->count())
            {{ $medicines->links()}}
            @endif
    </div>
    
    @endsection
