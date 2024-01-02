@extends('layouts.template')

@section('content')
    <hr>
    <h2>Daftar Obat</h2>
    <br>
    @if (Session::get('success'))
        <div class="alert alert-success">{{ Session::get('success') }}</div>
    @endif
    @if (Session::get('deleted'))
        <div class="alert alert-warning">{{ Session::get('deleted') }}</div>
    @endif
    <table class="table table-bordered table-striped mt-3">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Tipe</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @php $no = 1 @endphp
            @foreach ($medicines as $item)
                <tr>
                    <td>{{ ($medicines->currentpage() - 1) * $medicines->perpage() + $loop->index + 1 }}</td>
                    <td>{{ $item['name'] }}</td>
                    <td>{{ $item['type'] }}</td>
                    <td>{{ $item['price'] }}</td>
                    <td>{{ $item['stock'] }}</td>
                    <td class="d-flex">
                        {{-- atau menggunakan : <a href="{{ route('medicine.edit', ['id' => $item['id']]) }}" class="btn btn-primary me-2">Edit</a> --}}
                        <a href="{{ route('medicine.edit', $item['id']) }}" class="btn btn-primary me-2">Edit</a>
                        <form action="{{ route('medicine.delete', $item['id']) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"
                                onclick="return confirm('Hapus Obat?');">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-end">
        @if ($medicines->count())
            {{ $medicines->links() }}
        @endif
    </div>
@endsection
