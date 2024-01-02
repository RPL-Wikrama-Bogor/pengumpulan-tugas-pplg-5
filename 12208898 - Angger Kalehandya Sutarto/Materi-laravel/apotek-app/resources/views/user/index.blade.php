@extends('layouts.template')

@section('content')
    @if (Session::get('deleted'))
        <div class="alert alert-warning">{{ Session::get('deleted') }}</div>
    @endif
    {{-- kalau kedeteksi ada with session namanya 'success' pas masuk ke halaman ini, msg nya bakal dimunculin disini --}}
    @if (Session::get('success'))
        <div class="alert alert-success">{{ Session::get('success') }}</div>
    @endif
    <form action="" method="post">
        <div class="d-flex flex-row-reverse mt-2">
            <a class="btn btn-secondary" href="{{ route('user.create') }}">Tambah Pengguna</a>
        </div>
    </form>

    <table class="table table-bordered table-striped mt-4">
        <thead>
            <tr class="text-center">
                <th>#</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Role</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @php $no = 1;  @endphp
            @foreach ($users as $item)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $item['name'] }}</td>
                    <td>{{ $item['email'] }}</td>
                    <td>{{ $item['role'] }}</td>
                    <td class="d-flex justify-content-center">
                        {{-- atau kalau path parameternya ada lebih dari satu : route('medicine.edit', ['param1' => $isi1. 'param2' => $isi2]) --}}
                        {{-- <a href="{{ route('user.edit', $item['id']) }}" class="btn btn-primary me-2">Edit</a> --}}
                        <a href="{{ route('user.edit', $item['id']) }}" class="btn btn-info">Edit</a>
                        <button type="submit" class="btn btn-danger" data-bs-toggle="modal"
                            data-bs-target="#delete-akun" style="margin-left: 30px">Hapus</button>
                    </td>
                </tr>

                <!-- Modal -->
                <div class="modal fade" id="delete-akun" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Data Pengguna</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>

                            <form action="{{ route('user.delete', $item['id']) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <div class="modal-body">
                                    {{-- menyimpan alert danger --}}
                                    <div id="msg"></div>

                                    <p class="text-danger">Yakin Ingin Menghapus Data ini?</p>
                                    {{-- input type hidden, digunakan untuk data yang nantinya berguna namun tidak ingin diperlihatkan ke user --}}
                                    <input type="hidden" name="id" id="id">
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Delete</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            @endforeach
        </tbody>
    </table>

    {{-- modalll --}}
@endsection
