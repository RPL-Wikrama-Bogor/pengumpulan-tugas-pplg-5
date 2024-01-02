@extends('layouts.template')

@section('content')
    <hr>
    <h2>Daftar Orang</h2>
    <br>
    @if (Session::get('success'))
        <div class="alert alert-success">{{ Session::get('success') }}</div>
    @endif
    @if (Session::get('deleted'))
        <div class="alert alert-warning">{{ Session::get('deleted') }}</div>
    @endif
    <div class="d-flex justify-content-between">
        <a href="{{ route('user.create') }}" class="btn btn-primary">Tambah Pengguna</i></a>
    </div>
    <table class="table table-bordered table-striped mt-3">
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
            @php $no = 1 @endphp
            @foreach ($user as $item)
                <tr>
                    <td>{{ ($user->currentpage() - 1) * $user->perpage() + $loop->index + 1 }}</td>
                    <td>{{ $item['name'] }}</td>
                    <td>{{ $item['email'] }}</td>
                    <td>{{ $item['role'] }}</td>
                    <td class="d-flex">
                        <a href="{{ route('user.edit', $item['id']) }}" class="btn btn-primary me-2">Edit</a>
                        <form action="{{ route('user.delete', $item['id']) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                data-bs-target="#exampleModal">Delete</button>
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Konfigurasi Hapus</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Yakin Anda Ingin Menghapus Data ini ?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-end">
        @if ($user->count())
            {{ $user->links() }}
        @endif
    </div>
@endsection
