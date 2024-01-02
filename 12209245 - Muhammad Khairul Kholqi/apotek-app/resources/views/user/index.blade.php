@extends('layouts.template')

@section('content')
@if(Session::get('success'))
    <div class="alert alert-success">{{Session::get('success')}}</div>
@endif
@if(Session::get('deleted'))
    <div class="alert alert-warning">{{Session::get('deleted')}}</div>
@endif
<div class="modal-footer">
  <a href="{{route('user.create')}}"><button type="button" class="btn btn-primary" style="margin-top: 30px;">Tambah Pengguna</button></a>
</div>
<table class="table table-bordered table-striped mt-3">
  <thead>
      <tr class="text-center">
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
    <tr class="text-center">
        <td>{{( $users->currentpage()-1) * $users->perpage() + $loop->index + 1}}</td>
        <td>{{$item['name']}}</td>
        <td>{{$item['email']}}</td>
        <td>{{$item['role']}}</td>
        <td class="d-flex justify-content-center">
          <a href="{{route('user.edit', $item['id'])}}" class="btn btn-primary me-2">Edit</a>
            <form action="{{route('user.delete', $item['id'])}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin mau hapus data!')">Hapus</button>
            </form>
        </td>
    </tr>
    @php $no++; @endphp
    @endforeach
  </tbody>
</table>
<div class="d-flex justify-content-end">
  @if($users->count())
      {{$users->links()}}
  @endif
</div>
@endsection