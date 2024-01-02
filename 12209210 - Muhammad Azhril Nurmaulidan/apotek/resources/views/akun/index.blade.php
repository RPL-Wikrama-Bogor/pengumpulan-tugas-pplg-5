@extends('layouts.template')

@section('content')

<a href="{{route('akun.create')}}" class="btn btn-primary">Sign Up</a>

<table class="table table-bordered table-striped">
    <tr>
        <th>#</th>
        <th>Nama </th>
        <th>email</th>
        <th>role</th>
        <th>aksi</th>
    </tr>
    <tr>
        @php $no =1; @endphp
        @foreach($medicines as $item)
        <tr>
            <td>{{($medicines->currentpage()-1) * $medicines->perpage() + $loop->index +1}}</td>
            <td>{{$item['name']}}</td>
            <td>{{$item['email']}}</td>
            <td>{{$item['role']}}</td>
            @endforeach
    </tr>
</table>

@endsection