<x-app-layout>
    <x-slot name="header">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight" style="margin-left: 43%">
            {{ __('Pembelian') }}
        </h2>
    </x-slot>
<br><br><br>
<div class="d-flex">
  <div class="justify-content-start" style="margin-left: 10%">
    <form action="/cari-kasir" method="post">
      {{-- @csrf --}}
    <input type="date" name="date" class="form-controller">
    <input type="text" name="nama_pembeli" class="form-controller" placeholder="Nama pembeli">
    <input type="submit" class="form-controller btn btn-success" value="Cari"> 
    <input type="hidden" name="_token" value="{{csrf_token()}}">
  
  </form>
</div>

  <div class="justify-content-end" style="margin-left: 34%">
    <a href="{{route('kasir.order.create')}}" class="btn btn-primary">Tambah BOS</a>
  </div>
  <div class="justify-content-end ms-4" >
    <a href="{{route('kasir.order.index')}}" class="btn btn-warning">RESET</a>
  </div>
</div>

 
  <br>
    <table class="table" style="width: 65%;margin-left:17%">
      @if(isset($error))
         <center><p>Diisi Salah Satunya ya bray</p></center> 
      @endif
        <thead>
          <tr>
            <th>NO</th>
         <th></th>
         <th>Kasir</th>
         <th>Obat</th>
         <th>nama Pembeli</th>
         <th>tanggal</th>
         <th>Aksi</th>
        </tr>
          
        </thead>
     
          @foreach ($orders as $item)
              
         
      <tr>
<td>{{$loop->iteration}}</td>
<td>{{$item['name_costumer']}}</td>
<td>
  {{$item['user']['name']}}
</td>
<td>

  {{--nested loop--}}
<ol>
  @foreach ($item['medicines'] as $medicine)
  <li>
    {{$medicine['name_medicines']}}
    (RP. {{number_format($medicine['price'],0,',','.')}}) :
    Rp. {{number_format($medicine['sub_price'],0,',','.')}}
    <small>qty {{$medicine['qty']}}</small>  </li>
    @endforeach
</ol>
</td>

<td>
  {{$item['name_customer']}}
</td>
<td>
  @php
      setlocale(LC_ALL, 'IND');
  @endphp
  {{Carbon\Carbon::parse($item->created_at)->formatLocalized('%d %b %Y')}}
</td>
<td><a href="{{route('kasir.order.download-pdf',$item['id'])}}" class="btn btn-secondary">Unduh (.PDF)</a></td>
@endforeach

      </tr> 
      
      </table>


</x-app-layout>