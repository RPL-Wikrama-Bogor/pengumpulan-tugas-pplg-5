@extends('layouts.template')

@section('content')
@if(Session::get('success'))
        <div class="alert alert-success">{{Session::get('success')}}</div>
        @endif
@if(Session::get('deleted'))
        <div class="alert alert-warning">{{Session::get('deleted')}}</div>
        @endif
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>nama</th>
                <th>tipe</th>
                <th>harga</th>
                <th>stok</th>
                <th>aksi</th>
            </tr>
        </thead>
        <tbody>
            @php $no =1; @endphp
            @foreach($medicines as $item)
            <tr>
                <td>{{$no++}}</td>
                <td>{{$item['name']}}</td>
                <td>{{$item['type']}}</td>
                <td>{{$item['pricee']}}</td>
                <td>{{$item['stock']}}</td>
                <td class="d-flex">
                    {{--atau route (medicine.edit,['param'=>$isi1, 'param2' => $isi 2--}}
                    <a href="{{route('medicine.edit', $item['id'] )}}" class="btn btn-primary">edit</a>
                    <form action="{{ route('medicine.delete',$item['id'])}}" method="post">
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
        @if($medicines->count())
        {{$medicines->links()}}
        @endif
    </div> 
    @endsection