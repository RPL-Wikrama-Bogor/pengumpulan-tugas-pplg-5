@extends('layouts.template')

@section('content')
    @if (Session::get('success'))
        <div class="alert alert-success">{{ Session::get('success') }}</div>
    @endif
    @if (Session::get('deleted'))
        <div class="alert alert-warning">{{ Session::get('deleted') }}</div>
    @endif

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 style="font-family: Arial, Helvetica, sans-serif">Daftar Pengguna</h3>
        <a href="{{ route('user.create') }}" class="btn btn-primary">Tambah Pengguna</a>
    </div>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Role</th>
                <th>Aksi</th>   
            </tr>
        </thead>
        <tbody>
            @php $no= 1; @endphp
            @foreach ($users as $item)
                <tr>
                    <td>{{ ($users->currentpage()-1) * $users->perpage() + $loop->index + 1}}</td>
                    <td>{{ $item['name'] }}</td>
                    <td>{{ $item['email'] }}</td>
                    <td>{{ $item['role'] }}</td>
                    <td class="d-flex">
                        <a href="{{ route('user.edit', ['id' => $item['id']]) }}" class="btn btn-primary me-2">Edit</a>
                        <form method="POST" action="{{ route('user.delete', ['id' => $item['id']]) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="d-flex justify-content-end">
        @if ($users->count())
            {{ $users->links() }}
        @endif
    </div>
@endsection
