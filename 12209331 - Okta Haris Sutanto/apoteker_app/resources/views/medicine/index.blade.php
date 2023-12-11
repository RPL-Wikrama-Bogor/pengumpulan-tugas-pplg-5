@extends('layouts.template')

@section('content')
@if(Session::get('success'))
    <div class="alert alert-success">{{ Session::get('success') }}</div>
@endif
@if(Session::get('deleted'))
    <div class="alert alert-danger">{{ Session::get('deleted') }}</div>
@endif
<table class="table table-bordered table-striped mt-3">
    <thead>
        <tr>
            <th>#</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Role</th>
            <th class="d-flex justify-content-center">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @php $no = 1; @endphp
        @foreach($medicines as $item)
        <tr>
            <td>{{( $medicines->currentpage()-1) * $medicines->perpage() + $loop->index + 1}}</td>
            <td>{{ $item['name'] }}</td>
            <td>{{ $item['type'] }}</td>
            <td>{{ $item['price'] }}</td>
            <td>
                {{-- atau kalau path parameternya  --}}
                <div class="d-flex justify-content-center">
                <a href="{{route('medicine.edit', ['id' => $item['id']])}}" class="btn btn-primary me-2">Edit</a>

                <form action="{{ route('medicine.delete', $item['id']) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus obat ini?')">Hapus</button>
                </form>
                
            </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<div class="d-flex justify-content-end">
    @if ($medicines->count())
    {{$medicines->links()}}
    @endif
</div>
@endsection