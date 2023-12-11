<x-app-layout>
    <style>
table{
width:1000px;
margin-left: 15%;
background:white 40%;
text-align: center;
border-radius:30px;
}
.back{
    background: #F4F4F4;
    
}
th,td{
padding: 2%;

}

    </style>
    <x-slot name="header">
        <h2 class="font-semibold text-xl dark:text-gray-200 leading-tight">
            {{ __('tampil Obat') }}
        </h2>
    </x-slot><br><br><br><br><br>

  
 @if (Session::get('edit'))
 <x-alert type="success" message="berhasil mengedit data"></x-alert>  <br>          

     
 @endif
 @if (Session::get('delete'))
 <x-alert type="warning" message="berhasil menghapus data"></x-alert>  <br>          

     
 @endif
<div class="back">
    <table>
        <thead>
            <tr>
                <th>no</th>
                <th>Nama</th>
                <th>Tipe</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @php $no =1; @endphp
            @foreach($data as $item)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$item['nama_obat']}}</td>
                <td>{{$item['tipe']}}</td>
                <td>{{$item['harga']}}</td>
                <td>{{$item['stokawal']}}</td>
                <td class="d-flex ps-5"> 
                    {{-- atau kalau path parameternya ada lebih dari satu : route ('medicine.edit',['param1' => $isi1, 'param2'=>isi2]) --}}
                    <a href="editobat/{{$item['id']}}" class="btn btn-primary me-2">edit</a>
                    <a href="hapus/{{$item['id']}}" class="btn btn-primary me-2">hapus</a>
          
                </form>
                </td>
               
            </tr>
            @endforeach
          
        </tbody>
    </table>
</div>
    {{-- <div class="d-flex justify-content-end">
        @if ($medicines->count())
        {{$medicines->links()}}
        @endif
    </div> --}}

</x-app-layout>
