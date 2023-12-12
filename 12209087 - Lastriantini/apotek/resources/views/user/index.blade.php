@extends('layouts.template')

@section('content')

    @if (Session::get('success'))
    <div class="alert alert-success">{{Session::get('success')}}</div>
    @endif
    @if (Session::get('deleted'))
    <div class="alert alert-warning">{{Session::get('deleted')}}</div>
    @endif
    <br>
    <form action="{{ route('user.create') }}" method="get">
        <button type="submit" class="btn btn-secondary float-end">Kirim Data</button>
    </form>
    <br>
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
            @php $no = 1; @endphp
            @foreach ($users as $item)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $item['name'] }}</td>
                <td>{{ $item ['email'] }}</td>
                <td>{{ $item['role'] }}</td>
                <td class="d-flex">
                    {{--atau kalau path parameternya ada lebih dari satu : 
                    route('medicine.edit'),['param1'] => $isi1, 'param2' =>$isi2])--}}
                    <a href="{{ route('user.edit', $item['id']) }}" class="btn btn-primary me-2">Edit</a>
                    
                    <form action="{{ route('user.delete', $item['id']) }}" method="post">
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
            {{$users->links()}}
        @endif
    </div>

    {{-- fitur authentication (auth) untuk login atau mengatur hak akses dari user --}}
    {{-- seeder mengirim data ke databse tanpa melalui input form --}}

@endsection