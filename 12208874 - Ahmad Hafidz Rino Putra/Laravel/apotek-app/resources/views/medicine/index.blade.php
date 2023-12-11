@extends('layouts.template')

@section('content')

@if (Session::get('success'))
        <div class="alert alert-success mt-4">{{ Session::get('success') }}</div>
    @endif
@if (Session::get('deleted'))
        <div class="alert alert-warning mt-4">{{ Session::get('deleted') }}</div>
    @endif
    <table class="table table-bordered table-striped mt-5">
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
            @php $no = 1; @endphp
            @foreach ($medicines as $item)
                <tr>
                    <td>{{ ($medicines ->currentpage()-1) * $medicines ->perpage() + $loop->index + 1 }}</td>
                    <td>{{ $item['name'] }}</td>
                    <td>{{ $item['type'] }}</td>
                    <td>{{ $item['price'] }}</td>
                    <td>{{ $item['stock'] }}</td>
                    <td class="d-flex">

                        <a href="{{ route('medicine.edit', $item['id']) }}" class="btn btn-primary me-2"><i class="fa-solid fa-pen-to-square"></i></a>
                        <form action="{{ route('medicine.delete', $item['id']) }}" method="post">
                            @csrf
                            @method('DELETE')
                        <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></button>
                    </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="d-flex justify-content-end">
        @if ($medicines->count())
            {{ $medicines->links()}}
        @endif
    </div>
@endsection