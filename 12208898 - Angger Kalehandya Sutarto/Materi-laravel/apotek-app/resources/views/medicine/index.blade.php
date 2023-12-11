@extends('layouts.template')

@section('content')
<h1 class="text-center mt-3 p-3">Data Obat</h1>
        {{-- kalau kedeteksi ada with session namanya 'success' pas masuk ke halaman ini, msg nya bakal dimunculin disini --}}
        @if (Session::get('success'))
            <div class="alert alert-success">{{ Session::get('success') }}</div>
        @endif

        @if (Session::get('deleted'))
            <div class="alert alert-warning">{{ Session::get('deleted') }}</div>
        @endif

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama</th>
                <th>Tipe</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @php $no = 1;  @endphp
            @foreach ($medicines as $item)
                <tr>
                    <td></td>
                    <td>{{ $item['name'] }}</td>
                    <td>{{ $item['type'] }}</td>
                    <td>{{ $item['price'] }}</td>
                    <td>{{ $item['stock'] }}</td>
                    <td class="d-flex justify-content-center">
                        {{-- atau kalau path parameternya ada lebih dari satu : route('medicine.edit', ['param1' => $isi1. 'param2' => $isi2]) --}}
                        <a href="{{ route('medicine.edit', $item['id']) }}" class="btn btn-primary me-2">Edit</a>
                        <form action="{{ route('medicine.delete', $item['id']) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>                       
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="d-flex justift-content-end">
        
    </div>
@endsection