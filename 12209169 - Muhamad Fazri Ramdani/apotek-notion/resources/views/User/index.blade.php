@extends('layouts.template')

@section('content')
@if(Session::get('success'))
    <div class="alert alert-success">{{ Session::get('success') }}</div>
@endif
@if(Session::get('deleted'))
    <div class="alert alert-danger">{{ Session::get('deleted') }}</div>
@endif
<div class="d-flex flex-row-reverse mt-2">
<a class="btn btn-secondary" href="{{route('user.create') }}">Tambah Pengguna</a>
</div>
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
        @foreach($users as $item)
        <tr>
            <td>{{ $users->currentpage()-1 * $users->perpage() + $loop->index + 1 }}</td>
            <td>{{ $item['name'] }}</td>
            <td>{{ $item['email'] }}</td>
            <td>{{ $item['role'] }}</td>
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
    @if ($users->count())
    {{$users->links()}}
    @endif
</div>
@endsection