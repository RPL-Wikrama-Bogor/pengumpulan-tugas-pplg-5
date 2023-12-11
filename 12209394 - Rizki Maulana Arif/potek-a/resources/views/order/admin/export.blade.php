<table class="table" style="width: 70%;margin-left:14%">
    <thead>
      <tr>
        <th>NO</th>
     <th></th>
     <th>Kasir</th>
     <th>Obat</th>
     <th>nama Pembeli</th>
     <th>tanggal</th>
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
@endforeach

  </tr> 
  
  </table>
