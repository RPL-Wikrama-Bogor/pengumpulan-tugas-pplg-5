@extends('layouts.template')
@section('content')
@if (session('delete'))
    <div class="alert alert-failed">
        {{session('delete')}}
    </div>
@endif
@if (session('status'))
<div class="alert alert-success">
    {{session('status')}}
</div>
@endif

    <h1>Data User</h1>
    <div class="buat">
    <a href="{{route('user.create')}}" class="btn btn-secondary">Buat akun</a>
</div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Role</th>
                <th>Name</th>
                <th>Email</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                @php
                $no = 1;
                @endphp
                @foreach ($datauser as $item)
                    
                
                <td>{{$no++}}</td>
                <td>{{$item->role}}</td>
                <td>{{$item->name}}</td>
                <td>{{$item->email}}</td>
                <td>
                    <div class="aksi">
                    <a href="{{route('user.edit',$item['id'])}}" class="btn btn-primary">Edit</a>
                    <a href="{{ route('user.hapus',$item['id'])}}" class="btn btn-danger">hapus</a>
                    {{-- <form action="{{route('user.hapus',$item['id'])}}" method="POST">
                        {{ csrf_field() }}
                        @method('DELETE')
                        <butt
                        on type="submit" class="btn btn-danger">Hapus</button>
                    </form> --}}
               
                </td>
                 </div>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
<style>
    .aksi{
        display: flex;
    }
    .buat{
        float: right;
    }
</style>