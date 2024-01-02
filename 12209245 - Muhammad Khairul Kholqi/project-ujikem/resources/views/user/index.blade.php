@extends('layouts.template')

@section('content')
<div class="title-user ml-[300px] mt-[50px]">
    <h1 class="text-[50px] font-bold">Data User</h1>
    <p class=" mt-[10px] mb-[10px]">Home | Data Master | <span style="font-weight: bold">Data User</span></p>
</div>
<div class="jumlah d-flex gap-3 ml-[300px] mb-[10px]">
    <p>Total User: {{ $totalUser }}</p>
    <p>|</p>
    <p>Total Admin: {{ $totalAdmin }}</p>
    <p>|</p>
    <p>Total Pembimbing: {{ $totalPembimbing }}</p>
</div>
<div class="ml-[300px]">
<div class="d-grid gap-2 d-md-flex justify-content-md-str">
    <a href="{{route('user.create')}}" class="btn btn-primary me-md-2"><i class="bi bi-plus-circle mr-[5px]"></i>Tambah User</a>
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
        @foreach ($user as $item)
        <tr class="text-center">
            <td>{{( $user->currentpage()-1) * $user->perpage() + $loop->index + 1}}</td>
            <td>{{ $item['name'] }}</td>
            <td>{{ $item['email'] }}</td>
            <td>{{ $item['role'] }}</td>
            <td class="d-flex justify-content-center">
                <a href="{{ route('user.edit', $item['id'])}}" class="btn btn-primary me-2"><i class="bi bi-pencil-square"></i></a>   
            </td>
        </tr>
        @php $no++; @endphp
        @endforeach
    </tbody>
</table>
</div>
<div class="d-flex justify-content-end">
  @if($user->count())
      {{$user->links()}}
  @endif
</div>
<br><br>
@endsection