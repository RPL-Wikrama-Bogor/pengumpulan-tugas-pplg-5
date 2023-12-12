@extends('layouts.template')

@section( 'content')
@if (Session::get('success'))
<div class="alert alert-success">{{Session::get('success')}}</div>
@endif
@if (Session::get('deleted'))
<div class="alert alert-warni">{{Session::get('deleted')}}</div>
@endif

<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th>Nama</th>
            <th>Tipe</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Aksi</th>
        </tr>
    </thead>
        <tbody>
            @php $no = 1; @endphp
            @foreach($medicines as $item)
            <tr>
                <td>{{ ($medicines ->currentpage()-1) * $medicines->perpage() + $loop->index + 1}}</td>
                <td>{{ $item['name'] }}</td>
                <td>{{ $item['type'] }}</td>
                <td>{{ $item['price'] }}</td>
                <td>{{ $item['stock'] }}</td>
                <td class="d-flex">
                    {{-- atau kalau path parameternya ada lebih dari satu : route('medicine.edit',['param1'=>$isi1,'param2'=>$isi2]) --}}
                    <a href="{{ route('medicine.edit', ['id' =>$item['id']]) }}" class="btn btn-primary me-2"><i class="fa-solid fa-pen-to-square" style="color: #000000;"></i></a>

                <form action="{{ route('medicine.delete', $item['id']) }}"method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></button>
                </td>
            </tr>

            @endforeach
        </tbody>
</table>

     <div class="d-flex justify-content-end">
     @if ($medicines->count())
          {{ $medicines->links() }}
     @endif
    </div>
@endsection
