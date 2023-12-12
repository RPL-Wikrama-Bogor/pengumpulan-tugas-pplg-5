@extends('layouts.template')

@section('content')
    @if (Session::get('success'))
    <div class="alert alert-success mt-5">{{ Session::get('success') }}</div>
    @endif

    @if (Session::get('deleted'))
    <div class="alert alert-warning mt-5">{{ Session::get('deleted') }}</div>
    @endif
    <table class="table table-bordered table-striped mt-5">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama</th>
                <th>Tipe</th>
                <th>Harga</th>
                <th>Stock</th>
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
                        {{-- kalau path parameternya lebih dari satu : route('medicine.edit' , ['paraml' =>isi1, 'param2' =>$isi2]) --}}
                        <a href="{{ route('user.edit', $item['id']) }}" class="btn btn-primary me-2"><i class="fa-solid fa-pen-to-square"></i></a>
                        <form action="{{ route('user.delete' , $item['id']) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{-- memunculkan pagination --}}
    <div class="d-flex justify-content-end">
        @if ($medicines->count())
            {{-- pagination dimunculin hanya jika  data medicines nya ada /> 0 --}}
            {{ $medicines->links() }}
        @endif
    </div>
@endsection