@extends('layouts.template')

@section('content')
<br>
@if (Session::get('success'))
<div class="alert alert-success">{{Session::get('success')}}</div>

@endif
@if (Session::get('deleted'))
<div class="alert alert-success">{{Session::get('deleted')}}</div>

@endif
<div class="container">
    <table class="table table-bordered table-striped mt-5">
        <thead>
            <tr class="text-center">
                <th>No</th>
                <th>nama</th>
                <th>tipe</th>
                <th>harga</th>
                <th>stock</th>
                <th>aksi</th>
            </tr>
        </thead>
        <tbody>
            @php
                $no = 1;
            @endphp
            @foreach ($medicines as $item)
                <tr class="text-center">
                    <td>{{ ($medicines->currentpage()-1) * $medicines->perpage() + $loop->index + 1 }}</td>
                    <td>{{ $item['name'] }}</td>
                    <td>{{ $item['type'] }}</td>
                    <td>{{ $item['price'] }}</td>
                    <td>{{ $item['stock'] }}</td>
                    <td class="d-flex justify-content-center">
                        {{-- atau kalau path parameternya ada lebih dari satu : route('medicine.edit',['param1'] => $item['param1'] )--}}
                        <a href="{{route('medicine.edit', $item['id'])}}" class="btn btn-primary me-2">edit</a>
                        <form action="{{route('medicine.delete', $item['id'])}}" method="POST">
                        @csrf
                        @method('DELETE')
                       <button type="submit" class="btn btn-danger" onclick="return confirm('yakin mau di ikan paus?')">Hapus</button>
                    </form>
                       
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{-- memunculkan pagination --}}
    <div class="d-flex justify-content-end">
        @if ($medicines->count())
            {{$medicines->links()}}
        @endif
    </div>
@endsection