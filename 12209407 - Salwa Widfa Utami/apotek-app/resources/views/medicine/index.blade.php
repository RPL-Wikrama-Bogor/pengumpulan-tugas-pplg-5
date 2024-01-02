@extends('layouts.template')

@section('content')
 @if (Session::get('success'))
 <div class="alert alert-success">{{Session::get('success')}}</div>
     
 @endif
 @if (Session::get('deleted'))
 <div class="alert alert-warning">{{Session::get('deleted')}}</div>
     
 @endif

    <table class="table table-bordered table-striped mt-3">
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
            @php $no =1; @endphp
            @foreach($medicines as $item)
            <tr>
                <td>{{($medicines->currentpage()-1) * $medicines->perpage() + $loop->index +1 }}</td>
                <td>{{$item['name']}}</td>
                <td>{{$item['type']}}</td>
                <td>{{$item['price']}}</td>
                <td>{{$item['stock']}}</td>
                <td class="d-flex"> 
                    {{-- atau kalau path parameternya ada lebih dari satu : route ('medicine.edit',['param1' => $isi1, 'param2'=>isi2]) --}}
                    <a href="{{route('medicine.edit', $item['id']) }}" class="btn btn-primary">edit</a>
                    <form action="{{route('medicine.delete',$item['id']) }}" method="POST">
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
        @if ($medicines->count())
        {{$medicines->links()}}
        @endif
    </div>
    @endsection
    
