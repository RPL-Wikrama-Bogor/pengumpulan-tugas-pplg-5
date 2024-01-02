@extends('layouts.template')

@section('content')
    @if(Session::get('success'))
         <div class="alert alert-success">{{Session::get('success')}}</div>
    @endif
    @if(Session::get('deleted'))
        <div class="alert alert-warning">
        {{Session::get('deleted')}}</div>
    @endif
    <table class="table table-bordered table-striped mt-3">
        <thead>
            <tr class="text-center">
                <th>No</th>
                <th>Nama</th>
                <th>Tipe</th>
                <th>Harga</th>
                <th>Stock</th>w
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @php $no = 1; @endphp
            @foreach ($medicines as $item)
            <tr class="text-center">
                <td>{{( $medicines->currentpage()-1) * $medicines->perpage() + $loop->index + 1}}</td>
                <td>{{$item['name']}}</td>
                <td>{{$item['type']}}</td>
                <td>{{$item['price']}}</td>
                <td>{{$item['stocks']}}</td>
                <td class="d-flex justify-content-center" >
                    <a href="{{route('medicine.edit', $item['id']) }}" class="btn btn-primary me-2">Edit</a>
                    <form action="{{route('medicine.delete', $item['id'])}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin mau hapus data!')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-end">
        @if($medicines->count())
            {{$medicines->links()}}
        @endif
    </div>
@endsection