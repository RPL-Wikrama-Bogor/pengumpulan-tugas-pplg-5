@extends('layouts.template')

@section('content')
 @if (Session::get('success'))
 <div class="alert alert-success">{{Session::get('success')}}</div>
     
 @endif
 @if (Session::get('deleted'))
 <div class="alert alert-warning">{{Session::get('deleted')}}</div>
     
 @endif
 <a href="{{route('user.create') }}" class="btn btn-primary">Tambah Data</a>
    <table class="table table-bordered table-striped mt-3">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Role</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @php $no =1; @endphp
            @foreach($usr as $item)

            <tr>
               
                <td>{{($usr->currentpage()-1) * $usr->perpage() + $loop->index +1 }}</td>
                <td>{{$item['name']}}</td>
                <td>{{$item['email']}}</td>
                <td>{{$item['role']}}</td>
                <td class="d-flex"> 
                    {{-- atau kalau path parameternya ada lebih dari satu : route ('medicine.edit',['param1' => $isi1, 'param2'=>isi2]) --}}
                    <a href="{{route('user.edit', $item['id']) }}" class="btn btn-primary">edit</a>
                    <form action="{{ route('user.delete', $item['id']) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hps">Hapus</button>
                      <div class="modal fade" id="hps" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">PengHapusan</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Yakin anda menghapus !!
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                </div>
                            </div>
                        </div>
                      </div>
                    
                  </form>
                </td>
               
            </tr>
            @endforeach
          
        </tbody>
    </table>
    <div class="d-flex justify-content-end">
        @if ($usr->count())
        {{$usr->links()}}
        @endif
    </div>
    @endsection
    
