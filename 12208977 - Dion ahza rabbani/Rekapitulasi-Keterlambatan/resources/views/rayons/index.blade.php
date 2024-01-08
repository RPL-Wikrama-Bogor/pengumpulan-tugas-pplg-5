    @extends('layouts.template')
    @section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{session('success')}}
        </div>
        
    @endif
    <h1>Data Rayon</h1>
    <div class="tambah">
    <a class="btn btn-primary" href="{{route('rayons.create')}}">Tambah</a></div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>NO</th>
                <th>Rayon</th>
                <th>Pembimbing siswa</th>
                <td>Aksi</td>
            </tr>
            <tbody>
                @php
                        $no =1;
                    @endphp
                @foreach ($datarayon as $item)
                    
                <tr>
                    <td>{{$no++;}}</td>
                    <td>{{$item->rayon}}</td>
                    <td>{{$item->user_id}}</td>
                    <td>
                        <div class="aksi">
                        <a class="btn btn-success" href="{{route('rayons.edit',$item['id'])}}">Edit</a>
                        <a class="btn btn-danger" href="{{route('rayons.hapus',$item['id'])}}">delete</a>
                    </div>
                    </td>
                </tr>
                 @endforeach
            </tbody>
        </thead>    
    </table>

        
    @endsection
    <style>
        .aksi{
            display: flex;
        }
        .tambah{
            float: right;
        }
    </style>