<x-app-layout>
    <x-slot name="header">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Kelola Akun') }}
        </h2>
    </x-slot><br><br>
    <table class="table table-bordered table-striped mt-2 ms-5" style="width: 1400px;">
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
            
            @foreach($usr as $item)

            <tr>
               
                <td>{{$loop->iteration}}</td>
                <td>{{$item->name}}</td>
                <td>{{$item->email}}</td>
                <td>{{$item->role}}</td>
              
                <td class="d-flex"> 
                    {{-- atau kalau path parameternya ada lebih dari satu : route ('medicine.edit',['param1' => $isi1, 'param2'=>isi2]) --}}
                    <a href="akun/edit/{{$item->id}}" class="btn btn-primary">edit</a>
                    <form action="hapus/akun/{{$item->id}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" >Hapus</button>
                      <div class="modal fade" id="hps" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        
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
</x-app-layout>

